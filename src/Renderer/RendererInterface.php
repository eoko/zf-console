<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 16:58
 */

namespace Eoko\Console\Renderer;

use Eoko\Console\Engine\EngineInterface;
use Eoko\Console\Formatter\FormatterInterface;

interface RendererInterface
{

    /**
     * @param EngineInterface $engine
     * @return $this
     */
    public function setEngine(EngineInterface $engine);

    public function getEngine();

    /**
     * @param FormatterInterface $formatter
     * @return $this
     */
    public function setFormatter(FormatterInterface $formatter);

    /**
     * @return FormatterInterface
     */
    public function getFormatter();

    public function render($template, $context = []);
}
