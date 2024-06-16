<?php

namespace Core;

use Core\User;

class Validator
{
    public static function string($values = [], $min = 1, $max = INF)
    {
        extract($values);

        if (count($values) === 1) {
            $value = $values[0];
            $value = trim($value);

            return strlen($value) >= $min && strlen($value) <= $max;
        }
        foreach ($values as $value) {
            $value = trim($value);

            if (!strlen($value) >= $min && strlen($value) <= $max) {
                return false;
            }
        }
        return true;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function is_approved(string $email): bool
    {

        return (new User())->getUserByEmail($email)['approved'] == true;
    }

    public static function match(string $password, string $password_repeat)
    {
        return $password === $password_repeat;
    }
}
