<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunicationMessageResource\Pages;
use App\Filament\Resources\CommunicationMessageResource\RelationManagers;
use App\Forms\Components\HtmlViewer;
use App\Models\CommunicationMessage;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class CommunicationMessageResource extends Resource
{
    protected static ?string $model = CommunicationMessage::class;
    protected static ?string $recordTitleAttribute = 'communication_form.title';

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('communication_form_id')
                    ->label(__("panel.form-name"))
                    ->relationship('communication_form', 'title', fn(Builder $query) => $query)
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Textarea::make('body')
                    ->label(__("panel.form-body"))
                    ->hidden()
                    ->required()
                    ->columnSpanFull()->hiddenOn(['view']),
                HtmlViewer::make('body')->hiddenLabel()->disabled()->columnSpanFull()->hiddenOn(['create', 'edit'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('communication_form.title')
                    ->numeric()
                    ->label(__('panel.form-name'))
                    ->sortable(),
                IconColumn::make('is_read')->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->label(__("panel.is-read")),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('panel.created-at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordClasses(fn(Model $record) => match ($record->is_read) {
                0 => 'bg-primary-500',
                default => null,
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->mutateRecordDataUsing(function (array $data): array {
                    $record = self::getModel()::find($data['id']);
                    $record->is_read = true;
                    $record->save();
                    return $data;
                }),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])->headerActions([
                ExportAction::make()->exports([
                    ExcelExport::make('table')
                        ->fromTable()
                        ->withFilename(fn($resource) => $resource::getLabel())
//                        ->modifyQueryUsing(function ($query) {
//                            return $query->where('exportable', true);
//                        }),
                ])
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
            'index' => Pages\ListCommunicationMessages::route('/'),
            'create' => Pages\CreateCommunicationMessage::route('/create'),
            'edit' => Pages\EditCommunicationMessage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.communication-message');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.communication-message');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->where('is_read', false)->count();
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->communication_form->title . '-' . $record->created_at;
    }
}
