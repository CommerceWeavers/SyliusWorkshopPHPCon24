<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct
{
    #[ORM\Column(options: ['default' => false])]
    private ?bool $packable = false;

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    public function isPackable(): ?bool
    {
        return $this->packable;
    }

    public function setPackable(bool $packable): static
    {
        $this->packable = $packable;

        return $this;
    }
}
