<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_modifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_model_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('background')->nullable();
            $table->text('images')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('body')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->foreignId('body_type_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('fuel_type_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('transmission_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->text('engine')->nullable();
            $table->text('сylinders')->nullable();
            $table->text('horsepower')->nullable();
            $table->text('mpg_city')->nullable();
            $table->text('mpg_hwy')->nullable();
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
        Schema::dropIfExists('car_modifications');
    }
}
