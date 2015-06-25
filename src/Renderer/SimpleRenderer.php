<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 17:00
 */

namespace Eoko\Console\Renderer;

use Eoko\Console\Engine\EngineInterface;
use Eoko\Console\Formatter\FormatterInterface;
use Eoko\Console\Formatter\SimpleFormatter;

class SimpleRenderer implements RendererInterface
{
    /** @var  FormatterInterface */
    protected $formatter;

    public function __construct()
    {
        $this->formatter = new SimpleFormatter();
    }

    /**
     * @param FormatterInterface $formatter
     * @return $this
     * @throws \Exception
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param EngineInterface $engine
     * @return void
     * @throws \Exception
     */
    public function setEngine(EngineInterface $engine)
    {
        throw new \Exception('In simple renderer, the Engine is built-in !');
    }

    /**
     * @throws \Exception
     */
    public function getEngine()
    {
        throw new \Exception('In simple renderer, the Engine is built-in !');
    }

    public function render($template, $context = [])
    {
        // If no context, do nothing
        if (count($context) < 1) {
            return $template;
        }
        return $this->getFormatter()->format(call_user_func_array('sprintf', array_merge((array) $template, $context)));
    }
}
