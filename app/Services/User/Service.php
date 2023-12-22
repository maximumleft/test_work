<?php

namespace App\Services\User;

class Service
{
    public function update($user, $data)
    {
        $user->update($data);
        return $user->fresh();
    }

}
