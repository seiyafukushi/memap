<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    
    public function album()
    {
        return $this->belongsToMany(Album::class);
    }
    
    protected $fillable = [
        'region_name',
        'region_address',
    ];
}
