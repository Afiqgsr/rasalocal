<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->decimal('price', 10, 2); // 10 digit total, 2 digit setelah koma
        $table->string('image')->nullable(); // Menyimpan nama file gambar
        $table->timestamps(); // Menambahkan kolom created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('menus');
}

};
