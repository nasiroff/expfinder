<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactInformation extends Migration
{
    public function up()
    {
        $this->forge->addField('id')->addField([
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'phone_number_home' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'phone_number_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'whatsapp_url' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'instagram_url' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'facebook_url' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'logo_path' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'google_map_api' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ]
        ])->createTable('contact_information');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('contact_information');
    }
}
