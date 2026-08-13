<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            // Menambahkan kolom description tipe text, boleh kosong (nullable)
            // after('title') artinya kolom ini akan diletakkan setelah kolom title di database
            $table->text('description')->nullable()->after('title');
        });
    }

    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};