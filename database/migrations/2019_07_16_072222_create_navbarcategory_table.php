<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateNavbarcategoryTable extends Migration
{

    public function up()
    {
        Schema::create('navbar_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->string('slug', 40);
            $table->string('color', 40);
            $table->integer('parent_id')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navbar_category');
    }
}
