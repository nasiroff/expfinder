<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BrandTable extends Migration
{
	public function up()
	{
		$this->forge->addField('id')->addField(
		    [
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false
                ]
            ]
        )->createTable('brands');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('brands');
	}
}
