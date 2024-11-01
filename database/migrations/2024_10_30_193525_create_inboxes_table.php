<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('hash_id')->nullable();
            $table->string('from_no')->nullable();
            $table->text('message')->nullable();
            $table->string('route')->nullable();
            $table->timestamp('rec_time')->nullable();
            $table->string('imsi')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};
