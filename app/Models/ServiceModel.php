<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;

class ServiceModel extends Model
{

    use DataTableHelper;
    protected $table = 'services';
    protected $primaryKey = 'id';

    protected $returnType = '\App\Entities\Services';
    protected $allowedFields = [
        'id',
        'title',
        'description',
        'price',
        'img',
        'status'
    ];


    public $searchableFields = [
        'id',
        'title',
        'description',
        'price',
        'status'
    ];
}