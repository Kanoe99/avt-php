<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;
use Core\User;

class RegisterForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Предоставьте корректный адрес электронной почты!';
        }

        if (!Validator::string([$attributes['password']], 7, 255)) {
            $this->errors['password'] = 'Пароль должен быть минимум 7 символов!';
        }

        if (!Validator::string([$attributes['full_name']])) {
            $this->errors['full_name'] = 'Поля не могут быть пустыми!';
        }

        if (!Validator::match($attributes['password'],  $attributes['password_repeat'])) {
            $this->errors['password_repeat'] = 'Пароли не совпадают!';
        }

        if ((new User)->getUserByEmail($attributes['email'])) {
            $this->errors['user'] = 'Почта занята!';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors) > 0;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
