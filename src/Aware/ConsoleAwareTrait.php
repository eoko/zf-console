<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 18/06/15
 * Time: 15:06
 */

namespace Eoko\Console\Aware;

use Zend\Console\Adapter\AdapterInterface as ConsoleAdapter;
use Zend\Console\Console;

trait ConsoleAwareTrait
{

    /**
     * @var ConsoleAdapter
     */
    protected $console;

    /**
     * Return console adapter to use when showing prompt.
     *
     * @return ConsoleAdapter
     */
    public function getConsole()
    {
        if (!$this->console) {
            $this->console = Console::getInstance();
        }

        return $this->console;
    }

    /**
     * Set console adapter to use when showing prompt.
     *
     * @param ConsoleAdapter $adapter
     */
    public function setConsole(ConsoleAdapter $adapter)
    {
        $this->console = $adapter;
    }
}
