<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keloladata', function (Blueprint $table) {
            $table->id();
            $table->integer('id_admin');
            $table->string('id_location_csr');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('type');
            $table->string('hostname');
            $table->string('ssd');
            $table->string('winver');
            $table->string('processor');
            $table->string('antivirus');
            $table->enum('ram', ['4 GB', '8 GB', '16 GB']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keloladata');
    }
};
