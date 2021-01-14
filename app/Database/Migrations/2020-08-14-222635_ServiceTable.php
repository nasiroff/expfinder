<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServiceTable extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('services');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('services');
	}
}
