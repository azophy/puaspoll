<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    const VOTE_BUDGET = 100;

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

    static function findBySlugOrFail($slug)
    {
        $poll = Poll::where(compact('slug'))
            ->where(function($query) {
                $query->whereNull('expire_time')
                      ->orWhereRaw('expire_time > now()');
            })
            ->first();
        if (empty($poll)) abort(404, 'Poll not found');

        return $poll;
    }

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
