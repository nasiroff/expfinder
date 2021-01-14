<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartnershipTable extends Migration
{
	public function up()
	{
		$this->forge->addField('id')->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'img' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ]
        ])->createTable('partnerships');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
