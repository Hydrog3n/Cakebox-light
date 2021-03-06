<?php

namespace App\Controllers\Player;

use Silex\Application;


$app->get("/api/player/settings",  __NAMESPACE__ . "\\get_settings");


function get_settings(Application $app) {

    if ($app["rights.canPlayMedia"] == false) {
        $app->abort(403, "This user doesn't have the rights to retrieve player informations.");
    }

    $settings                    = [];
    $settings["default_type"]    = strtolower($app["player.default_type"]);
    $settings["avalaible_types"] = [
        'html5'=> ['name'=> "HTML 5 Web Player", "type"=> "html5"],
        'vlc'  => ['name'=> "VLC Web Player", "type"  => "vlc"],
        'divx' => ['name'=> "DivX Web Player", "type" => "divx"]
    ];
    $settings["auto_play"]       = $app["player.auto_play"];

    return $app->json($settings);
}
