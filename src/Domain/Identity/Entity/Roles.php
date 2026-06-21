<?php

declare(strict_types=1);

namespace App\Domain\Identity\Entity;

use DateTimeInterface;
use Strux\Component\Database\Schema as Schema;
use Strux\Component\Database\ORM as ORM;
use Strux\Support\Collection;

#[Schema\Attributes\Entity(table: 'roles')]
class Roles extends \Strux\Auth\Entity\Role
{
    #[Schema\Attributes\Column(
        type: Schema\Types\Field::timestamp,
        currentTimestamp: true
    )]
    public ?DateTimeInterface $createdAt = null;

    #[Schema\Attributes\Column(
        type: Schema\Types\Field::timestamp,
        currentTimestamp: true,
        onUpdateCurrentTimestamp: true
    )]
    public ?DateTimeInterface $updatedAt = null;

    #[ORM\Attributes\OwnedByMany(
        related: User::class,
        pivotTable: 'roles_users',
        foreignPivotKey: 'roles_id',
        relatedPivotKey: 'users_id'
    )]
    public Collection $users {
        get => $this->users ?? new Collection();
		set(Collection $value) => $value ?? new Collection();
    }

    #[ORM\Attributes\OwnedByMany(
        related: Permissions::class,
        pivotTable: 'permissions_roles',
        foreignPivotKey: 'roles_id',
        relatedPivotKey: 'permissions_id'
    )]
    public Collection $permissions {
        get => $this->permissions ?? new Collection();
		set(Collection $value) => $value ?? new Collection();
    }
}
