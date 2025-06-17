<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CropsRelationManager extends RelationManager
{
    protected static string $relationship = 'crops';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('isblockchain', true))
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Crop Name')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('farm.name')
                    ->label('Farm')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('planting_date')
                    ->date()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('harvest_date')
                    ->date()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('fertilizers_used'),
                    
                Tables\Columns\IconColumn::make('isblockchain')
                    ->label('Blockchain')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'planted' => 'primary',
                        'growing' => 'warning',
                        'harvested' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\Filter::make('blockchain_only')
                    ->query(fn (Builder $query): Builder => $query->where('isblockchain', true))
                    ->default()
                    ->label('Blockchain Crops Only'),
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('saveToBlockchain')
                    ->label('Save to Blockchain')
                    ->icon('heroicon-o-cloud-arrow-up')
                    ->color('success')
                    ->visible(fn ($record) => !$record->isblockchain) // show only if not yet on blockchain
                    ->action(function ($record) {
                        // Your blockchain logic here
                        // Example: dispatch a job or call a service
                        $record->update([
                            'isblockchain' => true,
                        ]);

                        // Optional: Trigger blockchain logic (e.g., Web3 PHP call, job dispatch)
                        // BlockchainService::storeCrop($record);

                        filament()->notify('success', 'Crop saved to blockchain.');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}