<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('imsi')->index()->nullable();
            $table->string('phone_number')->index()->nullable();
            $table->string('com_port')->nullable();
            $table->enum('status',['Free','Paid','Service','Limited'])->default('Paid');
            $table->tinyInteger('computer')->default(1);
            $table->timestamp('created')->nullable();
            $table->tinyInteger('network_type')->default(0);
            $table->tinyInteger('machine')->default(0);
            $table->integer('slot')->default(0);
            $table->tinyInteger('is_marketing')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};
