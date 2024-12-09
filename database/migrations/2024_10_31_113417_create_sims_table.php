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
            $table->enum('type',['Free','Paid','Service','Limited'])->default('Paid');
            $table->tinyInteger('network_type')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};
