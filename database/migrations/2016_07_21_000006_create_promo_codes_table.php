<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')
                ->unique();
            $table->enum('type', ['percentage', 'amount']);
            $table->decimal('discount_amount', 19, 2)
                ->nullable();
            $table->decimal('discount_percent', 4, 4)
                ->nullable();
            $table->timestamp('active_on')
                ->nullable();
            $table->timestamp('expires_on')
                ->nullable();
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
        Schema::drop('promo_codes');
    }
}
