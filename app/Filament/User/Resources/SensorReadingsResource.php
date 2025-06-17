<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\SensorReadingsResource\Pages;
use App\Filament\User\Resources\SensorReadingsResource\RelationManagers;
use App\Models\SensorReadings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SensorReadingsResource extends Resource
{
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $model = SensorReadings::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('farm.name')->label('Farm')->sortable(),
                Tables\Columns\TextColumn::make('moisture')->label('Moisture Level'),
                Tables\Columns\TextColumn::make('temperature')->label('Temperature')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Recorded At')->dateTime()->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSensorReadings::route('/'),
            'create' => Pages\CreateSensorReadings::route('/create'),
            'edit' => Pages\EditSensorReadings::route('/{record}/edit'),
        ];
    }
}
