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

function set_active($path, $active = 'active') {
    return (Request::is($path) && !Request::is($path . '/*')) ? $active : '';
}

function generateElement($element) {
    switch ($element['type']) {
        case 'text':
            return Formbuilder::createTextElement($element);
            break;
        case 'number':
            return Formbuilder::createNumberElement($element);
            break;
        case 'date':
            return Formbuilder::createTextElement($element);
            break;
        case 'datetime':
            return Formbuilder::createTextElement($element);
            break;
        case 'select':
            return Formbuilder::createSelectElement($element);
            break;
        case 'autocomplete':
            return Formbuilder::createAutocompleteElement($element);
            break;
        case 'textarea':
            return Formbuilder::createTextAreaElement($element);
            break;
        case 'hidden':
            return Formbuilder::createHiddenElement($element);
            break;
    }
}
