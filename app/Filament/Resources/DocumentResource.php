<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\DocumentResource\Pages;
// use App\Filament\Resources\DocumentResource\RelationManagers;
// use App\Models\CategoryType;
// use App\Models\Document;
// use App\Models\Scopes\DatePublishedScope;
// use App\Traits\HasTimeStamp;
// use Filament\Forms\Components\Repeater;
// use Filament\Forms\Components\Select;
// use Filament\Tables\Filters\SelectFilter;
// use Filament\Forms;
// use Filament\Forms\Components\DateTimePicker;
// use Filament\Forms\Components\FileUpload;
// use Filament\Forms\Components\Section;
// use Filament\Forms\Components\Textarea;
// use Filament\Forms\Components\TextInput;
// use Filament\Forms\Form;
// use Filament\Resources\Concerns\Translatable;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

// class DocumentResource extends Resource
// {
//     use Translatable;
//     use HasTimeStamp;

//     protected static ?string $model = Document::class;
//     protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
//     protected static ?int $navigationSort = 4;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 Section::make(__("panel.general_settings"))
//                     ->schema([
//                         FileUpload::make('image_path')
//                             ->label(__('panel.image'))
//                             ->directory('document_images')
//                             ->visibility('public')
//                             ->image()
//                             ->columnSpan(12),

//                         TextInput::make('title')
//                             ->required()
//                             ->label(__('panel.title'))
//                             ->columnSpan(6),

//                         // Category Relationship
//                         Select::make('category_id')
//                             ->required()
//                             ->relationship(name: 'category', titleAttribute: 'title', modifyQueryUsing: function (Builder $query) {
//                                 $categoryType = CategoryType::where('key', 'DOCUMENT')->first();
//                                 return $query->where('category_type_id', $categoryType->id);
//                             })
//                             ->label(__('panel.document_category'))
//                             ->createOptionAction(fn($action) => $action->label('Your label here'))
//                             ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->getTranslation('title', $livewire->activeLocale))
//                             ->columnSpan(6),
//                         // -----

// //                        Textarea::make('description')
// //                            ->label(__('panel.description'))
// //                            ->columnSpan(12),
//                     ])->columns(12)->columnSpan(8),
//                 Section::make(__("panel.publish_settings"))
//                     ->schema([
//                         ...self::timeStampFields(),
//                     ])->columnSpan(4),

//                 Forms\Components\Fieldset::make(__('panel.files'))
//                     ->columns(12)
//                     ->schema([
//                         Repeater::make('files')
//                             ->relationship()
//                             ->hiddenLabel()
//                             ->schema([
//                                 Select::make('lang')
//                                     ->label(__('panel.document_language'))
//                                     ->options([
//                                         'TR' => 'Türkçe',
//                                         'EN' => 'English',
//                                         'FR' => 'French',
//                                         'DE' => 'German',
//                                         'RU' => 'Russian',
//                                         'AR' => 'Arabic',
//                                     ])
//                                     ->disableOptionsWhenSelectedInSiblingRepeaterItems()
//                                     ->required()
//                                     ->columnSpanFull(),
//                                 FileUpload::make('path')
//                                     ->label(__('panel.document'))
//                                     ->required()
//                                     ->openable()
//                                     ->directory('documents/')
//                                     ->visibility('public')->columnSpanFull(),
//                             ])
//                             ->orderColumn('position')
//                             ->reorderableWithButtons()
//                             ->addActionLabel(__('panel.add_file'))
//                             ->columns(2)
//                             ->grid(3)
//                             ->columnSpan(12)
//                     ]),

//             ])->columns(12);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 Tables\Columns\TextColumn::make('title')
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('category.title')->label(__('panel.document_category'))
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('createdBy.name')->label(__('panel.created_by'))
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('publish_at')
//                     ->label(__('panel.publish_at'))
//                     ->dateTime()
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\ToggleColumn::make('is_published')
//                     ->label(__('panel.is_published'))
//                     ->sortable()
//             ])
//             ->filters([
//                 SelectFilter::make('category')
//                     ->label(__('panel.document_category'))
//                     ->relationship(name: 'category', titleAttribute: 'title')
//                     ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->getTranslation('title', $livewire->activeLocale))
//             ])
//             ->actions([
//                 Tables\Actions\EditAction::make(),
//                 Tables\Actions\DeleteAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ])
//             ->reorderable('position')
//             ->defaultSort('position', 'asc');

//     }

//     public static function getRelations(): array
//     {
//         return [
//             //
//         ];
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListDocument::route('/'),
//             'create' => Pages\CreateDocument::route('/create'),
//             'edit' => Pages\EditDocument::route('/{record}/edit'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.document');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.documents');
//     }

//     public static function getEloquentQuery(): Builder
//     {
//         return parent::getEloquentQuery()->withoutGlobalScopes([DatePublishedScope::class]);
//     }

// }
