<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 25/06/15
 * Time: 14:09
 */

namespace Eoko\Console\Formatter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ShortCodeFormatterFactory implements FactoryInterface
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

        return new ShortCodeFormatter($options);
    }
}
