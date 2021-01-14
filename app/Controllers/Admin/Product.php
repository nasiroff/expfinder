<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Database\Exceptions\DataException;

class Product extends BaseController{

  public function index(){
    return view(ADMIN_VIEW_PAGE . "index");
  }


  public function show($id){
    $product = new ProductModel();
    $product = $product->select([
      'products.id',
      'category_id',
      'brand_id',
      'parent_category_id',
      'title',
      'products.img',
      'categories.name as category_name',
      'brands.name as brand_name',
      'description',
      'price',
      'CONCAT(first_name, \' \', last_name) as full_name',
      'products.status'
    ])->join('users','products.id_user = users.id')
      ->join('categories','products.category_id=categories.id')
      ->join('brands','products.brand_id = brands.id')
      ->find($id)->toArray();


    $categories = new CategoryModel();
    $categories = $categories->get()->getResultArray();

    $this->findParents($categories,$product['parent_category_id'],$product);

    return $this->response->setContentType('application/json')->setJSON($product);
  }

  public function new(){
    $data = [];
    $data['categories'] = (new CategoryModel())->findAll();
    return view(ADMIN_VIEW_PAGE . 'create_product',$data);
  }

  public function create(){
    $validation = \Config\Services::validation();
    helper(['form','url']);
    $rules = [
      'category_id' => 'required|integer',
      'title' => [
        'rules' => 'required|min_length[10]|max_length[200]',
        'errors' => [
          'min_length' => ' choose min length'
        ]

      ],
      'description' => 'required',
      'price' => 'required',
      'status' => 'required',
      'image' => [
        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'max_size[image,400]'
      ]
    ];
    $validation->setRules($rules);

    if($validation->withRequest($this->request)->run()){


      $product = new \App\Entities\Product();
      $productModel = new ProductModel();
      $product->fill($this->request->getPostGet());
      $product->id_user = 1;

      if($this->request->getFile('image')->isReadable()){
        $imagePath = $this->moveImage();
        if($imagePath != false){
          $product->img = $imagePath;
        }
      }
      $productModel->save($product);

      session()->setFlashdata(['success' => "Məhsul müvəfəqiyyətlə əlavə olundu"]);
      if($this->request->getPostGet('is-stay-page') == "on"){
        session()->setFlashdata(['is-stay-page' => "on"]);
        return redirect()->back();
      }
      return redirect()->to(base_url("admin"));

    }
    session()->setFlashdata(['errors' => $validation->getErrors()]);
    return redirect()->back()->withInput();


  }


  public function update($id){

    $validation = \Config\Services::validation();
    helper(['form','url']);
    $rules = [
      'category_id' => 'required|integer',
      'brand_id' => 'required|integer',
      'title' => [
        'rules' => 'required|min_length[10]|max_length[200]',
        'errors' => [
          'min_length' => ' choose min length'
        ]

      ],
      'description' => 'required',
      'price' => 'required',
      'status' => 'required'
    ];
    $validation->setRules($rules);


    if($validation->withRequest($this->request)->run()){

      $inputs = $this->request->getRawInput();
      $productModel = new ProductModel();
      try{
        $product = $productModel->find($id);
        if(is_null($product)){
          return $this->response->setStatusCode(404,'error')->setJSON(['message' => "Belə bir məhsul tapılmadı"]);
        }
        $product->category_id = trim($inputs['category_id']);
        $product->brand_id = trim($inputs['brand_id']);
        $product->title = trim($inputs['title']);
        $product->description = trim($inputs['description']);
        $product->price = trim($inputs['price']);
        $product->status = trim($inputs['status']);
        $productModel->save($product);
        return $this->response->setStatusCode(200,'success')->setJSON(['message' => 'Məhsulun məlumatları müvəffəqiyyətlə dəyişdirildi']);
      }catch(DataException $e){
        return $this->response->setStatusCode(500,'error')->setJSON(['message' => 'Dəyişmək üçün məlumat tapılmadı']);
      }catch(\Exception $exception){
        return $this->response->setStatusCode(500,'error')->setJSON(['message' => $exception->getMessage()]);
      }
    }
    return $this->response->setStatusCode(422,'error')->setJSON(['message' => 'Daxil edilmiş məlumatlar yoxlamadan ugurla keçmədi','errors' => $validation->getErrors()]);
  }


