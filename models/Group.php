<?php

namespace models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string|null $name
 *
 * @property array|null $users
 */
class Group extends ActiveRecord
{
    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['group_id' => 'id']);
    }

    public static function tableName(): string
    {
        return 'groups';
    }
}