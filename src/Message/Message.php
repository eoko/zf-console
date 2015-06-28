<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 16:15
 */

namespace Eoko\Console\Message;

use Eoko\Console\Aware\ConsoleAwareTrait;
use Eoko\Console\Renderer\RendererInterface;

class Message implements MessageInterface
{

    use ConsoleAwareTrait;

    protected $template = null;
    protected $args = [];
    protected $renderer;
    protected $formatter;

    public function __construct($renderer, $formatter)
    {
        $this->setRenderer($renderer);
        $this->setFormatter($formatter);
    }

    /**
     * @param null|string| $message
     * @param null|array $context
     */
    public function show($message = null, $context = null)
    {
        if (is_string($message) && !empty($message)) {
            $context = (is_null($context)) ? $this->getArgs() : (array)$context;
            $message = $this->getRenderer()->render($message, $context);
            $message = $this->getFormatter()->format($message);
            if (is_string($message) && !empty($message)) {
                $this->getConsole()->writeLine($message);
            }
        }
    }

    /**
     * @param array $args
     * @return $this
     */
    public function setArgs($args = [])
    {
        $this->args = $args;
        return $this;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param RendererInterface $renderer
     * @return $this
     */
    public function setRenderer($renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }

    /**
     * @return RendererInterface
     */
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     * @return mixed
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param mixed $formatter
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }


}
