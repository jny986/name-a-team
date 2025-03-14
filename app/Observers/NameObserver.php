<?php

namespace App\Observers;

use App\Models\Name;
use Illuminate\Support\Str;

class NameObserver
{
    public function creating(Name $name): Name
    {
        if (empty($name->name)) {
            $name->name = $this->processName($name);
        }

        return $name;
    }

    public function updating(Name $name): Name
    {
        if ($name->isDirty()) {
            $name = $this->processName($name);
        }

        return $name;
    }

    protected function processName(Name $name): Name
    {
        $name->name = Str::kebab($name->label);

        return $name;
    }
}
