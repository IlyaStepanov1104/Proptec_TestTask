<?php

namespace models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'clients';
    }

//    /**
//     *  Связь one-to-many
//     * @return ActiveQuery
//     */
//    public function getUsers(): ActiveQuery
//    {
//        return $this->hasMany(User::class, ['client_id' => 'id']);
//    }

    /**
     * Связь many-to-many
     * @throws InvalidConfigException
     */
     public function getUsers(): ActiveQuery
     {
         return $this->hasMany(User::class, ['id' => 'user_id'])
             ->viaTable('users_clients', ['client_id' => 'id']);
     }
}