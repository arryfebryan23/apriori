<?php

function alert_success($messages)
{
    return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $messages . '</div>';
}

function alert_error($messages)
{
    return '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $messages . '</div>';
}

function pd($data, $die = false)
{
    echo '<pre>';
    var_dump($data);

    if ($die == 1) {
        die;
    }
}
