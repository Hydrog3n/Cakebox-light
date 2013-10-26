<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Finder\Finder;

$app->get("/api/player/settings", function (Request $request) use ($app) {

    $settings = array();

    $settings["type"] = $app["player.type"];
    $settings["width"] = $app["player.width"];
    $settings["height"] = $app["player.height"];
    $settings["preload"] = $app["player.preload"];

    return $app->json($settings);
});