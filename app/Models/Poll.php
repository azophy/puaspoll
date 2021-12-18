<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'choice',
        'expire_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'choice' => 'array',
        'expire_time' => 'datetime',
    ];

    /**
     * Get choice in sorted condition
     *
     * @param  bool  $isDescending
     * @return void
     */
    public function getSortedChoiceAttribute($isDescending=true)
    {
        $sortedChoice = json_decode(json_encode($this->choice), true);
        $sortOrder = $isDescending ? 1 : -1;

        usort($sortedChoice, function($a, $b) use ($sortOrder) {
            return $sortOrder * ($a['score'] - $b['score']);
        });

        return $sortedChoice;
    }
}
