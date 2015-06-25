<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 21/06/15
 * Time: 00:16
 */

namespace Eoko\ConsoleTest;

use Eoko\Console\Renderer\SimpleRenderer;

class SimpleRendererTest extends \PHPUnit_Framework_TestCase
{

    public function demoText()
    {
        return [
            'simple' => [[
                'template' => 'Zombie',
                'values' => [],
                'expected' => 'Zombie'
            ]],
            'multiline' => [[
                'template' => "Zombie\nlorem",
                'values' => [],
                'expected' => "Zombie\nlorem"
            ]],
            'simple-values' => [[
                'template' => "%s Zombie(s) in the kitchen",
                'values' => [3],
                'expected' => "3 Zombie(s) in the kitchen"
            ]],
            'multiline-values' => [[
                'template' => "- There are %s, %s... %s  Zombies!\n- Where ?\n- In the %s!!!",
                'values' => [1,2, 'key' => 45, 'bathroom', 'no used'],
                'expected' => "- There are 1, 2... 45  Zombies!"
                    . "\n- Where ?"
                    . "\n- In the bathroom!!!"
            ]],
        ];
    }

    /**
     * Dummy test, essentially test the `sprintf` function
     *
     * @dataProvider demoText
     * @param $data
     */
    public function testRender($data)
    {
        $renderer = new SimpleRenderer();
        $result = $renderer->render($data['template'], $data['values']);
        $this->assertEquals($result, $data['expected']);
    }

    /**
     * We verify the `sprintf` have all the argument needed.
     */
    public function testRenderWithOnlyTemplate()
    {
        $renderer = new SimpleRenderer();
        $this->assertEquals('Eat brain %s%s %s.', $renderer->render('Eat brain %s%s %s.'));
    }
}
