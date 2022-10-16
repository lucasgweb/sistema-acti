<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'name',
        'status',
        'amount_hours',
        'category_id'
    ];
    public function category()
    {
        return $this->HasOne(Category::class, 'id','category_id');
    }
}
