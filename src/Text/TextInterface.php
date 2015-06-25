<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 16:17
 */

namespace Eoko\Console\Text;

interface TextInterface
{

    public function show($message, $context = []);
}
