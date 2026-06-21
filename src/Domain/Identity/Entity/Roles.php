<?php

declare(strict_types=1);

namespace App\Domain\Identity\Entity;


use App\Domain\Shared\Traits\TimestampMixin;
use Strux\Component\Database\Schema\Attributes\Column;
use Strux\Component\Database\Schema\Attributes\Id;
use Strux\Component\Database\Schema\Attributes\Entity;
use Strux\Component\Database\Schema\Attributes\Unique;
use Strux\Component\Database\ORM\Attributes\OwnedByMany;
use Strux\Support\Collection;

#[Entity(table: 'roles')]
class Roles extends \Strux\Auth\Entity\Role
{
    use TimestampMixin;

    #[OwnedByMany(
        related: User::class,
        pivotTable: 'roles_users',
        foreignPivotKey: 'roles_id',
        relatedPivotKey: 'users_id'
    )]
    public Collection $users;

    #[OwnedByMany(
        related: Permissions::class,
        pivotTable: 'permissions_roles',
        foreignPivotKey: 'roles_id',
        relatedPivotKey: 'permissions_id'
    )]
    public Collection $permissions;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->permissions = new Collection();
        $this->users = new Collection();
    }
}

