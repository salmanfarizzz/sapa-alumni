<?php
use App\Models\Semester;
use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Semester::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(TahunAkademik::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->longText('question_text');
            $table->enum('tipe', ['esai', 'pilihan']);
            $table->enum('status', ['mitra', 'alumni']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
