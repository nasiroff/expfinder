<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;
use ReflectionClass;

class CategoryModel extends Model{

  use DataTableHelper;
  protected $table = 'categories';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\Category';
  protected $allowedFields = [
    'id',
    'parent_category_id',
    'name',
    'level',
    'slug',
    'slug_url'
  ];

  public $searchableFields = [
    'id',
    'name',
    'level'
  ];


}