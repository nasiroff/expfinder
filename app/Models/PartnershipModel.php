<?php


namespace App\Models;


use App\Libraries\DataTableHelper;
use CodeIgniter\Model;

class PartnershipModel extends Model
{

    use DataTableHelper;
    protected $table = 'partnerships';
    protected $primaryKey = 'id';


    protected $returnType = '\App\Entities\Partnership';
    protected $allowedFields = [
        'name',
        'title',
        'description',
        'img'
    ];

    public $searchableFields = [
        'id',
        'title',
        'name'
    ];
}