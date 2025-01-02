<?php

namespace App\Filament\Resources\RegisteredEventsResource\Pages;

use App\Filament\Resources\RegisteredEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegisteredEvents extends ListRecords
{
    protected static string $resource = RegisteredEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
