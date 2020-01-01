<?php namespace App\Utilities\Password;

use Illuminate\Support\Facades\Hash;

class HashHandler
{
    public static function makeHash(string $txt): string
    {
        return Hash::make($txt);
    }

    public static function compareHash(string $txt, string $hashedTxt): bool
    {
        return Hash::check($txt, $hashedTxt);
    }
}
