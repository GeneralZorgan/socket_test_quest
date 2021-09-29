<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\User\UsersRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository implements UsersRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id) {
        return $this->model->find($id);
    }
}
