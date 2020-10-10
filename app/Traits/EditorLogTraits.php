<?php

use App\Constants\DBTables;
use Illuminate\Database\Schema\Blueprint;

/**
 * Trait EditorLogTraits
 */
trait EditorLogTraits
{
    public function timeAndEditorLogs(Blueprint $table)
    {
        $table->unsignedBigInteger('created_by')->index()->nullable();
        $table->unsignedBigInteger('updated_by')->index()->nullable();
        $table->unsignedBigInteger('deleted_by')->index()->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('created_by')->references('id')->on(DBTables::USERS);
        $table->foreign('updated_by')->references('id')->on(DBTables::USERS);
        $table->foreign('deleted_by')->references('id')->on(DBTables::USERS);
    }
}
