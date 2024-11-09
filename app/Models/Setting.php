<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['sim_cost',
        'server_status',
        'server_online_message',
        'server_offline_message',
        'notification_status',
        'notification_message',
        'contact_page_website_address',
        'contact_page_phone_number',
        'contact_page_email',
        'contact_page_telegram',
        'contact_page_whatsapp',
        'contact_page_facebook',
        'contact_page_instagram',
        'crypto_api',
        'g_captcha_site_key',
        'g_captcha_secret_key',
        'new_user_discount',
        'auto_refund'
        ];
}
