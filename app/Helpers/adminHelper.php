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
function getDatatableShowItemDropdown($selected = 0)
{
    $html = '<option value="" disabled selected>Show Entries</option>';
    foreach (DATATABLE_SHOW_ITEM_ARRAY as $key => $value) {
        $html .='<option value="'.$value.'"';
        if ($selected == $value) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}


function getYesNoLabel($value)
{
    return ($value == '1') ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>';
}
function getStatusLabel($value)
{
    return ($value == '1') ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
}
