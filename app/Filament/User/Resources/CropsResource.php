<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CropsResource\Pages;
use App\Filament\User\Resources\CropsResource\RelationManagers;
use App\Models\Crops;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CropsResource extends Resource
{
    protected static ?string $model = Crops::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-sparkles'; // Symbolizes growth
    protected static ?int $navigationSort = 2; 

    protected static ?string $navigationGroup = 'Farm Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('farm_id')
                ->relationship('farm', 'name', function (Builder $query) {
                    $query->where('user_id', Auth::id()); // Restrict farms to the logged-in user
                })
                ->required()
                ->label('Farm'),

                TextInput::make('name')
                    ->required()
                    ->label('Crop Name'),

                DatePicker::make('planting_date')
                    ->required()
                    ->label('Planting Date'),

                DatePicker::make('harvest_date')
                    ->label('Harvest Date'),

                TextInput::make('fertilizers_used')
                    ->label('Fertilizers Used'),
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->query(fn (Builder $query) => $query->whereHas('farm', function ($query) {
            //     $query->where('user_id', Auth::id()); // Restrict crops to the logged-in user's farms
            // }))
            ->columns([
                TextColumn::make('farm.name')
                    ->label('Farm')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Crop Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('planting_date')
                    ->label('Planting Date')
                    ->date(),

                TextColumn::make('harvest_date')
                    ->label('Harvest Date')
                    ->date(),

                TextColumn::make('fertilizers_used')
                    ->label('Fertilizers Used')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->defaultSort('planting_date', 'desc')
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
            'index' => Pages\ListCrops::route('/'),
            'create' => Pages\CreateCrops::route('/create'),
            'edit' => Pages\EditCrops::route('/{record}/edit'),
        ];
    }
}
