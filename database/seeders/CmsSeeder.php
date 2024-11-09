<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPage = [
            [
                'title'=>'Terms and Conditions',
                'slug'=>'terms-and-condition'
            ],
            [
                'title'=>'Privacy Policy',
                'slug'=>'privacy-policy'
            ],
            [
                'title'=>'Cookie Policy',
                'slug'=>'cookie-policy'
            ],
            [
                'title'=>'Refund Policy',
                'slug'=>'refund-policy'
            ],
            [
                'title'=>'About Us',
                'slug'=>'about-us'
            ],
        ];
        foreach ($defaultPage as $key => $value) {
            Cms::updateOrCreate([
                'slug' => $value['slug']
            ], [
                'title' => $value['title'],
                'is_default' => 1,
            ]);
        }
    }
}
