<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_sims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('sim_id')->default(0);
            $table->decimal('sim_cost',10,2)->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->enum('is_user_delete',YES_NO_ARRAY)->default('No');
            $table->decimal('amount',10,2)->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('is_sms_mail')->default(0);
            $table->tinyInteger('is_expire_mail')->default(1);
            $table->tinyInteger('is_expire_mail_sent')->default(0);
            $table->tinyInteger('is_auto_renew')->default(0);
            $table->integer('auto_renew_days')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_sims');
    }
};
