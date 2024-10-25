<?php

declare(strict_types=1);

namespace App\Packing\Form\Extension;

use App\Packing\Entity\Packing;
use Sylius\Bundle\ShopBundle\Form\Type\CartItemType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class CartItemTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $cartItem = $event->getData();

            if ($cartItem === null || !($cartItem->getProduct()?->isPackable() === true)) {
                return;
            }

            $form->add('packing', EntityType::class, [
                'class' => Packing::class,
                'label' => 'app.ui.packing',
                'required' => false,
                'choice_label' => 'name',
                'choice_value' => 'id',
            ]);
        });
    }

    public static function getExtendedTypes(): iterable
    {
        yield CartItemType::class;
    }
}
