<?php


namespace App\Http\Controllers\Example;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

class PostController extends ExampleBaseController
{
    /**
     * @var UserRepository
     */
    private $userRepos;
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepos
     * @param PostRepository $postRepository
     */
    public function __construct(UserRepository $userRepos, PostRepository $postRepository)
    {
        $this->userRepos = $userRepos;
        $this->postRepository = $postRepository;
    }

    public function list()
    {
    }
}
