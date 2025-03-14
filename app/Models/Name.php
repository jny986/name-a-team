<?php

namespace App\Models;

use App\Observers\NameObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy(NameObserver::class)]
class Name extends Model
{
    protected $guarded = [];

    public function team(): HasOne
    {
        return $this->hasOne(Team::class);
    }
}
