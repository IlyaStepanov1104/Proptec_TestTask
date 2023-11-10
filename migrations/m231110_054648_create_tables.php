<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m231110_054648_create_tables
 */
class m231110_054648_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(50)->notNull(),
            'password' => $this->string(64)->notNull(),
            'status_id' => $this->integer()->defaultValue(1)->notNull(),
            'name' => $this->string(500)->notNull(),
            'sex' => $this->boolean(),
            'created_at' => $this->timestamp()->defaultValue(new \yii\db\Expression('NOW()'))->notNull(),
            'deleted' => $this->boolean()->defaultValue(true)->notNull(),
            'auth_key' => $this->string(32),
        ]);

        $this->createTable('clients', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'account_type' => $this->integer()->defaultValue(1)->notNull(),
            'balance' => $this->float()->defaultValue(0),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('clients');
    }
}
