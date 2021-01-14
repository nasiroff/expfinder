<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;


class Home extends BaseController{

  public function index(){
    return view(ADMIN_VIEW_PAGE . "index");
  }

  public function login(){
    if($this->request->getMethod() === 'post'){
      if($this->_login()){
        return redirect()->to(base_url("admin/product"));
      }
      return redirect()->back()->withInput();
    }
    return view(ADMIN_VIEW_PAGE . "login");
  }

  public function registration(){
    if($this->request->getMethod() === 'post'){
      if($this->_registration()){


        session()->setFlashdata(['success' => "Qeydiyyatdan uğurla keç diniz"]);
        return redirect()->to(base_url("admin/login"));
      }
      return redirect()->back()->withInput();
    }else{
      return view(ADMIN_VIEW_PAGE . "registration");
    }
  }

  public function logout(){
    session()->destroy();
    return redirect()->to(adminUrl('login'));
  }


  public function passwordRecover(){
    return view(ADMIN_VIEW_PAGE . 'login_password_recover');
  }

  public function activate(){
    helper('form','url');
    $rules = [
      'token' => 'required'
    ];

    if($this->validate($rules)){
      $userModel = new UserModel();
      $user = $userModel->where('token',$this->request->getGet('token'))->first();
      if(is_null($user)){
        session()->setFlashdata(['errors' => "Belə bir istifadəçi tapılmadı"]);
        return redirect()->to(adminUrl('registration'));
      }
      $user->token = uniqid() . "-" . uniqid() . "-" . uniqid();
      $user->status = 1;
      $firstName = $user->first_name;
      $lastName = $user->last_name;
      $userModel->save($user);
      session()->setFlashdata(['success' => $firstName . " " . $lastName . " hesab müvəfəqiyyətlə aktiv oldu."]);
      return redirect()->to(adminUrl('login'));
    }

    session()->setFlashdata(['errors' => $this->validator->getErrors()]);
    return redirect()->to(adminUrl("registration"));
  }

  public function _registration(){
    helper('form','url');
    $rules = [
      'username' => 'required|min_length[3]|max_length[200]',
      'password' => 'required|min_length[8]|max_length[150]',
      'password_confirm' => 'matches[password]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'first_name' => 'required|min_length[3]|max_length[30]',
      'last_name' => 'required|min_length[3]|max_length[30]',
      'image' => [
        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'max_size[image,400]',
      ],
    ];

    if(!$this->validate($rules)){
      session()->setFlashdata(['errors' => $this->validator->getErrors()]);
      return false;
    }else{
      $userModel = new UserModel();
      $user = new User();
      $user->fill($this->request->getPostGet());
      if($this->request->getFile('image')->isReadable()){
        $imagePath = moveImage($this->request,'user');
        if($imagePath != false){
          $user->img = $imagePath;
        }
      }
      $userModel->save($user);
      return true;
    }
  }

  private function _login(){
    helper('form','url');
    $rules = [
      'username' => 'required|min_length[3]|max_length[200]',
      'password' => 'required|min_length[8]|max_length[150]|validateUser[username, password]'
    ];

    if(!$this->validate($rules)){
      session()->setFlashdata(['errors' => $this->validator->getErrors()]);
      return false;

    }

    return true;

  }


}
