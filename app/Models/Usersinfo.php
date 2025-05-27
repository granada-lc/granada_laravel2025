<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usersinfo extends Model
{
    //
    use HasUuids;
    use HasFactory;
    use Notifiable;
    protected $table = 'usersinfo';  // Specifies the database table associated with this model.
    protected $fillable = [  // Defines which attributes can be mass assigned.
        'id',
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'username',
        'email',
        'password',
        'user_type',
    ];
    public $incrementing = false;  // Disables auto-incrementing of the primary key.
    protected $keyType = 'string';  // Specifies that the primary key is of type string (for UUIDs).
    
}
