# Zf-Console

[![Build Status](https://travis-ci.org/eoko/zf-console.svg?branch=master)](https://travis-ci.org/eoko/zf-console)
[![Coverage Status](https://coveralls.io/repos/eoko/zf-console/badge.svg)](https://coveralls.io/r/eoko/zf-console)
[![Eoko Public Channel](http://slackin.eoko.fr/badge.svg)](http://slackin.eoko.fr/)

## Goals

Output in Console by using pseudo-language and a very flexible structure. For example :

```PHP
$this->warn('this is not cool');
// [DONE] should output red text

$this->msg('[warn]not cool again[vvvv] with very verbose text[/vvvv][/warn]');
// [DONE] should output red text.
// [TODO] get verbosity from outside and if console is verbose, add the vvvv text

$this->msg('Hello {{username}} !', ['username' => 'merlin']);
// [DONE] should output "Hello merlin"

$this->msg('[notice]Hello {{username}} ![/notice]');
// [DONE] should output "Hello merlin" in blue
   
```

## Controller Plugin

In CLI, inside any controller you have access to a new plugin `message`.

### Output styling text

For styling, we have pre-register formatter on shortcode.
 
 ```PHP
$this->message()->show('text');

$this->message()->notice('notice');
// eq to $this->message()->show('[msg fg="blue"]notice[/msg]');

$this->message()->success('success');
// eq to $this->message()->show('[msg fg="green"]success[/msg]');

$this->message()->comment('comment');
// eq to $this->message()->show('[msg fg="yellow"]comment[/msg]');

$this->message()->warn('warn');
// eq to $this->message()->show('[msg fg="magenta"]warn[/msg]');

$this->message()->danger('danger');
// eq to $this->message()->show('[msg fg="red"]danger[/msg]');


$this->message()->show('[msg fg="white" bg="red"]kkkkk[/msg]');
 ```

### Output text with variable
 
 ```PHP
$this->message()->show('[msg fg="white" bg="red"]{{text}}[/msg]', ['text' => 'My custom text']);
$this->message()->show('[warn]{{msg}}[/warn]', ['msg' => 'Warn message']);
 ```


## Quick Example

```PHP
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->message()->show('[msg level="warn"]my message : [danger]{{message}}[/danger][/msg]', array('message' => '[danger]wololo[/danger]'));
        $this->message()->show('[msg fg="white" bg="red"]warn : message {{a}}[/msg]', array('a' => 'd\'exemple!'));
        $this->message()->info('info : message {{a}}', array('a' => 'd\'exemple!'));

        /** @var Message $message */
        $message = $this->getServiceLocator()->get('eoko.console.message');
        $message->show('[comment]example[/comment]');
        return new ViewModel();
        $this->message()->show('[verbose verbosity="v"][v]this is v[/v] not [vv]vv[/vv][/verbose]');
    }
}
```
