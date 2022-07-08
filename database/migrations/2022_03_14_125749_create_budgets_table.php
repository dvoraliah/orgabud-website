<?php

use App\Models\User;
use App\Models\Year;
use App\Models\Field;
use App\Models\Month;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->decimal('value');
            $table->foreignIdFor(Field::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('month');
            $table->integer('year');            
            $table->boolean('is_debited')->default(0);
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
        Schema::dropIfExists('budgets');
    }
};
