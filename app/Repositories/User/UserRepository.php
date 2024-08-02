<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * Retrieves the model associated with this function
     */
    public function model() {
        return User::class;
    }

    public function getList($user)
    {
        return User::where('name', 'like', '%' . $user . '%')->paginate(10);
    }
}
