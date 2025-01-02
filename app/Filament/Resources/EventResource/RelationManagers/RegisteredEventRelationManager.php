<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Event;
use App\Models\RegisteredEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class RegisteredEventRelationManager extends RelationManager
{
    protected static string $relationship = 'RegisteredEvents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('registeredEvents')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {

        return $table
            ->recordTitleAttribute('registeredEvents')
            ->header(function(){
                $users = $this->getOwnerRecord()->registeredEvents()->count();
                $revenue =  $this->getOwnerRecord()->registeredEvents()->sum('paid_amount');

                return new HtmlString("
                <div class='flex items-center justify-between p-4 bg-gray-100 rounded'>
                <span class='text-sm text-gray-600'>Total Registration: {$users}</span>
                <span class='text-sm text-gray-600'>Revenue: {$revenue}</span>
                </div>"
            );
            })
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    // ->relationship('user', 'name')
                    ->label('User Name'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email'),
                // Add other columns you want to display in the table
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
