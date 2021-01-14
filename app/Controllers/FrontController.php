<?php


namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ContactInformationModel;

class FrontController extends BaseController{

  protected $data = [];

  public function __construct(){
    helper('cookie');
    $this->data = [
      'categoriesLVL0' => (new CategoryModel())->where('level',0)->get()->getResult('App\Entities\Category'),
      'categoriesLVL1' => (new CategoryModel())->where('level',1)->get()->getResult('App\Entities\Category'),
      'categoriesLVL2' => (new CategoryModel())->where('level',2)->get()->getResult('App\Entities\Category'),
      'contactInformation' => (new ContactInformationModel())->first()
    ];
  }

}