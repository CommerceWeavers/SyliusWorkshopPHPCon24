<?php

declare(strict_types=1);

namespace App\Packing\OrderProcessor;

use App\Entity\Order\OrderItem;
use Sylius\Bundle\OrderBundle\Attribute\AsOrderProcessor;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

#[AsOrderProcessor(priority: 25)]
final readonly class PackingOrderProcessor implements OrderProcessorInterface
{
    const PACKING_FEE = 'packing_fee';

    public function __construct(private AdjustmentFactoryInterface $adjustmentFactory)
    {
    }

    public function process(OrderInterface $order): void
    {
        $order->removeAdjustmentsRecursively(self::PACKING_FEE);
        /** @var OrderItem $item */
        foreach ($order->getItems() as $item) {
            if ($item->getPacking() === null) {
                continue;
            }

            $item->addAdjustment(
                $this->adjustmentFactory->createWithData(
                    self::PACKING_FEE,
                    'Packing fee',
                    $item->getPacking()->getPrice()
                )
            );
        }
    }
}
