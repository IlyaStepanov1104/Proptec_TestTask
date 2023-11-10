<?php

namespace models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $account_type
 * @property float $balance
 * @property integer|null $created_by
 * @property integer|null $updated_by
 * @property integer|null $created_at
 * @property integer|null $updated_at
 * @property integer $status
 * @property boolean $deleted
 *
 * @property array|null $users
 */
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