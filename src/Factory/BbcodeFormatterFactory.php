<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 28/06/15
 * Time: 09:49
 */

namespace Eoko\Console\Factory;

use Eoko\Console\Formatter\BbcodeFormatter;
use Thunder\Shortcode\Extractor;
use Thunder\Shortcode\Parser;
use Thunder\Shortcode\Processor;
use Thunder\Shortcode\ShortcodeFacade;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BbcodeFormatterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $options = $config['eoko']['console']['formatter']['options'];
        $tags = (isset($options['tags'])) ? $options['tags'] : [];
        $maxIteration = (isset($options['max_iteration'])) ? $options['max_iteration'] : 1;
        $maxDepth = (isset($options['max_depth'])) ? $options['max_depth'] : 10;
        $aliases = (isset($options['aliases'])) ? $options['aliases'] : [];

        $processor = new Processor(new Extractor(), new Parser());

        foreach($tags as $key => $tag) {
            $processor->addHandler($key, $tag);
        }

        foreach($aliases as $key => $alias) {
            $processor->addHandlerAlias($key, $alias);
        }

        $processor->setMaxIterations($maxIteration);
        $processor->setRecursionDepth($maxDepth);

        return new BbcodeFormatter($processor);

    }

}