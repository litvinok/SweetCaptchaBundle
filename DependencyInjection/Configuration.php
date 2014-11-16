<?php

namespace SweetCaptcha\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sweet_captcha');
        $rootNode
            ->children()
            ->scalarNode('id')->cannotBeEmpty()->end()
            ->scalarNode('kay')->cannotBeEmpty()->end()
            ->scalarNode('secret')->cannotBeEmpty()->end()
            ->end();
        return $treeBuilder;
    }
}
