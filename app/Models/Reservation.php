<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'representation_id',
        'user_id',
        'places',
    ];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the representation for this reservation
     */
    public function representation()
    {
        return $this->belongsTo(Representation::class);
    }

    /**
     * Get the user for this reservation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
