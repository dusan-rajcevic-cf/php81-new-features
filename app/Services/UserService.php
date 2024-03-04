<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly int $id,
        private string $name = '',
    ) {
    }

    public function __set($name, $value)
    {
        $name = str_replace('prop_', '', $name);
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function getUserById(): ?User
    {
        return $this->repository->find($this->id);
    }

    public function getUsersByName(): Collection
    {
        return $this->repository->findWhere(['name' => $this->name]);
    }
}
