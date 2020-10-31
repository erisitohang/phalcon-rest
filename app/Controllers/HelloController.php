<?php
namespace App\Controllers;

use Phalcon\Mvc\Controller;

class HelloController extends Controller
{
    public function index() {
        return 'index';
    }

    public function print($word) {
        return $word;
    }
}
