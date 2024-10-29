<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Ponponumi\HtmlAttributeCreate\Create;

var_dump(Create::raw("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello"));
var_dump(Create::htmlData("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello"));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello"));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",0));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",1));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",2));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",3));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",0,1));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",0,2));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",0,3));
var_dump(Create::htmlAttribute("#123hello.hello-world.Hello_World#hello,helloWorld123.123Hello",0,3,false));
