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
    $html ='<option value="All">All Users</option>';
    foreach ($users as $key => $value) {
        $html .='<option value="'.$value->id.'"';
        $html .='>'.$value->name.'</option>';
    }
    return $html;
}

function getSeo($slug)
{
    $seo = \App\Models\Seo::where('slug', $slug)->first();
    if ($seo){
        return ['seoTitle' => $seo->seo_title,'seoDescription' => $seo->seo_description,'seoKeyword' => $seo->seo_keyword];
    }else{
        return  ['seoTitle' =>'','seoDescription' => '','seoKeyword' => ''];
    }
}

function getPackageInfo($duration)
{
    if ($duration == 1){
        return [
            'name'=>'1 Day',
            'duration'=>'1',
            'duration_text'=>'1 Day',
            'price'=>'1.95',
        ];
    }elseif ($duration == 7){
        return [
            'name'=>'1 Week',
            'duration'=>'7',
            'duration_text'=>'7 Days',
            'price'=>'5.00',
        ];
    }elseif ($duration == 30){
        return [
            'name'=>'1 Month',
            'duration'=>'30',
            'duration_text'=>'30 Days',
            'price'=>'15.00',
        ];
    }else{
        return [
            'name'=>'',
            'duration'=>'',
            'duration_text'=>'',
            'price'=>'',
        ];
    }
}

function makeSimApiUrl($slug)
{
    return env('SIM_API').$slug;
}


function callAPI($method, $url, $data)
{
    $auth = ['mukulhosen', '12345678'];
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl,CURLOPT_USERPWD,$auth[0] . ':' . $auth[1]);
    $result = curl_exec($curl);
    if (!$result) {

        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}
