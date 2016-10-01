<?php

function arrayToSelectOptions($data) {
    if (!$data)
        return false;

    $options = ['' => ''];

    foreach ($data as $key => $value) {
        $options[$value['id']] = $value['name'];
    }

    return $options;
}
