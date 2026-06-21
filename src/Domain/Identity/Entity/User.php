<?php

declare(strict_types=1);

namespace App\Domain\Identity\Entity;


use App\Domain\Shared\Traits\TimestampMixin;
use App\Domain\Web\Entity\Order;
use Strux\Auth\Traits\WillAuthenticate;
use Strux\Component\Database\Schema as Schema;
use App\Domain\Web\Entity\Artwork;
use App\Domain\Web\Entity\Auction;
use App\Domain\Web\Entity\Bid;
use App\Domain\Web\Entity\Cart;
use Strux\Component\Database\ORM\Attributes\Hidden;
use Strux\Component\Database\ORM\Attributes\OwnedByMany;
use Strux\Component\Database\ORM\Attributes\OwnsMany;
use Strux\Component\Database\ORM\Attributes\OwnsManyPoly;
use Strux\Component\Database\ORM\Attributes\Reformat;
use Strux\Support\Collection;

#[Schema\Attributes\Entity(table: 'users')]
#[Schema\Attributes\Index(columns: ['firstname', 'lastname'], name: 'idx_user_name')]
class User extends \Strux\Auth\Entity\User
{
	use TimestampMixin, WillAuthenticate;

	#[Schema\Attributes\Column]
	#[Reformat(get: 'ucwords')]
	public ?string $firstname = null;

	#[Schema\Attributes\Column]
	#[Reformat(get: 'ucwords')]
	public ?string $lastname = null;

	#[Schema\Attributes\Column(type: Schema\Types\Field::mediumText)]
	public ?string $bio = null;

	#[Schema\Attributes\Column(type: Schema\Types\Field::boolean)]
	public ?bool $isAdmin = false;

	#[OwnedByMany(
		related: Roles::class,
		pivotTable: 'roles_users',
		foreignPivotKey: 'users_id',
		relatedPivotKey: 'roles_id'
	)]
	/** @var Collection<Roles> */
	public Collection $roles;

	#[OwnsMany(Artwork::class, 'userId', 'id')]
	/** @var Collection<Artwork> */
	public Collection $artworks;

	#[OwnsMany(Auction::class, 'userId', 'id')]
	/** @var Collection<Auction> */
	public Collection $auctions;

	#[OwnsMany(Bid::class, 'userId', 'id')]
	/** @var Collection<Bid> */
	public Collection $bids;

	#[OwnsMany(Cart::class, 'userId', 'id')]
	/** @var Collection<Cart> */
	public Collection $carts;

	#[OwnsMany(Order::class, 'userId', 'id')]
	/** @var Collection<Order> */
	public Collection $orders;

	#[OwnsManyPoly(Address::class, 'addressableType', 'addressableId')]
	/** @var Collection<Address> */
	public Collection $addresses;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		$this->roles = new Collection();
		$this->artworks = new Collection();
		$this->auctions = new Collection();
		$this->bids = new Collection();
		$this->carts = new Collection();
		$this->orders = new Collection();
		$this->addresses = new Collection();
	}
}
