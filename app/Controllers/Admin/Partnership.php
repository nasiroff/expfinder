<?php


namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PartnershipModel;
use App\Models\ProductModel;
use App\Models\ServiceModel;
use CodeIgniter\Database\Exceptions\DataException;

class Partnership extends BaseController
{

    public function index()
    {
        return view(ADMIN_VIEW_PAGE."partnerships");
    }

    public function new()
    {
        return view(ADMIN_VIEW_PAGE . "create_partnership");
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required',
            'title' => [
                'rules' => 'required|min_length[10]|max_length[200]',
                'errors' => [
                    'min_length' => ' choose min length'
                ]

            ],
            'description' => 'required',
            'image' => [
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,400]'
            ]
        ];
        $validation->setRules($rules);

        if ($validation->withRequest($this->request)->run()) {


            $partnership = new \App\Entities\Partnership();
            $partnershipModel = new PartnershipModel();
            $partnership->fill($this->request->getPostGet());

            if ($this->request->getFile('image')->isReadable()) {
                $imagePath = moveImage($this->request, $this);
                if ($imagePath != false) {
                    $partnership->img = $imagePath;
                }
            }
            $partnershipModel->save($partnership);

            session()->setFlashdata(['success' => "Partniyor müvəfəqiyyətlə əlavə olundu"]);

            return redirect()->to(base_url("admin/partnerships"));

        }
        session()->setFlashdata(['errors' => $validation->getErrors()]);
        return redirect()->back()->withInput();

    }

    public function edit($id)
    {

    }

    public function show($id)
    {

        $partnership = new PartnershipModel();
        $partnership = $partnership->select([
            'id',
            'name',
            'title',
            'description',
            'img'
        ])->find($id)->toArray();


        return $this->response->setContentType('application/json')->setJSON($partnership);

    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required',
            'title' => [
                'rules' => 'required|min_length[10]|max_length[200]',
                'errors' => [
                    'min_length' => ' choose min length'
                ]

            ]
        ];

        $validation->setRules($rules);
        if ($validation->withRequest($this->request)->run()) {

            $inputs = $this->request->getRawInput();
            $productModel = new PartnershipModel();
            try {
                $product = $productModel->find($id);
                if (is_null($product)) {
                    return $this->response->setStatusCode(404, 'error')->setJSON(['message' => "Belə bir partniyor tapılmadı"]);
                }

                $product->name = $inputs['name'];
                $product->title = $inputs['title'];
                $product->description = $inputs['description'];

                $productModel->save($product);
                return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Partniyorluq məlumatları müvəffəqiyyətlə dəyişdirildi']);
            } catch (DataException $e) {
                return $this->response->setStatusCode(500, 'error')->setJSON(['message' => 'Dəyişmək üçün məlumat tapılmadı']);
            } catch (\Exception $exception) {
                return $this->response->setStatusCode(500, 'error')->setJSON(['message' => $exception->getMessage()]);
            }
        }
        return $this->response->setStatusCode(422, 'error')->setJSON(['message' => 'Daxil edilmiş məlumatlar yoxlamadan ugurla keçmədi', 'errors' => $validation->getErrors()]);

    }

    public function delete($id)
    {
        $partnershipModel = new PartnershipModel();
        $parnership = $partnershipModel->find($id);
        if (!is_null($parnership)) {
            $partnershipModel->delete($parnership->id);
            return $this->response->setStatusCode(200, 'success')->setJSON(['message' => 'Partniyor müvəfəqiyyətlə silindi ']);
        }
        return $this->response->setStatusCode(404, 'error')->setJSON(['message' => 'Silmək üçün belə bir məhsul tapılmadı. Xahiş olunur yenidən cəhd edin']);

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
            $partnershipModel = new PartnershipModel();
            $partnership = $partnershipModel->find($id);
            if (is_null($partnership)) {
                return $this->response->setJSON(['message' => 'Belə bir partniyor tapılmadı'])
                    ->setStatusCode(204);
            }
            if (!is_null($partnership->img) && file_exists($partnership->img)) {
                unlink($partnership->img);
            }

            $imgName = $file->getRandomName();
            $path = 'uploads/images/partnership/';
            $imgWithPath = $path . $imgName;

            if ($file->move($path, $imgName)) {
                $preview = "/".$imgWithPath;
                $config[] = [
                    'key' => $id,
                    'caption' => $fileName,
                    'downloadUrl' => base_url($imgWithPath),
                    'url' => base_url('/admin/partnership/delete-photo')
                ];
                $partnership->img = $imgWithPath;
                $result = $partnershipModel->save($partnership);
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
        $partnershipModel = new PartnershipModel();
        $partnership = $partnershipModel->find($id);
        if (is_null($partnership)) {
            return $this->response
                ->setStatusCode(204, 'error')
                ->setJSON(['message' => "Belə bir xidmət tapılmadı"]);
        }

        if (!is_null($image) && file_exists($image) && $image == $partnership->img) {
            if ($partnershipModel->update($id, ['img' => null])) {
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
        $partnership = new PartnershipModel();
        $partnership = $partnership->select([
            'id',
            'name',
            'title',
            'description'
        ])
            ->searchInDT(isset($_GET['search']) ?  $this->request->getPostGet('search')['value'] : null)
            ->sortDataTable($this->request->getGetPost('order')[0]['column'], $this->request->getGetPost('order')[0]['dir'])
            ->limit($this->request->getGetPost('length'))
            ->offset($this->request->getGetPost('start'))
            ->getDTData($this->request->getPostGet('draw'));

        return $this->response->setJSON($partnership);
    }


}