<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
class CreateUser
{
    public function run ($data)
    {
        DB::beginTransaction();

        User::create($data);

        DB::commit();

    }
}
