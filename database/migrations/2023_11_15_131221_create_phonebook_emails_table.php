<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('phonebook_emails', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('phonebook_id');
            $table->string('email', 128)->unique();

            $table->timestamps();

            $table->foreign('phonebook_id')->references('id')->on('phonebook');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phonebook_emails');
    }
};
