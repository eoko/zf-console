<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 25/06/15
 * Time: 12:33
 */

namespace Eoko\Console\Engine;

interface EngineInterface
{

    public function render($template, $context = []);
}
