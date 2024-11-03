<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Ponponumi\HtmlAttributeCreate\Create;

var_dump(Create::htmlAttribute(".hello-world"));
var_dump(Create::htmlAttribute("#hello-world"));
