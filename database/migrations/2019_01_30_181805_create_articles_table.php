<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source_name')->nullable()->default(null)->index();
            $table->string('country')->nullable()->default(null)->index();
            $table->string('author')->nullable()->default(null)->index();
            $table->text('title')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('url')->nullable()->default(null);
            $table->text('urlToImage')->nullable()->default(null);
            $table->string('publishedAt')->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->string('category')->nullable()->default(null)->index();
            $table->string('source_url')->nullable()->default(null);
            $table->string('domain')->nullable()->default(null)->index();
            $table->string('status_code')->nullable()->default(null);
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
        Schema::dropIfExists('articles');
    }
}
