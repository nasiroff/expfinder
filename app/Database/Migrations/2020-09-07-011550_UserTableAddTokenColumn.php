<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTableAddTokenColumn extends Migration
{
	public function up()
	{
        $this->forge->addColumn('users', ['token VARCHAR(200) after `last_name`']);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
