<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use phpDocumentor\Reflection\Type;

class BrandModelTable extends Migration
{
	public function up()
	{
		$this->forge->addField('id')->addField([
		    'brand_id' => [
		        'type' => 'INT',
                'null' => false
            ],
		    'name' =>[
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 150
            ]
        ])->createTable('brand_models');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('brand_models');
	}
}
