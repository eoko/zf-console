<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 25/06/15
 * Time: 13:58
 */

namespace Eoko\Console\Formatter;

class SimpleFormatter implements FormatterInterface
{

    /**
     * @param string $content
     * @return string
     */
    public function format($content = '')
    {
        return $content;
    }
}
