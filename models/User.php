<?php

namespace models;

use Faker\Core\DateTime;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $status_id
 * @property string $name
 * @property boolean|null $sex
 * @property DateTime $created_at
 * @property boolean $deleted
 * @property string|null $auth_key
 * @property integer|null $group_id
 *
 * @property array|null $clients
 * @property Group|null $group
 */
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

    public function getGroup(): ActiveQuery
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }

    public function getUserIdentity()
    {
        return $this->group_id ? $this->group : $this;
    }
}