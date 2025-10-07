<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('fines', function (Blueprint $table) {
        $table->id();
        $table->foreignId('borrow_id')->constrained('borrow_records')->onDelete('cascade');
        $table->enum('fine_type', ['Late', 'Damage']);
        $table->decimal('amount', 10, 2);
        $table->text('remarks')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fines');
    }
}
