<?php namespace App\Utilities\Constants;

class UserLevel
{
    public const admin = 52;
    public const user = 2;

    public static function userLevel($level): ?string
    {
        switch ($level) {
            case self::admin:
                return 'مدیر';
            case self::user:
            default:
                return 'کاربر عادی';
        }
    }

    public static function eachLang(): array
    {
        return [
            self::admin => 'مدیر',
            self::user => 'کاربر عادی',
        ];
    }
}
