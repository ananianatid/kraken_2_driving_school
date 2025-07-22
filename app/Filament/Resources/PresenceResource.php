<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresenceResource\Pages;
use App\Filament\Resources\PresenceResource\RelationManagers;
use App\Models\Presence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresenceResource extends Resource
{
    protected static ?string $model = Presence::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Done';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->label('Cours')
                    ->options(
                        \App\Models\Course::all()->pluck('id', 'id') // Remplace 'id' par 'title' ou autre si tu as un champ plus parlant
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('student_id')
                    ->label('Élève')
                    ->options(
                        \App\Models\Student::with('user')->get()->pluck('user.name', 'id')
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options([
                        'present' => 'Présent',
                        'absent' => 'Absent',
                        'en_retard' => 'En retard',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('justification')
                    ->required()
                    ->maxLength(191),
                Forms\Components\FileUpload::make('justification_url')
                    ->label('Justificatif (photo)')
                    ->image()
                    ->directory('justificatifs')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.id')
                    ->label('ID Cours')
                    ->sortable(),
                // Si le modèle Course a un champ 'name', décommente la ligne suivante et commente la précédente :
                // Tables\Columns\TextColumn::make('course.name')->label('Cours')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('student.user.name')
                    ->label('Élève')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('justification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('justification_url')
                    ->label('Justificatif')
                    ->searchable(),
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
            'index' => Pages\ListPresences::route('/'),
            'create' => Pages\CreatePresence::route('/create'),
            'view' => Pages\ViewPresence::route('/{record}'),
            'edit' => Pages\EditPresence::route('/{record}/edit'),
        ];
    }
}
