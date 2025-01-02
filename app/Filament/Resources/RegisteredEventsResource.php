<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegisteredEventsResource\Pages;
use App\Filament\Resources\RegisteredEventsResource\RelationManagers;
use App\Models\RegisteredEvent;
use App\Models\RegisteredEvents;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegisteredEventsResource extends Resource
{
    protected static ?string $model = RegisteredEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->rules([
                        fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            $event = $get('event_id'); // Assume 'date' is also part of the form
                            $recordId = $get('user_id');
                            $duplicateQuery = RegisteredEvent::where('user_id', $value)->where('event_id', $event);
                            if ($recordId) {
                                $duplicateQuery->where('id', '!=', $recordId);
                            }

                            if ($duplicateQuery->exists()) {
                                $fail('The user already registered for this event');
                            }
                        }
                    ])
                    ->required(),
                Forms\Components\Select::make('event_id')
                    ->required()
                    ->relationship('events', 'event_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('events.event_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegisteredEvents::route('/'),
            'create' => Pages\CreateRegisteredEvents::route('/create'),
        ];
    }
}
