<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductTableAddImgColumn extends Migration
{
	public function up()
	{
		$this->forge->addColumn('products', [
		    'img' => [
		        'type' => 'VARCHAR',
                'constraint' => 150
            ]
        ]);
	}

	//----------------------------------------------------

    public function down(){}
}
