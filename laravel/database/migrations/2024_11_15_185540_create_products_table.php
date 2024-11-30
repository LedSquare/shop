<?php

use App\Models\Catalog\Catalog;
use App\Models\Catalog\Product\Brand\Brand;
use App\Models\Catalog\Product\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Catalog::class, 'catalog_id');
            $table->foreignIdFor(Brand::class, 'brand_id')->nullable(true);
            $table->foreignIdFor(Type::class, 'type_id')->nullable(true);
            $table->string('name');
            $table->string('full_name');
            $table->string('image');
            $table->text('description');
            $table->boolean('publish');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
