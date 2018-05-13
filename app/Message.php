<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message.
 *
 * @method static Builder related(User $user, User $user)
 * @method static $this create(array $params)
 */
class Message extends Model
{
    protected $fillable = [
        'code',
        'text',
        'receiver_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * @param Builder $query
     * @param User    $me
     * @param User    $another
     */
    public function scopeRelated(Builder $query, User $me, User $another)
    {
        $query->where(function (Builder $query) use ($me, $another) {
            $query->where('sender_id', '=', $me->id)
                ->where('receiver_id', '=', $another->id);
        })->orWhere(function (Builder $query) use ($me, $another) {
            $query->where('sender_id', '=', $another->id)
                ->where('receiver_id', '=', $me->id);
        });
    }
}
