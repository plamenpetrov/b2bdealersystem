<?php

namespace App\Services;

use Form;

class FormBuilder {

    public function createHiddenElement($element) {
        return Form::hidden($element['name'], $element['defaultValue'], [
                    'id' => $element['name'],
        ]);
    }

    public function createTextElement($element) {
        return Form::text($element['name'], $element['defaultValue'], [
                    'class' => 'form-control',
                    'id' => $element['name'],
                    'name' => $element['name'],
                    'placeholder' => $element['label'],
        ]);
    }

    public function createNumberElement($element) {
        return Form::number($element['name'], $element['defaultValue'], [
                    'class' => 'form-control',
                    'id' => $element['name'],
                    'name' => $element['name'],
                    'placeholder' => $element['label'],
        ]);
    }

    public function createSelectElement($element) {
        $html[] = '<div class="">';
        $html[] = Form::select($element['name'], $element['element_options'], $element['defaultValue'], [
                    'class' => 'form-control',
                    'id' => $element['name'],
                    'name' => $element['name'],
                    'placeholder' => $element['label'],
        ]);
        $html[] = '</div>';

        return join('', $html);
    }

    public function createTextAreaElement($element) {
        return Form::textarea($element['name'], $element['defaultValue'], [
                    'class' => 'form-control',
                    'id' => $element['name'],
                    'name' => $element['name'],
                    'placeholder' => $element['label'],
                    'cols' => 7,
                    'rows' => 3
        ]);
    }

}
