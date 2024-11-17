<?php

use App\Models\Localization\Lang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('localizations', function (Blueprint $table) {
            $table->id();
            $table->morphs('localizationable');
            $table->foreignIdFor(Lang::class, 'lang_id');
            $table->string('field');
            $table->text('translate');
            $table->unique(['field', 'lang_id', 'localizationable_type', 'localizationable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizations');
    }
};
