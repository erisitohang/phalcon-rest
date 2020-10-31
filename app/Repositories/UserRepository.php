<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function all()
    {
        return $this
            ->modelsManager
            ->executeQuery(
                'SELECT UuidFromBin(uuid) as uuid, username, email, first_name, last_name FROM App\Models\User'
            );
    }

    public function findById($uuid)
    {
        return User::findFirst([
            'columns'    => [
                'UuidFromBin(uuid) as uuid',
                'username',
                'email',
                'first_name',
                'last_name'
            ],
            'conditions' => 'uuid = UuidToBin(:uuid:)',
            'bind'       => [
                'uuid' => $uuid,
            ],
        ]);
    }
}
