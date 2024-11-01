<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('single_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('price',10,2)->default(0);
            $table->string('from_filter')->nullable();
            $table->string('message_filter')->nullable();
            $table->tinyInteger('is_other_site')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('single_services');
    }
};
