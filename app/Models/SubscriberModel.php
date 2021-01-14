<?php


namespace App\Models;


use CodeIgniter\Model;

class SubscriberModel extends Model{
  protected $table = 'subscribers';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\Subscriber';
  protected $allowedFields = [
    'email'
  ];
}