<?php

namespace models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            [['email'], 'unique'],
        ];
    }

//    /**
//     * Связь one-to-many
//     */
//    public function getClients(): ActiveQuery
//    {
//        return $this->hasMany(Client::class, ['id' => 'client_id']);
//    }

    /**
     * Связь many-to-many
     * @throws InvalidConfigException
     */
    public function getClients(): ActiveQuery
    {
        return $this->hasMany(Client::class, ['id' => 'client_id'])
            ->viaTable('users_clients', ['user_id' => 'id']);
    }
}