<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 18/06/15
 * Time: 15:05
 */

namespace Eoko\Console\Aware;

use Zend\Console\Adapter\AdapterInterface as ConsoleAdapter;


interface ConsoleAwareInterface
{

    /**
     * Return console adapter to use when showing prompt.
     *
     * @return ConsoleAdapter
     */
    public function getConsole();

    /**
     * Set console adapter to use when showing prompt.
     *
     * @param ConsoleAdapter $adapter
     * @return void
     */
    public function setConsole(ConsoleAdapter $adapter);
}
