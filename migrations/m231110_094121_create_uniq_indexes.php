<?php

use yii\db\Migration;

/**
 * Class m231110_094121_create_uniq_indexes
 */
class m231110_094121_create_uniq_indexes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('uniq_email', 'users', 'email', true);
        $this->createIndex('uniq_auth_key', 'users', 'auth_key', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('uniq_email', 'users');
        $this->dropIndex('uniq_auth_key', 'users');
    }
}
