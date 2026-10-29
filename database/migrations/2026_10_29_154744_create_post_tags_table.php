<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger(column: 'post_id');
            $table->unsignedBigInteger(column: 'tag_id');

            $table->index(columns: 'post_id', name: 'post_tag_post_idx');
            $table->index(columns: 'tag_id', name: 'post_tag_tag_idx');

            $table->foreign(columns: 'post_id', name: 'post_tag_post_fk')->on('posts')->references('id');
            $table->foreign(columns: 'tag_id', name: 'post_tag_tag_fk')->on('tags')->references('id');

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
        Schema::dropIfExists('post_tags');
    }
};
