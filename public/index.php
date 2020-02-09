<?php

require_once '../vendor/autoload.php';

use App\ValueObject;

$color = new ValueObject(100, 100, 100);
$color2 = new ValueObject(200, 200, 200);

var_dump($color->getRed());
var_dump($color->getGreen());
var_dump($color->getBlue());
var_dump($color->random());
var_dump($color->mix($color, $color2));