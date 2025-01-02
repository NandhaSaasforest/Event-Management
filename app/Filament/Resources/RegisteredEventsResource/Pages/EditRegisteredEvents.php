<?php

namespace App\Filament\Resources\RegisteredEventsResource\Pages;

use App\Filament\Resources\RegisteredEventsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisteredEvents extends EditRecord
{
    protected static string $resource = RegisteredEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
