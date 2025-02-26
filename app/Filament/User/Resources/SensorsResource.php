<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\SensorsResource\Pages;
use App\Filament\User\Resources\SensorsResource\RelationManagers;
use App\Models\Sensors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SensorsResource extends Resource
{
    protected static ?string $model = Sensors::class;

    protected static ?string $navigationIcon = 'heroicon-o-rss'; // Represents signals/waves (like sensors)
    protected static ?int $navigationSort = 4; 

    protected static ?string $navigationGroup = 'Control';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('farm_id')
                ->label('Farm')
                ->relationship('farm', 'name', function (Builder $query) {
                    $query->where('user_id', Auth::id());
                })
                ->required(),
                Forms\Components\Select::make('type')
                ->required()
                ->label('Type')
                ->options([
                    "moisture" => "moisture",
                    "salinity" => "salinity",
                    "temperature" => "temperature",
                ]),
                Forms\Components\TextInput::make('location')->required(),
                Forms\Components\Toggle::make('status')->label('Active')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('farm.name')->label('Farm')->sortable(),
                Tables\Columns\TextColumn::make('type')->label('Type')->sortable(),
                Tables\Columns\TextColumn::make('location')->label('Location')->sortable(),
                Tables\Columns\ToggleColumn::make('status')->label('Active')
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
            'index' => Pages\ListSensors::route('/'),
            'create' => Pages\CreateSensors::route('/create'),
            'edit' => Pages\EditSensors::route('/{record}/edit'),
        ];
    }
}
