<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Cars\Status;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = ['brand', 'model', 'transmission'];

    protected $guarded = [];

    protected $casts = [
        'status' => Status::class
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function fullName()
    {
        return $this->brand->title . ' ' . $this->model;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
