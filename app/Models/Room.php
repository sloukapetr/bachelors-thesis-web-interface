<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Others
//use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

class Room extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $guarded = [];

    public function accessUsers()
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id')->withPivot('child');
    }

    public function history()
    {
        return $this->hasMany(TempHistory::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($room) { // before delete() method call this
            $room->accessUsers()->detach();
        });
    }
}
