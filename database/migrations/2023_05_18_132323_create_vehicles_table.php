<?php

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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('board_number');
            $table->string('license_plate');
            $table->unsignedBigInteger('brand_vehicle_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->softDeletes();

            // Индексы
            $table->index('vehicle_type_id', 'vehicle_vehicle_type_idx');
            $table->index('company_id', 'vehicle_company_idx');
            $table->index('brand_vehicle_id', 'vehicle_brand_vehicle_id_idx');

            // Внешние ключи
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('brand_vehicle_id')->references('id')->on('brand_vehicles')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
