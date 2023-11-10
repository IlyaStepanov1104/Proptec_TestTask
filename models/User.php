<?php

namespace models;

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

    public function getClients(): ActiveQuery
    {
        return $this->hasMany(Client::class, ['id' => 'client_id']);
    }
}