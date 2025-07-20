<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionRoleResource\Pages;
use App\Filament\Resources\PermissionRoleResource\RelationManagers;
use App\Models\PermissionRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionRoleResource extends Resource
{
    protected static ?string $model = PermissionRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('permission_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('role_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('permission_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPermissionRoles::route('/'),
            'create' => Pages\CreatePermissionRole::route('/create'),
            'view' => Pages\ViewPermissionRole::route('/{record}'),
            'edit' => Pages\EditPermissionRole::route('/{record}/edit'),
        ];
    }
}
