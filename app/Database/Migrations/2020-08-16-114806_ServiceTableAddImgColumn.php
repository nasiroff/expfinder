<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServiceTableAddImgColumn extends Migration
{
	public function up()
	{
        $this->forge->addColumn('services', [
            'img' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ]
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{

	}
}
