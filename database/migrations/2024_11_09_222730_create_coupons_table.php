<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('max_uses')->default(0);
            $table->integer('uses')->default(0);
            $table->date('start')->nullable();
            $table->date('expire')->nullable();
            $table->decimal('value',10,2)->default(0);
            $table->enum('type', COUPON_TYPE_ARRAY)->default('Percentage');
            $table->enum('use_type', COUPON_USE_TYPE_ARRAY)->default('Single');
            $table->enum('eligible', COUPON_ELIGIBLE_ARRAY)->default('All');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
