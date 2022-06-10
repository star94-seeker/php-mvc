<?php

namespace App\Controllers;

use System\Controller;
use System\View;

class Home extends Controller
{
    public function index()
    {
        View::renderTemplate('blog.php');
    }
}
