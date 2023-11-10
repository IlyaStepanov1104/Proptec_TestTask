<?php

use yii\db\Migration;

/**
 * Class m231110_182333_users_group
 */
class m231110_182333_users_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('groups', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
        $this->addColumn('users', 'group_id', $this->integer());
        $this->addForeignKey('fk-users-group_id', 'users', 'group_id', 'groups', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('groups');
        $this->dropForeignKey('fk-users-group_id', 'users');
        $this->dropColumn('users', 'group_id');
    }
}
