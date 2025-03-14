<?php

namespace App\Models;

use App\Observers\TeamObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([TeamObserver::class])]
class Team extends Model
{
    protected $guarded = [];

    public function name(): BelongsTo
    {
        return $this->belongsTo(Name::class);
    }
}
