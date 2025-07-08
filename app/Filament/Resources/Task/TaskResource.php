<?php

namespace App\Filament\Resources\Task;

use App\Enums\AspectTypeEnum;
use App\Enums\TaskTypeEnum;
use App\Filament\Resources\Task\TaskResource\Pages;
use App\Filament\Resources\Task\TaskResource\RelationManagers;
use App\Models\Task\Task;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

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
                Forms\Components\Select::make('type')
                    ->options(TaskTypeEnum::class)
                    ->enum(TaskTypeEnum::class)
                    ->reactive()
                    ->required(),
                TextInput::make('target_value')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                TextInput::make('amount')
                    ->integer()
                    ->minValue(1)
                    ->required(),
                TextInput::make('data.link')
                    ->label('Link')
                    ->visible(fn(callable $get) => $get('type') === TaskTypeEnum::ClickLink->value)
                    ->required(fn(callable $get) => $get('type') === TaskTypeEnum::ClickLink->value)
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('target_value'),
                Tables\Columns\TextColumn::make('amount'),
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
