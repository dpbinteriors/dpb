<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunicationFormResource\Pages;
use App\Filament\Resources\CommunicationFormResource\RelationManagers;
use App\Forms\Components\HtmlViewer;
use App\Models\CommunicationForm;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

//php artisan make:filament-resource CommunicationForm --generate --simple
class CommunicationFormResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = CommunicationForm::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        $canManageCommunicationForms = Auth::user()->can('manage_communication::form');
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('send_to')
                    ->required()
                    ->label('Email')
                    ->maxLength(255),
                TagsInput::make('cc_to')
                    ->separator(',')
                    ->nestedRecursiveRules([
                        'email',
                    ])
                    ->columnSpanFull()
                    ->label('CC')
                    ->placeholder('Email'),
                TagsInput::make('bcc_to')
                    ->separator(',')
                    ->columnSpanFull()
                    ->label('BCC')
                    ->placeholder('Email')
                    ->nestedRecursiveRules([
                        'email',
                    ]),
                TextInput::make('key')->columnSpanFull()
                    ->hidden(!$canManageCommunicationForms),

            ]);
    }

    public static function table(Table $table): Table
    {

        $canManageCommunicationForms = Auth::user()->can('manage_communication::form');
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('send_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('key')
                    ->searchable()->hidden(!$canManageCommunicationForms),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCommunicationForms::route('/'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'manage',
            'delete',
            'delete_any'
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.communication-form');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.communication-forms');
    }

    public static function getNavigationGroup(): string
    {
        return __('panel.general-settings');
    }
}
