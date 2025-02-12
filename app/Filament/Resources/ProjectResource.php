<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre'),
                Textarea::make('description')
                    ->label('Descripción'),
                DatePicker::make('start_date')
                    ->required()
                    ->label('Fecha de Inicio'),
                DatePicker::make('end_date')
                    ->label('Fecha de Fin'),
                Select::make('status')
                    ->options([
                        'Planned'   => 'Planned',
                        'Ongoing'   => 'Ongoing',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ])
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label('Fecha de Inicio')
                    ->date(),
                TextColumn::make('end_date')
                    ->label('Fecha de Fin')
                    ->date()
                ,
                TextColumn::make('status')
                    ->label('Estado'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Planned'   => 'Planned',
                        'Ongoing'   => 'Ongoing',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ]),


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
            'index' => Pages\ManageProjects::route('/'),
        ];
    }
}
