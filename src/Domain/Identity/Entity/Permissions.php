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

#[Entity(table: 'permissions')]
class Permissions extends \Strux\Auth\Entity\Permission
{
	use TimestampMixin;

	#[OwnedByMany(related: Roles::class)]
	public Collection $roles;

	#[Column(nullable: true)]
	public ?string $description = null;
}

