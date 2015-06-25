# Zf-Console

[![Build Status](https://travis-ci.org/iam-merlin/zf-console.svg?branch=master)](https://travis-ci.org/iam-merlin/zf-console)
[![Coverage Status](https://coveralls.io/repos/iam-merlin/zf-console/badge.svg)](https://coveralls.io/r/iam-merlin/zf-console)

```
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
    
    ```
