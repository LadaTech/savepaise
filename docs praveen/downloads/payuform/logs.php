<?php

function insertlogs($log) {
    $logtext = date("F j, Y, g:i a").' '.$log;
    $server = $_SERVER["SERVER_SOFTWARE"];
    $server_name = explode('/', $server);
    list($server_type, $server_version) = $server_name;
    if ($server_type == 'nginx') {
        file_put_contents('/var/log/nginx/payuform_' . date("j.n.Y") . '.txt', $logtext, FILE_APPEND);
    } else {
        file_put_contents('./payuform_' . date("j.n.Y") . '.txt', $logtext, FILE_APPEND);
    }
}
