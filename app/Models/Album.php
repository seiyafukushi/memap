<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'ASC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
    protected $fillable = [
        'album_name',
        'album_date',
        'album_memo',
        'user_id',
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class);  
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resions(){
        return $this->belongsToMany(Region::class);
    }
}
