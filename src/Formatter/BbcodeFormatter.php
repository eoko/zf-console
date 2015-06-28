<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 28/06/15
 * Time: 09:47
 */

namespace Eoko\Console\Formatter;


use Thunder\Shortcode\ShortcodeFacade;

class BbcodeFormatter implements FormatterInterface {

    /** @var  ShortcodeFacade */
    protected $formatter;

    function __construct($formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param string $content
     * @return string
     */
    public function format($content = '')
    {
        return $this->formatter->process($content);
    }


}