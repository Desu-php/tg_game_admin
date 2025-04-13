<?php

namespace App\Filament\Resources\Aspect;

use App\Filament\Resources\Aspect\AspectStatResource\Pages;
use App\Filament\Resources\Aspect\AspectStatResource\RelationManagers;
use App\Models\Aspect\Aspect;
use App\Models\Aspect\AspectStat;
use App\Models\Item\Rarity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AspectStatResource extends Resource
{
    protected static ?string $model = AspectStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('aspect_id')
                    ->options(Aspect::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('start_level')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                Forms\Components\TextInput::make('end_level')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                Forms\Components\TextInput::make('damage')
                    ->integer()
                    ->minValue(0)
                    ->required()
                    ->default(0),
                Forms\Components\TextInput::make('critical_damage')
                    ->integer()
                    ->minValue(0)
                    ->required()
                    ->default(0),
                Forms\Components\TextInput::make('critical_chance')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->default(0),
                Forms\Components\TextInput::make('gold_multiplier')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->default(0),
                Forms\Components\TextInput::make('amount')
                    ->integer()
                    ->minValue(1)
                    ->required()
                    ->default(1),
                Forms\Components\TextInput::make('amount_growth_factor')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->default(0),
                Forms\Components\TextInput::make('passive_damage')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('start_level'),
                Tables\Columns\TextColumn::make('end_level'),
                Tables\Columns\TextColumn::make('aspect.name'),
                Tables\Columns\TextColumn::make('damage'),
                Tables\Columns\TextColumn::make('critical_damage'),
                Tables\Columns\TextColumn::make('critical_chance'),
                Tables\Columns\TextColumn::make('gold_multiplier'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('amount_growth_factor'),
                Tables\Columns\TextColumn::make('passive_damage'),
                Tables\Columns\TextColumn::make('created_at'),
                Tables\Columns\TextColumn::make('updated_at'),
            ])
            ->filters([
                SelectFilter::make('aspect_id')
                    ->label('Аспект')
                    ->relationship('aspect', 'name'),
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
            'index' => Pages\ListAspectStats::route('/'),
            'create' => Pages\CreateAspectStat::route('/create'),
            'edit' => Pages\EditAspectStat::route('/{record}/edit'),
        ];
    }
}
