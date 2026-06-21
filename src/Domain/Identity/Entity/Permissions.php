<?php

declare(strict_types=1);

namespace App\Domain\Identity\Entity;

use DateTimeInterface;
use Strux\Component\Database\Schema as Schema;
use Strux\Component\Database\ORM as ORM;
use Strux\Support\Collection;

#[Schema\Attributes\Entity(table: 'permissions')]
class Permissions extends \Strux\Auth\Entity\Permission
{
    #[ORM\Attributes\OwnedByMany(related: Roles::class)]
    public Collection $roles {
        get => $this->roles ?? new Collection();
        set(Collection $value) => $value ?? new Collection();
    }

    #[Schema\Attributes\Column(nullable: true)]
    public ?string $description = null;

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
}
