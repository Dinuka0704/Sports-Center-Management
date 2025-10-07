<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('borrow_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->foreignId('equipment_id')->constrained('equipment')->onDelete('cascade');
        $table->date('borrow_date');
        $table->date('due_date');
        $table->date('return_date')->nullable();
        $table->enum('status', ['Borrowed', 'Returned', 'Overdue'])->default('Borrowed');
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
        Schema::dropIfExists('borrow_records');
    }
}
