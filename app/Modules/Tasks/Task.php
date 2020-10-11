<?php
namespace App\Modules\Tasks;

use App\Constants\DBTables;
use App\Core\Entities\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends BaseModel
{
    protected $table = DBTables::TASKS;
    const STATUS_TO_DO = "TO DO";

    const STATUS_FILTERS    = ["TO DO", "IN PROGRESS", "RESOLVED", "CLOSED", "COMPLETED"];

    protected $fillable = ['task_number','title','description','status','created_by','updated_by',
        'deleted_by'];

}
