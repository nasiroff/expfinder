<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProductDateColumns extends Migration
{
	public function up()
	{
		$this->forge->addColumn('products', [
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
