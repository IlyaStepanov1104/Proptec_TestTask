<?php

use yii\db\Migration;

/**
 * Class m231110_100831_create_communication_user_client
 */
class m231110_100831_create_communication_user_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'client_id', $this->integer());
        $this->createIndex('idx-client_id', 'users', 'client_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-client_id', 'users');
        $this->dropColumn('users', 'client_id');
    }
}
