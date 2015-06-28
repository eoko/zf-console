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

class MustacheRenderer implements RendererInterface
{
    /** @var  EngineInterface */
    protected $engine;

    /**
     * @param EngineInterface $engine
     * @return $this
     */
    public function setEngine(EngineInterface $engine)
    {
        $this->engine = $engine;
        return $this;
    }

    /**
     * @return EngineInterface
     */
    public function getEngine()
    {
        return $this->engine;
    }

    public function render($template, $context = [])
    {
        return $this->getEngine()->render($template, $context);
    }
}
