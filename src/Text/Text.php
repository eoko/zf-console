<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 18/06/15
 * Time: 15:01
 */

namespace Eoko\Console\Text;

use Eoko\Console\Aware\ConsoleAwareInterface;
use Eoko\Console\Aware\ConsoleAwareTrait;
use Eoko\Console\Exception\InvalidArgumentException;

class Text implements ConsoleAwareInterface, TextInterface
{
    use ConsoleAwareTrait;

    /** @var  string */
    protected $text;

    public function __construct($text = null)
    {
        $this->setText($text);
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text = '')
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Show the text.
     * @param $message
     * @param null $context
     */
    public function show($message = null, $context = null)
    {
        $message = is_null($message) ? $this->getText() : $message;
        if (!is_null($context)) {
            throw new InvalidArgumentException();
        }
        $this->getConsole()->writeLine($message);
    }
}
