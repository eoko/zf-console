<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 21/06/15
 * Time: 11:29
 */

namespace Eoko\Console\Helper;

use Zend\Console\Console;

class MessageHelper
{
    const COLOR_VERBOSE = 'LIGHT_WHITE';
    const COLOR_COMMENT = 'YELLOW';
    const COLOR_DANGER = 'RED';
    const COLOR_WARN = 'MAGENTA';
    const COLOR_INFO = 'BLUE';
    const COLOR_SUCCESS = 'GREEN';

    public static $verbosity = 'v';

    public static function getColorCode($color = 'WHITE')
    {
        $color = 'Zend\Console\ColorInterface::' . strtoupper($color);
        return defined($color) ? constant($color) : null;
    }

    public static function msg($attributes, $content, $shortcodeName)
    {
        $fgColor = (isset($attributes['fg'])) ? self::getColorCode($attributes['fg']) : null;
        $bgColor = (isset($attributes['bg'])) ? self::getColorCode($attributes['bg']) : null;

        if (isset($attributes['show']) && (boolean)$attributes['show'] === false) {
            return '[hide]' . $content . '[/hide]';
        }

        return Console::getInstance()->colorize($content, $fgColor, $bgColor);
    }

    public static function bip($attributes, $content, $shortcodeName) {
        return "\x07";
    }

    public static function comment($attributes, $content, $shortcodeName)
    {
        return '[msg fg="' . self::COLOR_COMMENT . '"]' . $content . '[/msg]';
    }

    public static function danger($attributes, $content, $shortcodeName)
    {
        return '[msg fg="' . self::COLOR_DANGER . '"]' . $content . '[/msg]';
    }

    public static function warn($attributes, $content, $shortcodeName)
    {
        return '[msg fg="' . self::COLOR_WARN . '"]' . $content . '[/msg]';
    }

    public static function info($attributes, $content, $shortcodeName)
    {
        return '[msg fg="' . self::COLOR_INFO . '"]' . $content . '[/msg]';
    }

    public static function success($attributes, $content, $shortcodeName)
    {
        return '[msg fg="' . self::COLOR_SUCCESS . '"]' . $content . '[/msg]';
    }

    public static function hide()
    {
        return;
    }

    public static function verbose($attributes, $content, $shortcodeName)
    {
        if ($shortcodeName === 'verbose' && isset($attributes['verbosity'])) {
            self::$verbosity = $attributes['verbosity'];
            return $content;
        }

        if (substr_count($shortcodeName, 'v', 0, min(4, strlen($shortcodeName))) <= strlen(self::$verbosity)) {
            return $content;
        }

        return;
    }
}
