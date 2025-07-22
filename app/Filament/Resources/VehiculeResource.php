<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiculeResource\Pages;
use App\Filament\Resources\VehiculeResource\RelationManagers;
use App\Models\Vehicule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehiculeResource extends Resource
{
    protected static ?string $model = Vehicule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Done';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('licence_plate')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('license_id')
                    ->label('Licence')
                    ->relationship('license', 'name')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options([
                        'disponible' => 'Disponible',
                        'occupe' => 'Occupé',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('licence_plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license.name')
                    ->label('Licence')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListVehicules::route('/'),
            'create' => Pages\CreateVehicule::route('/create'),
            'view' => Pages\ViewVehicule::route('/{record}'),
            'edit' => Pages\EditVehicule::route('/{record}/edit'),
        ];
    }
}
