<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'project_id';

    protected $attributes = [
        'name' => 'hola',
    ];

    //Scopes
    public function scopeActive($query) {
        return $query->where('is_active', 1);
    }
}
