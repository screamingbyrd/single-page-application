<?php


namespace Art\CatchphraseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('art_catchphrase');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
            ->integerNode('number_of_word')->defaultValue(1)->info('How many words in your catchphrase?')->end()
            ->end();
        return $treeBuilder;
    }
}