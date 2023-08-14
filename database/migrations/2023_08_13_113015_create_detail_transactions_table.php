<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->integer('qty');
            $table->date('return_date');
            $table->integer('fine_days')->default(0);
            $table->decimal('fine', 10, 2)->default(0);
            $table->string('field1'); // Definisikan kolom field1
            $table->string('field2'); // Definisikan kolom field2
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
};
