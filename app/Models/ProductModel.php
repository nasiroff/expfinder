<?php

namespace App\Models;


use App\Libraries\MyModel;
use CodeIgniter\Model;

class ProductModel extends Model{

  use \App\Libraries\DataTableHelper;
  protected $table = 'products';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\Product';
  protected $allowedFields = [
    'id_user',
    'category_id',
    'brand_id',
    'title',
    'description',
    'price',
    'img',
    'status',
  ];

  public $searchableFields = [
    'products.id',
    'title',
    'description',
    'price',
    'products.status',
    'products.created_at'
  ];

  public $searchableJoinedFields = [
    'users' => [
      'first_name',
      'last_name'
    ],
    'categories' => [
      'name'
    ],
    'brands' => [
      'name'
    ]
  ];


}