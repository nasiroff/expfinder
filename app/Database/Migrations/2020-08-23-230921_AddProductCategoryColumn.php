<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProductCategoryColumn extends Migration
{
	public function up()
	{
        $this->forge->addColumn('products', [
            'category_id' => [
                'type' => 'INT',
                'null' => false,
                'AFTER' => 'id_user'
            ]
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
