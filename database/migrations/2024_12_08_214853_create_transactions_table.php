<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('trx_id')->nullable();
            $table->enum('payment_type', \App\Constants\AppConstants::PAYMENT_TYPE)->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->text('purpose')->nullable();
            $table->enum('status', \App\Constants\AppConstants::TRANSACTION_STATUS_ARRAY)->default(\App\Constants\AppConstants::PENDING);
            $table->enum('payment_method',\App\Constants\AppConstants::PAYMENT_METHODS_ARRAY)->default(\App\Constants\AppConstants::WALLET);
            $table->tinyInteger('is_premium')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
