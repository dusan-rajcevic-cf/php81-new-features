<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Error;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private readonly Collection $users;
    private readonly User $user;
    private readonly UserService $service;
    private readonly UserRepository $repository;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->users = User::factory()->count(3)->make();
        $this->user = $this->users->first();

        $this->repository = $this->createMock(originalClassName: UserRepository::class);
        $this->service = new UserService(repository: $this->repository, id: $this->user->id, name:$this->user->name);
    }

    public function testGetUserById(): void
    {
        $this->repository->expects($this->once())
            ->method('find')
            ->with($this->user->id)
            ->willReturn($this->user);

        $user = $this->service->getUserById();
        $this->assertEquals($this->user, $user);
    }

    public function testGetUserByName(): void
    {
        $this->repository->expects($this->once())
            ->method('findWhere')
            ->with(['name' => $this->user->name])
            ->willReturn($this->users->where('name', $this->user->name));

        $users = $this->service->getUsersByName();

        $this->assertEquals($this->user, $users->first());
    }

    public function testChangeName(): void
    {
        // ** Not allowed changing the readonly property
        // $this->user = $this->users->last();
        $user = $this->users->last();

        // ** 'name' is not readonly
        // Note: Service properties do not share immutability
        $this->service->prop_name = $user->name;

        $this->repository->expects($this->once())
            ->method('findWhere')
            ->with(['name' => $user->name])
            ->willReturn($this->users->where('name', $user->name));

        $users = $this->service->getUsersByName();

        $this->assertEquals($user, $users->first());
    }

    public function testChangeId(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Cannot modify readonly property ' . UserService::class . '::$id');
        // ** Not allowed changing the readonly property
        // $this->user = $this->users->last();
        $user = $this->users->last();

        // ** 'id' is readonly property and this is where Error will be thrown
        $this->service->prop_id = $user->id;
    }
}
