<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->unique();
            $table->boolean('show_banner')->default(0);
            $table->boolean('show_recently')->default(0);
            $table->boolean('show_most_read')->default(0);
            $table->boolean('show_most_read_sidebar')->default(0);
            $table->boolean('show_featured')->default(0);
            $table->boolean('show_featured_sidebar')->default(0);
            $table->boolean('normal')->default(0);
            $table->boolean('show_big')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_detail');
    }
}
