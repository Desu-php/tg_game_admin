<?php

namespace App\Filament\Resources\Item;

use App\Models\Item\Item;
use App\Models\Item\ItemType;
use App\Models\Item\Rarity;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\Item\ItemResource\Pages\ListItems;
use App\Filament\Resources\Item\ItemResource\Pages\CreateItem;
use App\Filament\Resources\Item\ItemResource\Pages\EditItem;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('image')
                    ->acceptedFileTypes(['image/*'])
                    ->required(),
                Select::make('type_id')
                    ->options(ItemType::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('rarity_id')
                    ->options(Rarity::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('drop_chance')
                    ->integer()
                    ->minLength(1)
                    ->required(),
                TextInput::make('description')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('rarity.name')->sortable(),
                TextColumn::make('type.name')->sortable(),
                TextColumn::make('drop_chance')->sortable(),
                TextColumn::make('description')->sortable(),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListItems::route('/'),
            'create' => CreateItem::route('/create'),
            'edit' => EditItem::route('/{record}/edit'),
        ];
    }
}
