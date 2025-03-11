<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    public function up()
{
    Schema::create('food_items', function (Blueprint $table) {
        $table->id();
        $table->string('item_name');
        $table->string('item_id');
        $table->string('brand_name');
        $table->integer('nf_calories');
        $table->integer('nf_total_fat');
        $table->timestamps();
    });
}

}
