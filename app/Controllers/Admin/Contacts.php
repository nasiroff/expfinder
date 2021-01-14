<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\ContactInformation;
use App\Models\ContactInformationModel;
use CodeIgniter\Database\Exceptions\DataException;

class Contacts extends BaseController{

  public function index(){
    $contactInformationModel = new ContactInformationModel();

    $contactInformation = $contactInformationModel->first();
    return view(ADMIN_VIEW_PAGE . '/contact',['contactInformation' => $contactInformation]);
  }

  public function new(){

  }

  public function create(){
    $contactInformationModel = new ContactInformationModel();

    $contactInformation = $contactInformationModel->first();
    $contactInformation->fill($this->request->getPost());
    try{
      $isSaved = $contactInformationModel->save($contactInformation);
    }catch(DataException $e){
      if('There is no data to update.' == $e->getMessage()){
        session()->setFlashdata('error','Dəyişiklik etmədiyinizdən yeniliklər qeydə alınmadı');
        return redirect()->back();
      }
      session()->setFlashdata('error','Xəta baş verdi');
      return redirect()->back();
    }
    if($isSaved){
      session()->setFlashdata('success','Yeniliklər qeydə alındı');
      return redirect()->back();
    }
    session()->setFlashdata('error','Xəta baş verdi');
    return redirect()->back();
  }

  public function edit($id){

  }

  public function show($id){

  }

  public function update($id){

  }

  public function delete($id){

  }
}