<?php


namespace App\Http\Controllers\Example;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepos;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepos
     */
    public function __construct(UserRepositoryInterface $userRepos)
    {

        $this->userRepos = $userRepos;
    }

    public function list()
    {
        echo $this->userRepos->getModelClass();
    }
}