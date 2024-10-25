<?php

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\AdminBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
// <!-- BEGIN HOOKABLE | hook: "sylius_admin.product.update.content.form.sections.general", name: "code", template: "@SyliusAdmin/product/form/sections/general/code.html.twig", priority: 600 -->
final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('packable');
    }

    public static function getExtendedTypes(): iterable
    {
        yield ProductType::class;
    }
}
