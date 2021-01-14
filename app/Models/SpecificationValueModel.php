<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;

class SpecificationValueModel extends Model{
  use DataTableHelper;
  protected $table = 'product_specification_value';
  protected $primaryKey = 'id';


  protected $returnType = '\App\Entities\SpecificationValue';
  protected $allowedFields = [
    'id',
    'product_id',
    'specification_id',
    'text_value',
    'boolean_value',
    'integer_value',
    'float_value',
    'datetime_value',
    'date_value'
  ];

}
