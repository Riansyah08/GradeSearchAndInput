<?php

use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
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
        Schema::create('course_grade', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Grade::class)->onDelete('cascade');
            $table->foreignIdFor(Faculty::class)->onDelete('cascade');
            $table->foreignIdFor(Course::class)->onDelete('cascade');
            $table->foreignIdFor(Student::class)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_grade');
    }
};
