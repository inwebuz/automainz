<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('background')->nullable();
            $table->text('images')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('body')->nullable();
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('sale_price', 15, 2)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->unsignedBigInteger('views')->default(0);
            $table->bigInteger('order')->default(0);
            $table->decimal('rating', 8, 2)->default(5);

            $table->foreignId('make_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('car_model_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('car_modification_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->text('vin')->nullable();
            $table->integer('year')->default(0);
            $table->integer('mileage')->default(0);

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
        Schema::dropIfExists('cars');
    }
}
