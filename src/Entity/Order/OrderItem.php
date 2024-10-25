<?php

declare(strict_types=1);

namespace App\Entity\Order;

use App\Packing\Entity\Packing;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_order_item')]
class OrderItem extends BaseOrderItem
{
    #[ORM\ManyToOne]
    private ?Packing $packing = null;

    public function getPacking(): ?Packing
    {
        return $this->packing;
    }

    public function setPacking(?Packing $packing): static
    {
        $this->packing = $packing;

        return $this;
    }
}
