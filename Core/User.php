<?php

namespace Core;

class User
{
    protected $table = 'users';
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $this->db->query($query, ['id' => $id]);

        return $this->db->find();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $this->db->query($query, ['email' => $email]);

        return $this->db->find();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->get();
    }

    public function approveUser($id)
    {
        $this->db->query('UPDATE users SET approved = :approved WHERE id = :id', [
            'approved' => true,
            'id' => $id
        ]);

        return $this->db->find();
    }

    public function createUser($email, $password, $full_name)
    {
        $login = $this->generateFolderFromEmail($email);

        $this->db->query('INSERT INTO users (email, password, full_name, login) VALUES (:email, :password, :full_name, :login)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'full_name' => $full_name,
            'login' => $login
        ]);

        $this->makeFolder($login);

        return $this->db->find();
    }

    public function getFolderByEmail($email)
    {
        $result = $this->db->query('SELECT login FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($result && isset($result['login'])) {
            return '/images/users/' . $result['login'] . DIRECTORY_SEPARATOR;
        }
        return null;
    }

    protected function makeFolder($login)
    {
        $path = BASE_PATH . 'images/users/' . $login . '/';

        if (!is_dir($path)) {
            mkdir($path);
        }
    }

    protected function generateFolderFromEmail($email)
    {
        return preg_replace_callback('/^(.*?)@(.*)$/', function ($matches) {
            return $matches[1] . '_' . rand(10000, 99999);
        }, $email);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query, ['id' => $id]);

        return $this->db->statement->rowCount();
    }
}