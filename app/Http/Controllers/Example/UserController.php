<?php


namespace App\Http\Controllers\Example;

use App\Repositories\UserRepository;

class UserController extends ExampleBaseController
{
    /**
     * @var UserRepository
     */
    private $userRepos;

    public function __construct(UserRepository $userRepos)
    {
        $this->userRepos = $userRepos;
    }

    public function getUsers()
    {
        $users = $this->userRepos->all();
        return response()->json($users);
    }

    public function createUser()
    {
    }

    public function storeUser()
    {
    }

    public function editUser()
    {
    }

    public function updateUser()
    {
    }

    public function deleteUser()
    {
    }
}
