<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('phonebook', function (Blueprint $table) {
            $table->id();

            $table->string('name', 128);
            $table->string('zip_code', 4)->nullable()->default(null);
            $table->string('city', 128)->nullable()->default(null);
            $table->string('street', 128)->nullable()->default(null);
            $table->string('address_details', 128)->nullable()->default(null);
            $table->string('mailing_zip_code', 4)->nullable()->default(null);
            $table->string('mailing_city', 128)->nullable()->default(null);
            $table->string('mailing_street', 128)->nullable()->default(null);
            $table->string('mailing_address_details', 128)->nullable()->default(null);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phonebook');
    }
};
