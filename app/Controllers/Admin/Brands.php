<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ServiceModel;
use CodeIgniter\Database\Exceptions\DataException;

class Brands extends BaseController{

  public function index(){
    if ($this->request->isAJAX()) {
      $brands = new BrandModel();
      $brands = $brands->get()->getResultArray();

      return $this->response->setContentType('application/json')->setJSON($brands);
    }
    return view(ADMIN_VIEW_PAGE . "brands");
  }

  public function new(){
    return view(ADMIN_VIEW_PAGE . 'create_brand');
  }

  public function create()
  {

    $validation = \Config\Services::validation();
    $rules = [
      'name' => [
        'rules' => 'required|min_length[2]|max_length[200]',
      ],
      'image' => [
        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'max_size[image,400]'
      ]
    ];
    $validation->setRules($rules);

    if ($validation->withRequest($this->request)->run()) {

      $inputs = $this->request->getPost();
      $brand = new \App\Entities\Brand();
      $brandModel = new BrandModel();
      $brand->fill($this->request->getPostGet(null, \FILTER_CALLBACK, ['options' => 'trim']));

      if ($this->request->getFile('image')->isReadable()) {
        $imagePath = moveImage($this->request, $this);
        if ($imagePath != false) {
          $brand->img = $imagePath;
        }
      }
      $brand->slug = trim(makeSlug($inputs['name']));
      $brandModel->save($brand);

      session()->setFlashdata(['success' => "Brend müvəfəqiyyətlə əlavə olundu"]);
      if ($this->request->getPostGet('is-stay-page') == "on") {
        session()->setFlashdata(['is-stay-page' => "on"]);
        return redirect()->back();
      }
      return redirect()->to(base_url("admin/brands"));

    }
    session()->setFlashdata(['errors' => $validation->getErrors()]);
    return redirect()->back()->withInput();


  }

  public function edit($id){

  }

  public function show($id){
    $brand = new BrandModel();
    $brand = $brand->select([
      'id',
      'name',
      'about',
      'img'
    ])->find($id)->toArray();

    return $this->response->setContentType('application/json')->setJSON($brand);
  }

  public function update($id){
    $validation = \Config\Services::validation();
    helper(['form', 'url']);
    $rules = [
      'name' =>'required|min_length[2]|max_length[200]',
      'about' => 'required'
    ];
    $validation->setRules($rules);


    if ($validation->withRequest($this->request)->run()) {

      $inputs = $this->request->getRawInput();
      $brandModel = new BrandModel();
      try {
        $brand = $brandModel->find($id);
        if (is_null($brand)) {
          return $this->response->setStatusCode(404, 'error')->setJSON(['message' => "Belə bir brend tapılmadı"]);
        }
        $brand->name = trim($inputs['name']);
        $brand->about = trim($inputs['about']);
        $brand->slug = trim(makeSlug($inputs['name']));
        $brandModel->save($brand);
        return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Brendin məlumatları müvəffəqiyyətlə dəyişdirildi']);
      } catch (DataException $e) {
        return $this->response->setStatusCode(500, 'error')->setJSON(['message' => 'Dəyişmək üçün məlumat tapılmadı']);
      } catch (\Exception $exception) {
        return $this->response->setStatusCode(500, 'error')->setJSON(['message' => $exception->getMessage()]);
      }
    }
    return $this->response->setStatusCode(422, 'error')->setJSON(['message' => 'Daxil edilmiş məlumatlar yoxlamadan ugurla keçmədi', 'errors' => $validation->getErrors()]);
  }

  public function delete($id){
    $brandModel = new BrandModel();
    $brand = $brandModel->find($id);
    if (!is_null($brand)) {
      $brandModel->delete($brand->id);
      return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Brend müvəfəqiyyətlə silindi ']);
    }
    return $this->response->setStatusCode(404, 'error')->setJSON(['message' => 'Silmək üçün belə bir brend tapılmadı. Xahiş olunur yenidən cəhd edin']);
  }


  public function uploadPhoto()
  {
    $preview = $config = [];
    $validated = $this->validate([
      'image' => [
        'uploaded[image]',
        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'max_size[image,400]',
      ],
    ]);
    if ($validated) {
      $file = $this->request->getFile('image');
      $fileName = $this->request->getFile('image')->getName();
      $id = $this->request->getGetPost('id');
      $brandModel = new BrandModel();
      $brand = $brandModel->find($id);
      if (is_null($brand)) {
        return $this->response->setJSON(['message' => 'Belə bir brend tapılmadı'])
          ->setStatusCode(204);
      }
      if (!is_null($brand->img) && file_exists($brand->img)) {
        unlink($brand->img);
      }

      $imgName = $file->getRandomName();
      $path = 'uploads/images/brands/';
      $imgWithPath = $path . $imgName;

      if ($file->move($path, $imgName)) {
        $preview = "/".$imgWithPath;
        $config[] = [
          'key' => $id,
          'caption' => $fileName,
          'downloadUrl' => base_url($imgWithPath),
          'url' => base_url('/admin/brands/delete-photo')
        ];
        $brand->img = $imgWithPath;
        $result = $brandModel->save($brand);
        if ($result) {
          return $this->response->setJSON(['message' => 'Şəkil müvəfəqiyyətlə yükləndi'])
            ->setJSON(['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => true])
            ->setStatusCode(200);
        }
      }
    }
    return $this->response->setStatusCode(409, 'Şəkilin tipi jpg, jpeg, gif və png formatında olamalı, ölçüsü isə 400KB-dan az olmalıdır');
  }

  public function deletePhoto()
  {
    $request = $this->request;
    $id = $request->getPostGet('id');
    $image = ltrim($request->getPostGet('image'), "/");

    $response = [];
    $brandModel = new BrandModel();
    $brand = $brandModel->find($id);
    if (is_null($brand)) {
      return $this->response
        ->setStatusCode(204, 'error')
        ->setJSON(['message' => "Belə bir brend tapılmadı"]);
    }

    if (!is_null($image) && file_exists($image) && $image == $brand->img) {
      if ($brandModel->update($id, ['img' => null])) {
        if (unlink($image)) {
          return $this->response
            ->setStatusCode(200, 'success')
            ->setJSON(['message' => 'Şəkil müvəfəqiyyətlə silindi']);
        }
      }
    }
    $response = ['code' => 409, 'message' => 'Şəkil tapılmadı'];
    return $this->response
      ->setStatusCode($response['code'], 'error')
      ->setJSON(['message' => $response['message']]);


  }




  public function serverSide()
  {
    $brand = new BrandModel();
    $brand = $brand->select([
      'id',
      'name'
    ])->searchInDT(isset($_GET['search']) ?  $this->request->getPostGet('search')['value'] : null)
      ->sortDataTable($this->request->getGetPost('order')[0]['column'], $this->request->getGetPost('order')[0]['dir'])
      ->limit($this->request->getGetPost('length'))
      ->offset($this->request->getGetPost('start'))
      ->getDTData($this->request->getPostGet('draw'));

    return $this->response->setJSON($brand);
  }

}