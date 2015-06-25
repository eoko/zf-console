<?php
/**
 * Created by PhpStorm.
 * User: merlin
 * Date: 20/06/15
 * Time: 23:21
 */

namespace Eoko\ConsoleTest\Text;

use Eoko\Console\Exception\InvalidArgumentException;
use Eoko\Console\Text\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{

    public function validText()
    {
        return [
            'simple-line' => ['Zombie ipsum reversus ab viral inferno.'],

            'long-simple-line' => ['Nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia?'],

            'multi-line' => ['De apocalypsi gorger omero undead
survivor dictum mauris.
labat mortuos.
Sicut zeder apathetic
malus voodoo.'],

            'multi-line-n' => ["a\nb\nc\nd"],

            'multi-line-rn' => ["a\r\nb\r\nc\r\nd"],

            'multi-line-r' => ["a\rb\rc\rd"],

            'paragraph' => ["Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de
grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams.
Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor
plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. Qui tardius moveri, brid eof
reanimator sed in magna copia sint terribiles undeath legionis. Alii missing oculis aliorum sicut serpere
crabs nostram. Putridi braindead odores kill and infect, aere implent left four dead."],

            'multi-paragraph' => ['Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de
grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams.
Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor
plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. Qui tardius moveri, brid eof
reanimator sed in magna copia sint terribiles undeath legionis. Alii missing oculis aliorum sicut serpere
crabs nostram. Putridi braindead odores kill and infect, aere implent left four dead.

Lucio fulci tremor est dark vivos magna. Expansis creepy arm yof darkness ulnis witchcraft missing carnem
armis Kirkman Moore and Adlard caeruleum in locis. Romero morbo Congress amarus in auras. Nihil horum
sagittis tincidunt, zombie slack-jawed gelida survival portenta. The unleashed virus est, et iam zombie
mortui ambulabunt super terram. Souless mortuum glassy-eyed oculos attonitos indifferent back zom bieapoc
alypse. An hoc dead snow braaaiiiins sociopathic incipere Clairvius Narcisse, an ante? Is bello mundi z?'],
        ];
    }

    /**
     * @dataProvider validText
     */
    public function testShow($sample)
    {
        $text = new Text($sample);

        ob_start();
        $text->show();
        $result = ob_get_clean();

        $this->assertEquals($result, $sample . "\n");
    }

    /**
     * @dataProvider validText
     */
    public function testShowText($sample)
    {
        $text = new Text();

        ob_start();
        $text->show($sample);
        $result = ob_get_clean();

        $this->assertEquals($result, $sample . "\n");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidContext()
    {
        $text = new Text();
        $text->show('lorem', ['lo' => 'rem']);
    }
}
