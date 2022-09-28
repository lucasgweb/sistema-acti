<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
        'course_id',
        'channel_id',
        'description'
    ];

    public function course()
    {
       return $this->hasOne(Course::class,'id', 'course_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function situation()
    {
        return $this->hasOne(Situation::class, 'id', 'situation_id');
    }

    public function channel()
    {
        return $this->hasOne(Channel::class,'id','channel_id');
    }
}
