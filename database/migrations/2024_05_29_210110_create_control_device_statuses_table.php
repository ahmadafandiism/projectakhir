<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDeviceStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Periksa apakah tabel sudah ada sebelum mencoba membuatnya
        if (!Schema::hasTable('control_device_statuses')) {
            Schema::create('control_device_statuses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('device_id');
                $table->dateTime('status_time');
                $table->boolean('status');
                $table->timestamps();

                $table->foreign('device_id')->references('id')->on('control_devices')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_device_statuses');
    }
}
