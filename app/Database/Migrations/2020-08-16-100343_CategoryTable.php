<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryTable extends Migration
{
	public function up()
	{
        $this->forge->addField('id')
            ->addField([
                'parent_category_id' => [
                    'type' => 'INT',
                    'null' => false,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false
                ]
            ])->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('categories');
	}
}
