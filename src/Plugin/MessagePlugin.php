<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 24/06/15
 * Time: 17:30
 */

namespace Eoko\Console\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MessagePlugin extends AbstractPlugin implements FactoryInterface
{
    /** @var  \Eoko\Console\Message\Message */
    protected $message;

    public function show($message = null, $context = null)
    {
        $this->message->show($message, $context);
    }

    /**
     * @todo message plugin should use pre-formatted text...
     */
    public function comment($message = null, $context = null)
    {
        $this->show('[comment]' . $message . '[/comment]', $context);
    }

    public function info($message = null, $context = null)
    {
        $this->show('[info]' . $message . '[/info]', $context);
    }

    public function success($message = null, $context = null)
    {
        $this->show('[success]' . $message . '[/success]', $context);
    }

    public function warn($message = null, $context = null)
    {
        $this->show('[warn]' . $message . '[/warn]', $context);
    }

    public function danger($message = null, $context = null)
    {
        $this->show('[warn]' . $message . '[/warn]', $context);
    }

    /**
     * Create service
     *
     * @todo clean, no class with factory integrated
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @throws \Exception
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if (php_sapi_name() !== 'cli' or !defined('STDIN')) {
            throw new \Exception('This plugin can only be used in CLI context.');
        }

        $message = $serviceLocator->getServiceLocator()->get('eoko.console.message');
        $this->message = $message;
        return $this;
    }
}
