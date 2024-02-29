<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'letters_id'
    ];

    public function letter(){
        return $this->belongsTo(Letter::class, 'letters_id');
    }

    public function categories(){
        return $this->hasMany(Category::class, 'services_id');
    }

    public function queue(){
        return $this->hasMany(Queue::class, 'services_id');
    }
}
