<?php

namespace App\Filament\Resources\EventsResource\Pages;

use App\Filament\Resources\EventsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use \Illuminate\Database\Eloquent\Model;

class CreateEvents extends CreateRecord
{
    protected static string $resource = EventsResource::class;
}
