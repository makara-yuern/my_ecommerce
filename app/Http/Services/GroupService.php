<?php

namespace App\Http\Services;

use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupService
{
    public function createGroup(array $validatedData)
    {
        $group = Group::create([
            'title' => $validatedData['title'],
        ]);

        if (isset($validatedData['user'])) {
            foreach ($validatedData['user'] as $userId) {
                DB::table('user_groups')->insert([
                    'group_id' => $group->id,
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return $group;
    }

    public function update(Group $group, array $data)
    {
        $group->update([
            'title' => $data['title'],
        ]);
        $group->users()->sync($data['user']);
    }
}
