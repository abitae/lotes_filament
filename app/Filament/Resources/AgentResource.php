<?php
namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Models\Agent;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->required()
                    ->label('Nombre'),
                TextInput::make('last_name')
                    ->required()
                    ->label('Apellido'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Correo Electrónico'),
                TextInput::make('phone')
                    ->label('Teléfono'),
                TextInput::make('license_number')
                    ->label('Licencia'),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('agents')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->imageEditorViewportWidth('1920')
                    ->imageEditorViewportHeight('1080'),
                Select::make('status')
                    ->options([
                        'Active'     => 'Active',
                        'Inactive' => 'Inactive',
                        'Suspended' => 'Suspended',
                    ])
                    ->native(false),
                Select::make('manager_id')
                    ->label('Manager')
                    ->options(Agent::all()->pluck('first_name', 'id'))
                    ->searchable()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('license_number')
                    ->label('Licencia')
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->square(),
                TextColumn::make('manager.first_name')
                    ->label('Manager'),
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
            'index' => Pages\ManageAgents::route('/'),
        ];
    }

}
