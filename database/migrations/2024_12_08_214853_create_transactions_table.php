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
            $table->enum('payment_type', ['Cash In', 'Cash Out'])->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->text('purpose')->nullable();
            $table->enum('status', ['Pending', 'Accept','Reject'])->default('Pending');
            $table->enum('payment_method', ['Paypal', 'Crypto','Wallet','Stripe'])->default('Wallet');
            $table->tinyInteger('is_premium')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
