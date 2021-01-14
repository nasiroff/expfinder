<?php namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SubscriberModel;
use Config\Services;

class Home extends FrontController{

  private static $ss = 0;


  public function index(){
    $productModel = new ProductModel();
    $products = $productModel->paginate(30);
    $pager = $productModel->pager;

    return view('front/index2',array_merge($this->data,['products' => $products,'pager' => $pager]));
  }

  //--------------------------------------------------------------------


  public function login(){

    echo "login page";
  }

  public function makeSlug(){
    $categoryModel = new CategoryModel();
    $categories = $categoryModel->findAll();
    dd($categories);
  }


  public function aboutUs(){
    return view('front/about-us',$this->data);
  }

  public function contactUs(){
    return view('front/contact-us-alt',$this->data);
  }

  public function doSubscribe(){
    $rules = [
      'email' => 'valid_email'
    ];
    $validation = Services::validation();
    $validation->setRules($rules);
    if($validation->withRequest($this->request)->run()){
      $subscriberModel = new SubscriberModel();
      $email = $this->request->getPost('email');
      $subscriberModel->insert(['email' => $email]);
      setcookie('is_subscribed',$email,time()+9999999);
      return redirect()->to(previous_url());
    }
    session()->setFlashdata('error',$validation->getError('email'));
    return redirect()->back();
  }


}
