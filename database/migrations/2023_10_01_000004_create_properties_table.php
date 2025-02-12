<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->decimal('price', 12, 2);
            $table->string('property_type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('square_feet');
            $table->decimal('lot_size', 10, 2)->nullable();
            $table->integer('year_built')->nullable();
            $table->text('description')->nullable();
            $table->text('measurements')->nullable();
            $table->text('location')->nullable();
            $table->decimal('area', 10, 2)->nullable();
            $table->decimal('frontage_measurement', 10, 2)->nullable();
            $table->foreignId('status_id')->nullable()->constrained('property_status')->nullOnDelete();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
