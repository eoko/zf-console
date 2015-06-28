<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 21/06/15
 * Time: 11:29
 */

namespace Eoko\Console\Helper;

use Eoko\Console\Prompter\ExtractPrompter;
use Zend\Console\Console;
use Zend\Console\Prompt\Confirm;
use Zend\Console\Prompt\Line;
use Zend\Console\Prompt\Select;

class PromptHelper
{
    public static $interactive = true;

    public static function prompt($attributes, $content, $shortcodeName)
    {
        $result = Console::getInstance()->readLine();
        return new ExtractPrompter($attributes, $content, $result);
    }

    public static function question($attributes, $content, $shortcodeName) {

        $line = new Line();

        if(isset($content)) {
            $line->setPromptText($content);
        }

        if(isset($attributes['default'])) {
            $line->setPromptText($line->getPromptText() . '[' . $attributes['default'] . '] ');
        }

        if(!isset($attributes['require'])) {
            $line->setAllowEmpty(true);
        }

        $result = $line->show();

        if(empty($result) && isset($attributes['default'])) {
            $result = $attributes['default'];
        }

        return new ExtractPrompter($attributes, $content, $result);
    }

    public static function confirmation($attributes, $content, $shortcodeName) {
        $confirm = new Confirm();

        if(isset($content)) {
            $confirm->setPromptText($content);
        }

        $yesChar = $confirm->getYesChar();
        $noChar = $confirm->getNoChar();

        if(isset($attributes['default'])) {
            $confirm->setAllowEmpty(true);
            if(($attributes['default'] = 'n' || $attributes['default'] = 'N')) {
                $default = false;
                $noChar = strtoupper($noChar);
            } else {
                $default = true;
                $yesChar = strtoupper($yesChar);
            }
        }

        $confirm->setPromptText(
            $confirm->getPromptText() . ' : [' . $yesChar . '/' . $noChar . '] '
        );

        $confirm->setEcho(true);

        $result = $confirm->show();

        if(isset($attributes['default']) && empty($result)) {
            $result = $default;
        }
        return new ExtractPrompter($attributes, $content, $result);
    }

    public static function select($attributes, $content, $shortcodeName) {
        $select = new Select();

    }
}
