<?php

function alert_success($messages)
{
    return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>' . $messages . '</p></div>';
}

function alert_error($messages)
{
    return '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $messages . '</div>';
}

function vd($data, $die = false)
{
    echo '<pre>';
    var_dump($data);

    if ($die == 1) {
        die;
    }
}
