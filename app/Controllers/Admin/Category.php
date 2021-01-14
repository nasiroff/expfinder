<?php


namespace App\Controllers\Admin;


use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Database\Exceptions\DataException;

class Category extends \App\Controllers\BaseController
{

    public function index()
    {
        if ($this->request->isAJAX()) {
            $categories = new CategoryModel();
            $categories = $categories->get()->getResultArray();

            return $this->response->setContentType('application/json')->setJSON($categories);
        }
        return view(ADMIN_VIEW_PAGE . 'categories');
    }


    public function show($id)
    {
        $categories = new CategoryModel();
        $categories = $categories->find($id);

        return $this->response->setContentType('application/json')->setJSON($categories);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required|min_length[2]',
            'parent_category' => 'if_exist|numeric',
        ];
        $validation->setRules($rules);

        if ($validation->withRequest($this->request)->run()) {
            $inputs = $this->request->getRawInput();
            $categoryModel = new CategoryModel();
            try {

                $category = $categoryModel->find($id);
                if (is_null($category)) {
                    return $this->response->setStatusCode(404, 'error')->setJSON(['message' => "Belə bir kateqoriya tapılmadı"]);
                }
                if (!isset($inputs['is-main']) && isset($inputs['parent_category']) && intval($inputs['parent_category']) !== 0) {
                    $levelOfCategory = (new CategoryModel())->find($inputs['parent_category'])->level;
                    $levelOfCategory = 1 + intval($levelOfCategory);
                    $category->parent_category_id = $inputs['parent_category'];
                    $category->level = $levelOfCategory;
                }elseif (isset($inputs['is-main'])){
                    $category->parent_category_id = 0;
                    $category->level = 0;
                }
                $category->name = $inputs['name'];
                $categoryModel->save($category);
                return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Kateqoriya məlumatları müvəffəqiyyətlə dəyişdirildi']);
            } catch (DataException $e) {
                return $this->response->setStatusCode(500, 'error')->setJSON(['message' => 'Dəyişmək üçün məlumat tapılmadı']);
            } catch (\Exception $exception) {
                return $this->response->setStatusCode(500, 'error')->setJSON(['message' => $exception->getMessage()]);
            }
        }
        return $this->response->setStatusCode(422, 'error')
            ->setJSON([
                'message' => 'Daxil edilmiş məlumatlar yoxlamadan ugurla keçmədi',
                'errors' => $validation->getErrors()
            ]);
    }

    public function new()
    {
        $categories = (new CategoryModel())->where('level <', 2)->get()->getResultArray();
        return view(ADMIN_VIEW_PAGE.'create_category', ['categories' => $categories]);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required|min_length[2]',
            'parent_category_id' => 'if_exist|numeric',
        ];

        $inputs = $this->request->getPost();

        $validation->setRules($rules);

        if ($validation->withRequest($this->request)->run()) {
            $level = 0;
            $category = new CategoryModel();

            $insert = [];
            if (!isset($inputs['is-main']) && isset($inputs['parent_category_id']) && !intval($inputs['parent_category_id']) !== 0){
                $catLvl = (new CategoryModel())->find($inputs['parent_category_id'])->level ;
                if ($catLvl > 1) {
                    return $this->response->setJSON(['error', 'Seçilmiş kateqoriyaya alt kateqoriya əlavə etmək olmaz']);
                }
                $level = $catLvl + 1;
                $insert['parent_category_id'] = $inputs['parent_category_id'];
            }else{
                $insert['parent_category_id'] = 0;
            }

            $insert['name'] = $inputs['name'];
            $insert['level'] = $level;

            $category->insert($insert);
            session()->setFlashdata( 'is-main', isset($inputs['is-main']) ? $inputs['is-main'] : false);
            session()->setFlashdata( 'parent_category_id', isset($inputs['parent_category_id']) ? $inputs['parent_category_id'] : false);
            return redirect()->back();
        }

        session()->setFlashdata(['errors' => $validation->getErrors()]);
        return redirect()->back()->withInput();



    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $product = $categoryModel->find($id);
        if (!is_null($product)) {
            $categoryModel->delete($product->id);
            return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Məhsul müvəfəqiyyətlə silindi ']);
        }
        return $this->response->setStatusCode(404, 'error')->setJSON(['message' => 'Silmək üçün belə bir məhsul tapılmadı. Xahiş olunur yenidən cəhd edin']);

    }


    private function calcLevel($categories, $parentCategoryId)
    {

        foreach ($categories as $category) {
            if ($category['id'] === $parentCategoryId && $category['parent_category_id'] !== 0) {
                return 0 + $this->calcLevel($categories, $category['parent_category_id']);
            } elseif ($category['id'] === $parentCategoryId && $category['parent_category_id'] === 0) {
                return 1;
            }
        }
        return 0;

    }


    public function serverSide()
    {
        $categories = new CategoryModel();
        $categories = $categories->select([
            'id',
            'name',
            'level'
        ])->searchInDT(isset($_GET['search']) ? $this->request->getPostGet('search')['value'] : null)
            ->sortDataTable($this->request->getGetPost('order')[0]['column'], $this->request->getGetPost('order')[0]['dir'])
            ->limit($this->request->getGetPost('length'))
            ->offset($this->request->getGetPost('start'))
            ->getDTData($this->request->getPostGet('draw'));

        return $this->response->setJSON($categories);

    }


}