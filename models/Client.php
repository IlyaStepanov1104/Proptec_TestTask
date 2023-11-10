<?php

namespace models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'clients';
    }

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['client_id' => 'id']);
    }
}