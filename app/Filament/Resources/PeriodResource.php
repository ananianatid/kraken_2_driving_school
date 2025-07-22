<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodResource\Pages;
use App\Filament\Resources\PeriodResource\RelationManagers;
use App\Models\Period;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodResource extends Resource
{
    protected static ?string $model = Period::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Done';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la période')
                    ->disabled()
                    ->dehydrated(), // Pour que la valeur soit bien envoyée lors de la sauvegarde
                Forms\Components\DatePicker::make('start_month')
                    ->label('Mois de début')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $start = $state;
                        $end = $get('end_month');
                        if ($start && $end) {
                            $set('name', date('Y-m', strtotime($start)) . ' - ' . date('Y-m', strtotime($end)));
                        }
                    }),
                Forms\Components\DatePicker::make('end_month')
                    ->label('Mois de fin')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $start = $get('start_month');
                        $end = $state;
                        if ($start && $end) {
                            $set('name', date('Y-m', strtotime($start)) . ' - ' . date('Y-m', strtotime($end)));
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
                Tables\Columns\TextColumn::make('start_month')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_month')
                    ->date()
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
            'index' => Pages\ListPeriods::route('/'),
            'create' => Pages\CreatePeriod::route('/create'),
            'view' => Pages\ViewPeriod::route('/{record}'),
            'edit' => Pages\EditPeriod::route('/{record}/edit'),
        ];
    }
}
