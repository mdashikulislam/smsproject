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

function getAdminRoleDropdown($selected = 0)
{
    $html = '';
    foreach (\Spatie\Permission\Models\Role::where('name','!=',USER)->get() as $key => $value) {
        $html .='<option selected value="'.$value->id.'"';
        if ($selected == $value->id) {
            $html .='selected';
        }
        $html .='>'.$value->name.'</option>';
    }
    return $html;
}
function networkType(): array
{
    return [
        1 => 'Lebara',
        2 => 'EE',
        3 => 'O2',
        4 => 'Vodafone',
        5 => 'Lyca',
    ];
}
function getNetworkType($id): string
{
    $networkType = networkType();
    if(array_key_exists($id, $networkType)){
        return $networkType[$id];
    }
    return '';
}
