<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPage = [
            [
                'title'=>'Home',
                'slug'=>HOME_SLUG
            ],
            [
                'title'=>'Free Sms',
                'slug'=>FREE_SMS_SLUG
            ],
            [
                'title'=>'Pricing',
                'slug'=>PRICING_SLUG
            ],
            [
                'title'=>'Services',
                'slug'=>SERVICES_SLUG
            ],
            [
                'title'=>'Contact Us',
                'slug'=>CONTACT_US_SLUG
            ],
            [
                'title'=>'Login',
                'slug'=>LOGIN_SLUG
            ],
            [
                'title'=>'Register',
                'slug'=>REGISTER_SLUG
            ],

        ];
        foreach ($defaultPage as $key => $value) {
            Seo::updateOrCreate([
                'slug' => $value['slug']
            ], [
                'title' => $value['title'],
                'is_default' => 1,
            ]);
        }
    }
}
