<?php

use yii\db\Migration;

/**
 * Class m231110_172516_create_communication_MtM_user_client
 */
class m231110_172516_create_communication_MtM_user_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        (new m231110_100831_create_communication_user_client())->safeDown();
        $this->createTable('users_clients', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'client_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users_clients');
        (new m231110_100831_create_communication_user_client())->safeUp();
    }
}
