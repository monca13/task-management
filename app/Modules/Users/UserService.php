<?php
namespace App\Modules\Users;

use App\Modules\Users\Repositories\UserInterface;

/**
 * Class UserService
 * @package App\Modules\Users
 */
class UserService {

    /**
     * @var UserInterface
     */
    protected $repository;

    /**
     * UserService constructor.
     *
     * @param UserInterface $repository
     */
    public function __construct(UserInterface $repository){
        $this->repository = $repository;
    }

    public function getTaskList()
    {
        return $this->repository->getTalskList();
    }
}
