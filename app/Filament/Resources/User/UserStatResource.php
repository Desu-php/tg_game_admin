<?php

namespace App\Filament\Resources\User;

use App\Filament\Resources\User\UserStatResource\Pages;
use App\Filament\Resources\User\UserStatResource\RelationManagers;
use App\Models\Client\User;
use App\Models\Client\UserStat;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserStatResource extends Resource
{
    protected static ?string $model = UserStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->options(User::query()->pluck('username', 'id'))
                    ->searchable()
                    ->unique(
                        table: 'user_stats',
                        column: 'user_id',
                        ignoreRecord: true
                    )
                    ->required()
                    ->disabled(fn (string $context): bool => $context === 'edit'),
                TextInput::make('damage')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                TextInput::make('critical_damage')
                    ->integer()
                    ->minValue(0)
                    ->required(),
                TextInput::make('critical_chance')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->required(),
                TextInput::make('gold_multiplier')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->required(),
                TextInput::make('passive_damage')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('user.username')
                    ->url(fn(UserStat $userStat) => Filament::getResourceUrl($userStat->user, 'edit', ['record' => $userStat->user])),
                TextColumn::make('damage'),
                TextColumn::make('critical_damage'),
                TextColumn::make('critical_chance'),
                TextColumn::make('gold_multiplier'),
                TextColumn::make('passive_damage'),
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
            'index' => Pages\ListUserStats::route('/'),
            'create' => Pages\CreateUserStat::route('/create'),
            'edit' => Pages\EditUserStat::route('/{record}/edit'),
        ];
    }
}
