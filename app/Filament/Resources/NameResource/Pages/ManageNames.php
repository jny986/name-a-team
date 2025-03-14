<?php

namespace App\Filament\Resources\NameResource\Pages;

use App\Filament\Resources\NameResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNames extends ManageRecords
{
    protected static string $resource = NameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
