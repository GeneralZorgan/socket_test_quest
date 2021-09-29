<?php


namespace App\Repositories\Interfaces\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UsersRepositoryInterface
{
    public function all(): Collection;

    public function getById(int $id);
}
