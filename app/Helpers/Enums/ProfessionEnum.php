<?php
namespace App\Helpers\Enums;

enum ProfessionEnum: string
{
    case PhpDev = "PhpDev";
    case JsDev = "JsDev";
    case Devops = "Devops";
    case Qa = "Qa";
    case Pm = "Pm";
    case Designer = "Designer";

    public static function findByKey(string $key)
    {
        return constant("self::$key");
    }
}
