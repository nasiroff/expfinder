<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;

class SpecificationModel extends Model{
  use DataTableHelper;
  protected $table = 'product_specification';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\Specification';
  protected $allowedFields = [
    'id',
    'type',
    'configuration',
  ];



}
