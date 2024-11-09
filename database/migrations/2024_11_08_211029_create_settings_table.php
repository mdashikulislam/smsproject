<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('sim_cost',10,2)->default(0);
            $table->enum('server_status',SERVER_STATUS)->default('Online');
            $table->text('server_online_message')->nullable();
            $table->text('server_offline_message')->nullable();
            $table->tinyInteger('notification_status')->default(0);
            $table->text('notification_message')->nullable();
            $table->string('contact_page_website_address')->nullable();
            $table->string('contact_page_phone_number')->nullable();
            $table->string('contact_page_email')->nullable();
            $table->string('contact_page_telegram')->nullable();
            $table->string('contact_page_whatsapp')->nullable();
            $table->string('contact_page_facebook')->nullable();
            $table->string('contact_page_instagram')->nullable();
            $table->string('crypto_api')->nullable();
            $table->string('g_captcha_site_key')->nullable();
            $table->string('g_captcha_secret_key')->nullable();
            $table->decimal('new_user_discount',10,2)->default(0);
            $table->tinyInteger('auto_refund')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
