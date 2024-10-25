<?php

declare(strict_types=1);

namespace App\EventListener;

use Sylius\Bundle\AdminBundle\Menu\MainMenuBuilder;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final readonly class AddPackingToMenuListener
{
    #[AsEventListener(event: MainMenuBuilder::EVENT_NAME)]
    public function onSyliusMenuAdminMain(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu->getChild('catalog')
            ->addChild('packings', ['route' => 'app_admin_packing_index'])
            ->setLabel('app.ui.packings')
        ;
    }
}
