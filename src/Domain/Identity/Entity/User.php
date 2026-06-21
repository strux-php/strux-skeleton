<?php

declare(strict_types=1);

namespace App\Domain\Identity\Entity;

use Override;
use Strux\Auth\Traits\WillAuthenticate;
use Strux\Component\Database\Schema as Schema;
use Strux\Component\Database\ORM as ORM;
use Strux\Support\Collection;

#[Schema\Attributes\Entity(table: 'users')]
#[Schema\Attributes\Index(columns: ['firstname', 'lastname'], name: 'idx_user_name')]
class User extends \Strux\Auth\Entity\User
{
	use WillAuthenticate;

	#[Schema\Attributes\Column]
	#[ORM\Attributes\Reformat(get: 'ucwords')]
	public ?string $firstname = null;

	#[Schema\Attributes\Column]
	#[ORM\Attributes\Reformat(get: 'ucwords')]
	public ?string $lastname = null;

	#[Schema\Attributes\Column(type: Schema\Types\Field::mediumText)]
	public ?string $bio = null;

	#[Schema\Attributes\Column(type: Schema\Types\Field::boolean)]
	public ?bool $isAdmin = false;

	#[ORM\Attributes\OwnedByMany(
		related: Roles::class,
		pivotTable: 'roles_users',
		foreignPivotKey: 'users_id',
		relatedPivotKey: 'roles_id'
	)]
	/** @var Collection<Roles> $roles */
	public Collection $roles {
		get => $this->roles ?? new Collection();
		set(Collection $value) => $value ?? new Collection();
	}
}
