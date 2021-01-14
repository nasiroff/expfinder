<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';


    protected $returnType = '\App\Entities\User';
    protected $allowedFields = [
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'token',
        'img',
        'status'
    ];



    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $afterInsert = ['afterInsert'];



    public function beforeInsert(array $data)
    {
        return  $this->passwordHash($data);
    }

    public function beforeUpdate(array $data)
    {
        return  $this->passwordHash($data);
    }

    public function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        if (!isset($data['data']['token'])){
            $data['data']['token'] = uniqid() ."-". uniqid() ."-". uniqid();
        }
        return $data;
    }

    public function afterInsert(array $data)
    {
        $message = "Hesaba daxil olmaq üçün onu aktiv etmeyiniz xahish olunur. ".anchor('admin/activate?token='.$data['data']['token'],'İndi aktiv et','');
        $email = \Config\Services::email();
        $email->setFrom('no-reply@metaexpress.az', 'No reply');
        $email->setTo($data['data']['email']);
        $email->setSubject('Aktivatsiya linki');
        $email->setMessage($message);
        $email->send();
    }

}