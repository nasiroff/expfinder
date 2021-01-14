<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;

class BrandModel extends Model{
  use DataTableHelper;
  protected $table = 'brands';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\Brand';
  protected $allowedFields = [
    'id',
    'name',
    'about',
    'img',
    'slug'
  ];

  public $searchableFields = [
    'id',
    'name'
  ];

}