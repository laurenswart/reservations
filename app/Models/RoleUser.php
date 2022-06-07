<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id', 
        'user_id',
    ];

    protected $table = 'role_user';
    public $timestamps = false;
    
    /**
     * Get the show of the performance (artist in a type of collaboration for a show)
     */
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the artist for that association.
     */
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    
}
