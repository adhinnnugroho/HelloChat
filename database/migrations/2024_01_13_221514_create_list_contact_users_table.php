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
        Schema::create('list_contact_users', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->integer("id_user_login");
            $table->integer("contact_user_id")->comment("id users")->nullable();
            $table->dateTime("saved_contact_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_contact_users');
    }
};
