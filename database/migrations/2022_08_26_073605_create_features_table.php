<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_group_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->tinyInteger('source')->default(0);
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
            $table->bigInteger('order')->default(0);
            $table->text('additional_info')->nullable();
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
        Schema::dropIfExists('features');
    }
}