  public function delete($id){
    $productModel = new ProductModel();
    $product = $productModel->find($id);
    if(!is_null($product)){
      $productModel->delete($product->id);
      return $this->response->setStatusCode(200,'success')->setJSON(['message' => 'Məhsul müvəfəqiyyətlə silindi ']);
    }
    return $this->response->setStatusCode(404,'error')->setJSON(['message' => 'Silmək üçün belə bir məhsul tapılmadı. Xahiş olunur yenidən cəhd edin']);
  }


  public function uploadPhoto(){
    $preview = $config = [];
    $validated = $this->validate([
      'image' => [
        'uploaded[image]',
        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'max_size[image,400]',
      ],
    ]);
    if($validated){
      $file = $this->request->getFile('image');
      $fileName = $this->request->getFile('image')->getName();
      $id = $this->request->getGetPost('id');
      $productModel = new ProductModel();
      $product = $productModel->find($id);
      if(is_null($product)){
        return $this->response->setJSON(['message' => 'Belə bir məhsul tapılmadı'])
          ->setStatusCode(204);
      }
      if(!is_null($product->img) && file_exists($product->img)){
        unlink($product->img);
      }

      $imgName = $file->getRandomName();
      $path = 'uploads/images/product/';
      $imgWithPath = $path . $imgName;

      if($file->move($path,$imgName)){
        $preview = base_url($imgWithPath);
        $config[] = [
          'key' => $id,
          'caption' => $fileName,
          'downloadUrl' => base_url($imgWithPath),
          'url' => base_url('/admin/product/delete-photo')
        ];
        $product->img = $imgWithPath;
        $result = $productModel->save($product);
        if($result){
          return $this->response->setJSON(['message' => 'Şəkil müvəfəqiyyətlə yükləndi'])
            ->setJSON(['initialPreview' => $preview,'initialPreviewConfig' => $config,'initialPreviewAsData' => true])
            ->setStatusCode(200);
        }
      }
    }
    return $this->response->setStatusCode(409,'Şəkilin tipi jpg, jpeg, gif və png formatında olamalı, ölçüsü isə 400KB-dan az olmalıdır');
  }

  public function deletePhoto(){
    $request = $this->request;
    $id = $request->getPostGet('id');
    $image = $request->getPostGet('image');

    $rules = [

    ];

    $response = [];
    $productModel = new ProductModel();
    $product = $productModel->find($id);
    if(is_null($product)){
      return $this->response
        ->setStatusCode(204,'error')
        ->setJSON(['message' => "Belə bir məhsul tapılmadı"]);
    }
    if(!is_null($image) && file_exists($image) && $image == $product->img){
      if($productModel->update($id,['img' => null])){
        if(unlink($image)){
          return $this->response
            ->setStatusCode(200,'success')
            ->setJSON(['message' => 'Şəkil müvəfəqiyyətlə silindi']);
        }
      }
    }
    $response = ['code' => 409,'message' => 'Şəkil tapılmadı'];
    return $this->response
      ->setStatusCode($response['code'],'error')
      ->setJSON(['message' => $response['message']]);


  }


  //------------------PRIVATE FUNCTION-------------------

  private function findParents($categories,$parentId,&$parents = [],$level = 0){

    if(intval($parentId) === 0){
      return;
    }

    foreach($categories as $category){
      if(intval($category['id']) === intval($parentId)){
        $parents['parent_categories'][$level]['id'] = $category['id'];
        $parents['parent_categories'][$level++]['name'] = $category['name'];
        $this->findParents($categories,$category['parent_category_id'],$parents,$level);
      }
    }
    return $parents;
  }

  /**
   * @return string|false
   */

  private function moveImage(){
    $file = $this->request->getFile('image');
    $imgName = $file->getRandomName();
    $path = 'uploads/images/product/';

    if($file->move($path,$imgName)){
      return $path . $imgName;
    }

    return false;
  }


  public function serverSide(){
    $products = new ProductModel();
    $products = $products->select([
      'products.id',
      'categories.name as category_name',
      'brands.name as brand_name',
      'title',
      'price',
      'CONCAT(first_name, \' \' ,last_name) as full_name',
      'products.status'
    ])
      ->join('users','products.id_user = users.id')
      ->join('categories','products.category_id=categories.id')
      ->join('brands','products.brand_id=brands.id')
      ->searchInDT(isset($_GET['search']) ? $this->request->getPostGet('search')['value'] : null)
      ->sortDataTable($this->request->getGetPost('order')[0]['column'],$this->request->getGetPost('order')[0]['dir'])
      ->limit($this->request->getGetPost('length'))
      ->offset($this->request->getGetPost('start'))
      ->getDTData($this->request->getPostGet('draw'));

    return $this->response->setJSON($products);
  }

}


