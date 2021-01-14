<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules{

  public function validateUser(string $str,string $fields,array $data){
    $userModel = new UserModel();
    $user = $userModel->where('username',$data['username'])->where('status',1)->first();
    if(!$user || !password_verify($data['password'],$user->password)){
      return false;
    }
    session()->set('auth',$user);
    return true;


  }

}