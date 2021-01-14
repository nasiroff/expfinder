<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProuctStatusColumn extends Migration
{
	public function up()
	{
        $this->forge->addColumn('products', [
            'status TINYINT default \'0\' AFTER img'
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
