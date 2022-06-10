<?php

namespace App\Controllers\Admin;

use System\Controller;
use System\View;
use App\Models\UserModel;

class User extends  Controller
{
    protected $user;
    protected $user2;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        View::renderTemplate('Admin/login.php');
    }

    public function login()
    {

        (!($this->validateInput()) || !($this->validateEmail($_POST['email']))) ? redirectTo('index') : null;

        $user = $this->user->checkLogin($_POST['email'], $_POST['password']);

        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            redirectTo('/admin/user/dashboard');
        } else {
            setError("Incorrect Credentials. Login Failed!");
            redirectTo('/admin/user/index');
        }
    }

    public function register()
    {
        View::renderTemplate('Admin/register.php');
    }

    public function registerUser()
    {
        (!($this->validateInput()) || !($this->validateEmail($_POST['email']))) ? redirectTo('register') : null;
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        ];
        $id = $this->user->storeUser($data);
        if ($id) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $_POST['name'];
            redirectTo('/admin/user/dashboard');
        } else {
            setError("User registration failed!");
            redirectTo('/admin/user/register');
        }
    }

    public function dashboard()
    {
        if ($_SESSION['id']) {
            View::renderTemplate('Admin/dashboard.php');
        } else {
            redirectTo('index');
        }
    }


    public function validateEmail(String $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validatePassword(String $password): bool
    {
        if (strlen($password) < 4) {
            return false;
        } else return true;
    }


    public function logout()
    {
        session_destroy();
        redirectTo('/admin/user/index');
    }
}
