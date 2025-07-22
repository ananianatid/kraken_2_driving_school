<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicClassResource\Pages;
use App\Filament\Resources\AcademicClassResource\RelationManagers;
use App\Models\AcademicClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicClassResource extends Resource
{
    protected static ?string $model = AcademicClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la classe')
                    ->disabled()
                    ->dehydrated(),
                Forms\Components\Select::make('period_id')
                    ->label('Période')
                    ->relationship('period', 'name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $periodId = $state;
                        $licenceId = $get('licence_id');
                        $periodName = null;
                        $licenceName = null;
                        if ($periodId) {
                            $period = \App\Models\Period::find($periodId);
                            $periodName = $period?->name;
                        }
                        if ($licenceId) {
                            $licence = \App\Models\License::find($licenceId);
                            $licenceName = $licence?->name;
                        }
                        if ($periodName && $licenceName) {
                            $set('name', $periodName . ' - ' . $licenceName);
                        }
                    }),
                Forms\Components\Select::make('licence_id')
                    ->label('Licence')
                    ->relationship('licence', 'name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $periodId = $get('period_id');
                        $licenceId = $state;
                        $periodName = null;
                        $licenceName = null;
                        if ($periodId) {
                            $period = \App\Models\Period::find($periodId);
                            $periodName = $period?->name;
                        }
                        if ($licenceId) {
                            $licence = \App\Models\License::find($licenceId);
                            $licenceName = $licence?->name;
                        }
                        if ($periodName && $licenceName) {
                            $set('name', $periodName . ' - ' . $licenceName);
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('period_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('licence_id')
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
            'index' => Pages\ListAcademicClasses::route('/'),
            'create' => Pages\CreateAcademicClass::route('/create'),
            'view' => Pages\ViewAcademicClass::route('/{record}'),
            'edit' => Pages\EditAcademicClass::route('/{record}/edit'),
        ];
    }
}
