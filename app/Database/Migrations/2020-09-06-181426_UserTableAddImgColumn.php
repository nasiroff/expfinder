<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTableAddImgColumn extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', ['img VARCHAR(200)']);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
