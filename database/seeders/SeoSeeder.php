<?php

namespace Database\Seeders;

use App\Constants\AppConstants;
use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPage = [
            [
                'title'=>'Home',
                'slug'=>AppConstants::HOME_SLUG
            ],
            [
                'title'=>'Free Sms',
                'slug'=>AppConstants::FREE_SMS_SLUG
            ],
            [
                'title'=>'Pricing',
                'slug'=>AppConstants::PRICING_SLUG
            ],
            [
                'title'=>'Services',
                'slug'=>AppConstants::SERVICES_SLUG
            ],
            [
                'title'=>'Contact Us',
                'slug'=>AppConstants::CONTACT_US_SLUG
            ],
            [
                'title'=>'Login',
                'slug'=>AppConstants::LOGIN_SLUG
            ],
            [
                'title'=>'Register',
                'slug'=>AppConstants::REGISTER_SLUG
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
