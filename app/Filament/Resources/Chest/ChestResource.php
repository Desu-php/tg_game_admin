<?php

namespace App\Filament\Resources\Chest;

use App\Filament\Resources\Chest\ChestResource\Pages;
use App\Filament\Resources\Chest\ChestResource\RelationManagers;
use App\Models\Chest;
use App\Models\Item\Rarity;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;

class ChestResource extends Resource
{
    protected static ?string $model = Chest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->required(),
                TextInput::make('health')
                    ->integer()
                    ->minLength(1),
                Toggle::make('is_default')
                    ->required(),
                TextInput::make('growth_factor')
                    ->required()
                    ->numeric(),
                TextInput::make('amount_growth_factor')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->integer(),
                TextInput::make('start_level')
                    ->integer()
                    ->required(),
                TextInput::make('end_level')
                    ->integer()
                    ->required(),
                Select::make('rarity_id')
                    ->options(Rarity::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('max_rarity_id')
                    ->options(Rarity::query()->pluck('name', 'id'))
                    ->searchable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name'),
                ImageColumn::make('image'),
                TextColumn::make('health'),
                TextColumn::make('is_default'),
                TextColumn::make('is_default'),
                TextColumn::make('growth_factor'),
                TextColumn::make('amount'),
                TextColumn::make('amount_growth_factor'),
                TextColumn::make('start_level'),
                TextColumn::make('end_level'),
                TextColumn::make('rarity.name'),
                TextColumn::make('maxRarity.name'),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
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
            'index' => Pages\ListChests::route('/'),
            'create' => Pages\CreateChest::route('/create'),
            'edit' => Pages\EditChest::route('/{record}/edit'),
        ];
    }
}
