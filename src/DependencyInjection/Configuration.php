<?php

declare(strict_types=1);

namespace MonsieurBiz\SyliusAdminBetterLoginPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('monsieurbiz_sylius_admin_better_login');
        if (\method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('monsieurbiz_sylius_admin_better_login');
        }

        $rootNode
            ->children()
                ->arrayNode('tags')
                    ->cannotBeEmpty()
                    ->scalarPrototype()->end()
                    ->defaultValue(['nature', 'water'])
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
