<?php
function calculatePriceWithDiscount($price, $discount)
{
    $discount = ($price * $discount) / 100;
    $afterDiscount = $price - $discount;
    return number_format($afterDiscount,2);
}
function getCouponTypeDropdown($selected = '')
{
    $html ='';
    foreach (COUPON_TYPE_ARRAY as $key => $value) {
        $html .='<option value="'.$value.'"';
        if ($selected == $value) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}
function getCouponUseTypeDropdown($selected = '')
{
    $html ='';
    foreach (COUPON_USE_TYPE_ARRAY as $key => $value) {
        $html .='<option value="'.$value.'"';
        if ($selected == $value) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}
function getCouponEligibleDropdown($selected = '')
{
    $html ='';
    foreach (COUPON_ELIGIBLE_ARRAY as $key => $value) {
        $html .='<option value="'.$value.'"';
        if ($selected == $value) {
            $html .='selected';
        }
        $html .='>'.$value.'</option>';
    }
    return $html;
}
function getAllUserDropdown($selected = '')
{
    $users = \App\Models\User::whereHas('roles',function ($q){
        //$q->where('name',\USER);
    })->get();
    $html ='<option value="">All Users</option>';
    foreach ($users as $key => $value) {
        $html .='<option value="'.$value->id.'"';
        $html .='>'.$value->name.'</option>';
    }
    return $html;
}
