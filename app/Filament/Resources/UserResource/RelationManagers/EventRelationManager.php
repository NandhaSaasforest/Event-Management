<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class EventRelationManager extends RelationManager
{
    protected static string $relationship = 'events';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('yourEvents')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('events')
            ->header(function(){
                $events = $this->getOwnerRecord()->events()->count();
                $revenue =  $this->getOwnerRecord()->events()->sum('paid_amount');

                return new HtmlString("
                <div class='flex items-center justify-between p-4 bg-gray-100 rounded'>
                <span class='text-sm text-gray-600'>No. of Events: {$events}</span>
                <span class='text-sm text-gray-600'>Spent: {$revenue}</span>
                </div>"
            );
            })
            ->columns([
                Tables\Columns\TextColumn::make('event_name'),
                Tables\Columns\TextColumn::make('date'),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
                Tables\Columns\TextColumn::make('paid_amount')->prefix('$'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
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
