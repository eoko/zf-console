<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 25/06/15
 * Time: 14:07
 */

namespace Eoko\Console\Message;

use Eoko\Console\Formatter\FormatterInterface;
use Eoko\Console\Formatter\SimpleFormatter;
use Eoko\Console\Renderer\SimpleRenderer;
use Zend\Console\Console;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MessageFactory implements FactoryInterface
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

        if (isset($config['eoko']['console']['renderer'])) {
            $renderer = $serviceLocator->get($config['eoko']['console']['renderer']);
        } else {
            $renderer = new SimpleRenderer();
        }

        if (isset($config['eoko']['console']['formatter']['service'])) {
            $formatter = $serviceLocator->get($config['eoko']['console']['formatter']['service']);
        } else {
            $formatter = new SimpleFormatter();
        }

        $message = new Message($renderer, $formatter);
        return $message;
    }
}
