<?php

namespace App\Models;

use System\Model;

class UserModel extends Model
{
    public function checkLogin(string $email, string $password)
    {
        $stmt = $this->db->prepare('SELECT id, name FROM admin where email = ? and password = ?');
        $stmt->execute([$email, md5($password)]);
        return $stmt->fetch();
    }

    public function storeUser(array $data)
    {
        $sql = "INSERT INTO admin(name, email, password) VALUES(:name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']]);
        return $this->db->lastInsertId();
    }
}
