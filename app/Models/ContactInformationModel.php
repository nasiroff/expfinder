<?php


namespace App\Models;


use CodeIgniter\Model;

class ContactInformationModel extends Model
{

    protected $table = 'contact_information';
    protected $primaryKey = 'id';


    protected $returnType = '\App\Entities\ContactInformation';
    protected $allowedFields = [
        'address',
        'phone_number_home',
        'phone_number_mobile',
        'email',
        'about',
        'opening_hours',
        'opening_days',
        'whatsapp_url',
        'instagram_url',
        'facebook_url',
        'logo_path',
        'google_map_api'
    ];

}