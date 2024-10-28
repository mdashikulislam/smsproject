<?php
function  getYesNoDropdown($selected = 0)
{
    $html = '';
    foreach (YES_NO_ARRAY as $key => $value) {
        $html .='<option value="'.$key.'"';
        if ($selected == $key) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}

function getStatusDropdown($selected = 0)
{
    $html = '';
    foreach (STATUS_ARRAY as $key => $value) {
        $html .='<option value="'.$key.'"';
        if ($selected == $key) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}
