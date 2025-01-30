<?php

namespace App\Filament\Resources\Client;

use App\Filament\Resources\Client\ReferralUserResource\Pages;
use App\Filament\Resources\Client\ReferralUserResource\RelationManagers;
use App\Models\Client\ReferralUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReferralUserResource extends Resource
{
    protected static ?string $model = ReferralUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.id')
                                         ->numeric()
                                         ->sortable(),
                Tables\Columns\TextColumn::make('referredUser.id')
                                         ->numeric()
                                         ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('user_id')
                            ->label('Пользователь')
                            ->relationship('user', 'username'), // Фильтр по умолчанию
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
            'index'  => Pages\ListReferralUsers::route('/'),
            'create' => Pages\CreateReferralUser::route('/create'),
            'edit'   => Pages\EditReferralUser::route('/{record}/edit'),
        ];
    }
}
