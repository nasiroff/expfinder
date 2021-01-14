<?php


namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ProductModel;

class Test extends FrontController{

  public function index(){
    echo "sadsad";
  }

  public function test(){

    $s = unserialize('a:1:{s:6:"format";N;}');
    $ss = serialize(array('min' => 1.2, 'val' => 2, 'asd' => 'dus'));
    dd($s);

  }

}
