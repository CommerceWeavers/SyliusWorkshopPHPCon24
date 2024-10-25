<?php

declare(strict_types=1);

namespace App\Packing\Fixture;

use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Resource\Factory\FactoryInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class PackingFixture extends AbstractFixture
{
    private \Faker\Generator $generator;

    public function __construct(
        private readonly ObjectManager $packingManager,
        private readonly FactoryInterface $packingFactory,
    ) {
        $this->generator = Factory::create();
    }

    public function load(array $options): void
    {
        for ($i = 0; $i < $options['amount']; $i++) {
            $packing = $this->packingFactory->createNew();
            $packing->setCode('PACKING_' . $i);
            $packing->setName($this->generator->word);
            $packing->setPrice($this->generator->numberBetween(100, 1000));
            $this->packingManager->persist($packing);
        }

        $this->packingManager->flush();
    }

    public function getName(): string
    {
        return 'packing';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->scalarNode('amount')
                    ->isRequired()
                    ->cannotBeEmpty()
            ->end()
        ;
    }


}
