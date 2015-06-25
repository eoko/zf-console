<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 16:22
 */

namespace Eoko\Console\Message;

use Eoko\Console\Aware\ConsoleAwareInterface;
use Eoko\Console\Renderer\RendererInterface;
use Eoko\Console\Text\TextInterface;
use Zend\Console\Console;

interface MessageInterface extends TextInterface, ConsoleAwareInterface
{

    /**
     * @param RendererInterface $renderer
     * @param Console $console
     */
    public function __construct($renderer, $console);

    /**
     * @param array $args
     * @return $this
     */
    public function setArgs($args = []);

    /**
     * @return array
     */
    public function getArgs();

    /**
     * @param RendererInterface $renderer
     * @return $this
     */
    public function setRenderer($renderer);

    /**
     * @return RendererInterface
     */
    public function getRenderer();

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate($template);

    /**
     * @return string
     */
    public function getTemplate();
}
