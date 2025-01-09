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
        Schema::create('borrowed_books_mohammed_agha', function (Blueprint $table) { // iadd s because the migration comprihonsion 

            $table->id();
            
            $table->foreignId('book_id')->constrained('books_mohammed_agha')->onDelete('cascade');
            $table->string('borrower_name');
            $table->string('borrower_mobile');
            $table->date('borrow_end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books_mohammed_agha');
    }
};
