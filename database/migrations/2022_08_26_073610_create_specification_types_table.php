<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specification_group_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('specification_types');
    }
}
