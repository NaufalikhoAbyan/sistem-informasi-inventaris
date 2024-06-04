<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_outs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('out_date');
            $table->integer('out_quantity');
            $table->foreignIdFor(Item::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_outs');
    }
};
