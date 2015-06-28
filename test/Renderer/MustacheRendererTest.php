<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 21/06/15
 * Time: 01:30
 */

namespace Eoko\ConsoleTest;

use Eoko\Console\Engine\MustacheEngine;
use Eoko\Console\Engine\MustacheEngineFactory;
use Eoko\Console\Factory\BbcodeFormatterFactory;
use Eoko\Console\Formatter\ShortCodeFormatterFactory;
use Eoko\Console\Helper\MessageHelper;
use Eoko\Console\Message\MessageFactory;
use Eoko\Console\Renderer\MustacheRenderer;
use PHPUnit_Framework_TestCase;
use Zend\Console\Console;

class MustacheRendererTest extends PHPUnit_Framework_TestCase
{

    public function demoText()
    {
        return [
            'simple' => [[
                'template' => 'Zombie',
                'values' => ['coucou'],
                'expected' => 'Zombie'
            ]],
            'simple-value' => [[
                'template' => 'There is no {{ghost}}',
                'values' => [],
                'expected' => 'There is no '
            ]],
            'multiline' => [[
                'template' => "Zombie\nlorem",
                'values' => [],
                'expected' => "Zombie\nlorem"
            ]],
            'simple-values' => [[
                'template' => "{{0}} Zombie(s) in the kitchen",
                'values' => [3],
                'expected' => "3 Zombie(s) in the kitchen"
            ]],
            'multiline-values' => [[
                'template' => "- There are {{0}}, {{1}}... {{key}}  Zombies!\n- Where ?\n- In the {{2}}!!!",
                'values' => [1, 2, 'key' => 45, 'bathroom', 'not used'],
                'expected' => "- There are 1, 2... 45  Zombies!"
                    . "\n- Where ?"
                    . "\n- In the bathroom!!!"
            ]],
        ];
    }

    public function demoFactoryText()
    {
        return [
            'comment' => [[
                'template' => '[comment]Comment from {{from}}[/comment]',
                'values' => ['from' => 'my brain'],
                'expected' => Console::getInstance()->colorize('Comment from my brain', MessageHelper::$mapShortcodeToColor['comment']) . "\n"
            ]],
            'danger' => [[
                'template' => '[danger]Danger from {{from}}[/danger]',
                'values' => ['from' => 'my brain'],
                'expected' => Console::getInstance()->colorize('Danger from my brain', MessageHelper::$mapShortcodeToColor['danger']) . "\n"
            ]],
            'warn' => [[
                'template' => '[warn]Warning from {{from}}[/warn]',
                'values' => ['from' => 'my brain'],
                'expected' => Console::getInstance()->colorize('Warning from my brain', MessageHelper::$mapShortcodeToColor['warn']) . "\n"
            ]],
            'info' => [[
                'template' => '[info]Info from {{from}}[/info]',
                'values' => ['from' => 'my brain'],
                'expected' => Console::getInstance()->colorize('Info from my brain', MessageHelper::$mapShortcodeToColor['info']) . "\n"
            ]],
            'success' => [[
                'template' => '[success]Success from {{from}}[/success]',
                'values' => ['from' => 'my brain'],
                'expected' => Console::getInstance()->colorize('Success from my brain', MessageHelper::$mapShortcodeToColor['success']) . "\n"
            ]],
        ];
    }

    /**
     * @dataProvider demoText
     */
    public function testRenderer($data)
    {
        $renderer = new MustacheRenderer();
        $renderer->setEngine(new MustacheEngine());
        $actual = $renderer->render($data['template'], $data['values']);
        $this->assertEquals($data['expected'], $actual);
    }

    /**
     * @dataProvider demoFactoryText
     */
    public function testFactoryRenderer($data)
    {
        $serviceManager = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManager->shouldReceive('get')->with('Config')->andReturn(include(__DIR__ . '/../../config/module.config.php'));
        $serviceManager->shouldReceive('get')->with('Console')->andReturn(Console::getInstance());
        $serviceManager->shouldReceive('get')->with("eoko.console.formatter.bbcode")->andReturn((new BbcodeFormatterFactory())->createService($serviceManager));
        $serviceManager->shouldReceive('get')->with("eoko.console.renderer.mustache")->andReturn((new MustacheEngineFactory())->createService($serviceManager));

        $renderer = (new MessageFactory($serviceManager))->createService($serviceManager);

        ob_start();
        $renderer->show($data['template'], $data['values']);
        $actual = ob_get_clean();

        $this->assertEquals($data['expected'], $actual);
    }
}
