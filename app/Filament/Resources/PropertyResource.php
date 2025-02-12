<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('address')
                    ->required()
                    ->label('Dirección'),
                TextInput::make('city')
                    ->required()
                    ->label('Ciudad'),
                TextInput::make('state')
                    ->required()
                    ->label('Estado'),
                TextInput::make('zip_code')
                    ->required()
                    ->label('Código Postal'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Precio'),
                Select::make('property_type')
                    ->options([
                        'House' => 'Casa',
                        'Apartment' => 'Apartamento',
                        'Land' => 'Terreno',
                    ])
                    ->required()
                    ->label('Tipo de Propiedad'),
                TextInput::make('bedrooms')
                    ->numeric()
                    ->label('Habitaciones'),
                TextInput::make('bathrooms')
                    ->numeric()
                    ->label('Baños'),
                TextInput::make('square_feet')
                    ->numeric()
                    ->label('Metros Cuadrados'),
                TextInput::make('lot_size')
                    ->numeric()
                    ->label('Tamaño del Lote'),
                DatePicker::make('year_built')
                    ->label('Año de Construcción'),
                Textarea::make('description')
                    ->label('Descripción'),
                TextInput::make('measurements')
                    ->label('Medidas'),
                TextInput::make('location')
                    ->label('Ubicación'),
                TextInput::make('area')
                    ->label('Área'),
                TextInput::make('frontage_measurement')
                    ->label('Medida de Frente'),
                Select::make('status_id')
                    ->relationship('status', 'status_name')
                    ->required()
                    ->label('Estado'),
                Select::make('project_id')
                    ->relationship('project', 'name')
                    ->label('Proyecto'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('property_type')
            ->columns([
                TextColumn::make('address')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('state')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ManageProperties::route('/'),
        ];
    }
}
