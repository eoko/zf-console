<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 25/06/15
 * Time: 12:21
 */

namespace Eoko\Console\Formatter;

interface FormatterInterface
{

    /**
     * @param string $content
     * @return string
     */
    public function format($content = '');
}
