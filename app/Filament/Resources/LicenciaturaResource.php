<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenciaturaResource\Pages;
use App\Filament\Resources\LicenciaturaResource\RelationManagers;
use App\Models\Licenciatura;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LicenciaturaResource extends Resource
{
    protected static ?string $model = Licenciatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    
    
    
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Section::make('Llene los campos del formulario')
                    //->description('Llene los campos para crear una nueva licenciatura')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nombre')
                                    ->required()
                                    ->label('Nombre de la licenciatura')
                                    ->placeholder('Ingrse el nombre de la licenciatura')
                                    ->maxLength(255),
                                Forms\Components\Select::make('sistema')
                                    ->options([
                                        'escolarizado' => 'Escolarizado',
                                        'modular' => 'Modular',
                                    ])
                                    ->required(),
                            ])
                    ])    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->label('Nro')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sistema'),
                //Tables\Columns\TextColumn::make('acciones'),
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
                Tables\Actions\EditAction::make()
                ->button()
                ->color('success'),
               // ->icon('heroicon-o-pencil')
               // ->label('Editar')

               Tables\Actions\DeleteAction::make()
                ->button()
                ->color('danger'),
                //->icon('heroicon-o-trash')
                //->label('Eliminar')
                
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
            'index' => Pages\ListLicenciaturas::route('/'),
            'create' => Pages\CreateLicenciatura::route('/create'),
            'edit' => Pages\EditLicenciatura::route('/{record}/edit'),
        ];
    }
}
