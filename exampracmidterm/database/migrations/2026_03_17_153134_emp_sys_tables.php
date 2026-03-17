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
        Schema::create('employees', function(Blueprint $table) 
        {
            $table->id();
        $table->string('employee_id')->unique(); // Must be unique (e.g., EID-01)
        $table->string('firstname');
        $table->string('lastname');
        $table->enum('department', ['IT', 'Math']); // IT or Math
        $table->string('photo')->nullable();
        $table->timestamp('date_created')->useCurrent();
        });

        Schema::create('logs', function(Blueprint $table) 
        {
        $table->id();
        $table->string('employee_id'); 
        $table->time('timein')->nullable();
        $table->time('timeout')->nullable();
        $table->string('type'); // am or pm
        $table->string('status'); // late, undertime, overtime
        $table->date('log_date'); // To ensure unique per day
        $table->timestamp('date_created')->useCurrent();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
