<?php

use App\Models\User;

function generateNickname(string $name)
{
    $nickname = str_replace(' ', '', trim($name));

    $i = 0;
    while(User::whereNickname($nickname)->exists())
    {
        $i++;
        $nickname = $nickname . $i;
    }

    return $nickname;
}
