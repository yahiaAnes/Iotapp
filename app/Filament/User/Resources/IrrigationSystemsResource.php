<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\IrrigationSystemsResource\Pages;
use App\Models\IrrigationSystem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class IrrigationSystemsResource extends Resource
{
    protected static ?string $model = IrrigationSystem::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud'; 
    protected static ?int $navigationSort = 3; 

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
                Forms\Components\Select::make('mode')
                    ->options([
                        'manual' => 'Manual',
                        'automatic' => 'Automatic'
                    ])
                    ->required(),
                Forms\Components\Toggle::make('status')->label('System Active'),
                Forms\Components\DateTimePicker::make('last_run')->label('Last Run')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            
            ->columns([
                Tables\Columns\TextColumn::make('farm.name')->label('Farm')->sortable(),
                Tables\Columns\TextColumn::make('mode')->label('Mode')->sortable(),
                Tables\Columns\ToggleColumn::make('status')->label('System Active'),
                Tables\Columns\TextColumn::make('last_run')->label('Last Run')->dateTime(),
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
            'index' => Pages\ListIrrigationSystems::route('/'),
            'create' => Pages\CreateIrrigationSystems::route('/create'),
            'edit' => Pages\EditIrrigationSystems::route('/{record}/edit'),
        ];
    }
}
