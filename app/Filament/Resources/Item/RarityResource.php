<?php

namespace App\Filament\Resources\Item;

use App\Filament\Resources\Item;
use App\Models\Item\Rarity;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RarityResource extends Resource
{
    protected static ?string $model = Rarity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('drop_weight')
                    ->integer()
                    ->required(),
                ColorPicker::make('color')
                    ->hexColor()
                    ->required(),
                TextInput::make('sort')
                    ->integer()
                    ->required(),
                TextInput::make('craft_chance')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->numeric(),
                TextColumn::make('drop_weight')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('description')
                    ->limit(),
                TextColumn::make('color'),
                TextColumn::make('sort')
                    ->sortable(),
                TextColumn::make('craft_chance')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),

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
            'index' => Item\RarityResource\Pages\ListRarities::route('/'),
            'create' => Item\RarityResource\Pages\CreateRarity::route('/create'),
            'edit' => Item\RarityResource\Pages\EditRarity::route('/{record}/edit'),
        ];
    }
}
