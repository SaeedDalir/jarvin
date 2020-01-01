<?php
namespace App\Services\Token;

use Illuminate\Support\Str;

class TokenHandler
{
    public function randomString(int $number): string
    {
        return Str::random($number);
    }
}
