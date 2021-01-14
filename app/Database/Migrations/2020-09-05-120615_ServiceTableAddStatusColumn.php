<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServiceTableAddStatusColumn extends Migration
{
	public function up()
	{
        $this->forge->addColumn('services', [
            'status' => [
                'type' => 'TINYINT',
                'null' => false
            ]
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
