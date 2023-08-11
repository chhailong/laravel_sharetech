<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Electronic;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'electronic_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function electronics()
    {
        return $this->belongsTo(Electronic::class);
    }

    use HasFactory;
}
