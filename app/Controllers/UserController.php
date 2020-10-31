<?php


namespace App\Controllers;


use App\Repositories\UserRepository;
use Phalcon\Mvc\Controller;
use App\Models\User;

/**
 * Class UserController
 * @package App\Controllers
 *  * @property UserRepository $userRepository
 */
class UserController extends Controller
{

    public function index()
    {
        return $this->userRepository->all();
    }

    public function view($uuid)
    {
        return $this->userRepository->findById($uuid);
    }
}
