<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_bookings', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("user_id");
            $table->string("name");
            $table->string("email");
            $table->string("phone_number");
            $table->integer("experience");
            $table->string("country");
            $table->string("surf_type_id");
            $table->string("file_verification");
            $table->date("booking_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bookings');
    }
};
