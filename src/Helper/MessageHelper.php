<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 21/06/15
 * Time: 11:29
 */

namespace Eoko\Console\Helper;

use Thunder\Shortcode\Shortcode;
use Zend\Console\ColorInterface;
use Zend\Console\Console;

class MessageHelper
{

    public static $mapShortcodeToColor = [
        'warn' => ColorInterface::MAGENTA,
        'comment' => ColorInterface::YELLOW,
        'danger' => ColorInterface::RED,
        'info' => ColorInterface::BLUE,
        'success' => ColorInterface::GREEN,
    ];

    public static function getColorCode($color = 'WHITE')
    {
        $color = 'Zend\Console\ColorInterface::' . strtoupper($color);
        return defined($color) ? constant($color) : null;
    }

    /**
     * @param Shortcode $shortcode
     * @return string
     */
    public static function msg($shortcode)
    {
        $content = $shortcode->getContent();
        $attributes = $shortcode->getParameters();

        $fgColor = (isset($attributes['fg'])) ? self::getColorCode($attributes['fg']) : null;
        $bgColor = (isset($attributes['bg'])) ? self::getColorCode($attributes['bg']) : null;

        if(isset(self::$mapShortcodeToColor[$shortcode->getName()])) {
            $fgColor = self::$mapShortcodeToColor[$shortcode->getName()];
        }

        if (isset($attributes['show']) && (boolean)$attributes['show'] === false) {
            return '[hide]' . $content . '[/hide]';
        }

        return Console::getInstance()->colorize($content, $fgColor, $bgColor);
    }

    public static function bip() {
        return "\x07";
    }

    public static function hide()
    {
        return;
    }
}
