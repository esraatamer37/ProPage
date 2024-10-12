<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'featured_image'
    ];

    // Relationship with User
    private mixed $user_id;
    private mixed $description;

    public static function create(array $array)
    {
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getContent()
    {
        return $this->description;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}

