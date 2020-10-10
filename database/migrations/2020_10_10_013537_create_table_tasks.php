<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\DBTables;

class CreateTableTasks extends Migration
{
    use EditorLogTraits;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTables::TASKS, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('task_number',30);
            $table->string('title');
            $table->text('description');
            $table->string('status');

            $this->timeAndEditorLogs($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::TASKS);
    }
}
