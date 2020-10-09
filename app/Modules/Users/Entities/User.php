<?php

namespace App\Modules\Users\Entities;

use App\Constants\DBTables;
use Illuminate\Foundation\Auth\User as Auth;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Modules\Users\Entities
 */
class User extends Auth
{
    use HasRoles;
    protected $table = DBTables::USERS;

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'mobile_number',
        'otp',
        'otp_generated_at',
        'status',
        'notification_enabled',
        'external_id',
        'country_code',
    ];
}
