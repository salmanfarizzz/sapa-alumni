<?php
use App\Models\Semester;
use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Semester::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(TahunAkademik::class)->constrained()->cascadeOnUpdate();
            $table->integer('total_points')->nullable();
            $table->enum('status', ['alumni', 'mitra']);
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
        Schema::dropIfExists('results');
    }
};
