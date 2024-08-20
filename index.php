<?php

require_once("vendor/autoload.php");

use Slim\Slim;
use Demander\Page;
use Demander\Models\Frame;

$app = new Slim();

$app->get('/', function () {
    $frame = new Frame('');
    $page = new Page();
    $page->setTemplate('index', array(
        "frames" => $frame->getFrames(),
    ));
});

$app->get('/saveFrame', function () {

});

$app->config('debug', true);

$app->run();
