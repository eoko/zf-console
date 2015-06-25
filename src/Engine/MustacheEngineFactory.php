<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 17:47
 */

namespace Eoko\Console\Engine;

use Eoko\Console\Renderer\MustacheRenderer;
use Zend\Console\Console;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MustacheEngineFactory implements FactoryInterface
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
        $mustacheConfig = $config['eoko']['console']['mustache'];

        $engine = new MustacheEngine($mustacheConfig);
        $renderer = new MustacheRenderer();
        return $renderer->setEngine($engine);
    }
}
