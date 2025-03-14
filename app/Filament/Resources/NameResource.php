<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NameResource\Pages;
use App\Filament\Resources\NameResource\RelationManagers;
use App\Models\Name;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NameResource extends Resource
{
    protected static ?string $model = Name::class;
    protected static ?string $modelLabel  = 'Mythology Names';

    protected static ?string $navigationLabel = 'Mythology Names';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')
                    ->label('Name')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('pronunciation'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('pronunciation'),
                TextColumn::make('description')
                    ->wrap(),
                IconColumn::make('team_exists')->exists('team')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->trueColor('success')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNames::route('/'),
        ];
    }
}
