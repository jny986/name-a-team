<?php

namespace App\Observers;

use App\Models\Team;
use Illuminate\Support\Str;

class TeamObserver
{
    public function creating(Team $team): Team
    {
        if (empty($name->name)) {
            $team = $this->processName($team);
        }

        return $team;
    }

    public function updating(Team $team): Team
    {
        if ($team->isDirty()) {
            $team = $this->processName($team);
        }

        return $team;
    }

    protected function processName(Team $team): Team
    {
        $team->name = Str::kebab($team->label);

        return $team;
    }
}
