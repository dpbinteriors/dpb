<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\CategoryResource\Pages;
// use App\Filament\Resources\CategoryResource\RelationManagers;
// use App\Models\Category;
// use App\Models\CategoryType;
// use Filament\Forms\Components\RichEditor;
// use Filament\Forms\Components\Section;
// use Filament\Forms\Components\Toggle;
// use Filament\Forms\Get;
// use Filament\Tables\Actions\ReplicateAction;
// use Illuminate\Support\Collection;

// use Filament\Forms\Components\FileUpload;
// use Filament\Forms\Components\Select;
// use Filament\Forms\Components\Textarea;
// use Filament\Forms\Components\TextInput;
// use Filament\Forms\Form;
// use Filament\Notifications\Actions\Action;
// use Filament\Notifications\Notification;
// use Filament\Resources\Concerns\Translatable;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Actions\DeleteAction;
// use Filament\Tables\Enums\FiltersLayout;
// use Filament\Tables\Filters\SelectFilter;
// use Filament\Tables\Filters\TernaryFilter;
// use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
// use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

// class CategoryResource extends Resource
// {
//     use Translatable;

//     protected static ?string $model = Category::class;
//     protected static ?int $navigationSort = 10;
//     protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema(array(
//                 Toggle::make('is_promoted')
//                     ->label(__('panel.promote'))
//                     ->default(false)
//                     ->columnStart(9)
//                     ->columnSpan(2),
//                 Toggle::make('is_published')
//                     ->label(__('panel.is_published'))
//                     ->default(true)
//                     ->columnSpan(2),

//                 FileUpload::make('image_path')
//                     ->label(__('panel.image'))
//                     ->directory('category_images')
//                     ->visibility('public')
//                     ->optimize('webp')
//                     ->image()
//                     ->columnSpan(12),

//                 TextInput::make('title')
//                     ->required()
//                     ->label(__('panel.title'))
//                     ->live()
//                     ->columnSpan(12),

//                 TextInput::make('caption')
//                     ->label(__('panel.caption'))
//                     ->columnSpan(12),

//                 TextInput::make('slug')
//                     // Refresh the field when the title changes
//                     ->hidden(fn(Get $get): bool => !config('app.debug'))
//                     ->label(__('panel.slug'))
//                     ->columnSpan(12),

//                 Select::make('category_type_id')
//                     ->relationship(name: 'categoryType', titleAttribute: 'title')
//                     ->required()
//                     ->live()
//                     ->label(__('panel.category_type'))
//                     ->getOptionLabelFromRecordUsing(fn($record, $livewire) => "{$record->id} - {$record->getTranslation('title', $livewire->activeLocale,true)}")
//                     ->columnSpan(6),

//                 Select::make('connected_category_id')
//                     ->hidden(fn(Get $get): bool => intval($get('category_type_id')) !== CategoryType::where('key', 'PRODUCT')->first()->id)
//                     ->label(__('panel.parent_category'))
//                     ->relationship(name: 'connectedCategory', titleAttribute: 'title', ignoreRecord: true)
//                     ->getOptionLabelFromRecordUsing(fn($record, $livewire) => "{$record->id} - {$record->getTranslation('title', $livewire->activeLocale,true)}")
//                     ->options(function (Get $get): Collection {
//                         return Category::query()
//                             ->where('category_type_id', $get('category_type_id'))
//                             ->where('id', '!=', $get('id'))
//                             ->pluck('title', 'id');
//                     })
//                     ->columnSpan(6),

//                 FileUpload::make('icon_path')
//                     ->label(__('panel.icon_path'))
//                     ->hidden(fn(Get $get): bool => intval($get('category_type_id')) !== CategoryType::where('key', 'APPLICATION')->first()->id)
//                     ->directory('category_images')
//                     ->visibility('public')
//                     ->image()
//                     ->columnSpan(6),

// //                Select::make('connected_category_id')
// //                    ->relationship(name: 'connectedCategory', titleAttribute: 'title', ignoreRecord: true)
// //                    ->label(__('panel.parent_category'))
// //                    ->getOptionLabelFromRecordUsing(fn($record, $livewire) => "{$record->id} - {$record->getTranslation('title', $livewire->activeLocale,true)}")
// //                    ->columnSpan(12),

//                 Section::make(__('panel.product_category'))
//                     ->hidden(fn(Get $get): bool => intval($get('category_type_id')) !== CategoryType::where('key', 'PRODUCT')->first()->id)
//                     ->schema([
//                         RichEditor::make('description')
//                             ->label(__('panel.description'))
//                             ->columnSpan(12),

// //                        FileUpload::make('second_image_path')
// //                            ->label(__('panel.category_second_image'))
// //                            ->directory('category_images')
// //                            ->visibility('public')
// //                            ->image()
// //                            ->columnSpan(6),



// //                        FileUpload::make('image_gallery')
// //                            ->multiple()
// //                            ->label(__('panel.image_gallery'))
// //                            ->directory('category_images')
// //                            ->visibility('public')
// //                            ->reorderable()
// //                            ->image()
// //                            ->extraAttributes(['class' => 'gallery-section-2'])
// //                            ->columnSpan(6),
//                     ])->columns(12),

//             ))->columns(12);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 Tables\Columns\TextColumn::make('title')
//                     ->searchable()
//                     ->sortable(query: fn(Builder $query, string $direction): Builder => $query->orderByWithLang('title', $direction, app()->currentLocale())),
//                 Tables\Columns\TextColumn::make('connectedCategory.title')
//                     ->label(__('panel.parent_category'))
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('createdBy.name')->label(__('panel.created_by'))
//                     ->searchable()
//                     ->sortable(),
//                 Tables\Columns\TextColumn::make('created_at')
//                     ->label(__('panel.created_at'))
//                     ->dateTime()
//                     ->searchable()
//                     ->sortable(),

//                 Tables\Columns\ToggleColumn::make('is_published')
//                     ->label(__('panel.is_published'))->sortable()
//             ])
//             ->filters([
//                 SelectFilter::make('category_type')
//                     ->label(__('panel.category_type'))
//                     ->relationship(name: 'categoryType', titleAttribute: 'title',)
//                     ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->getTranslation('title', $livewire->activeLocale))
//             ], layout: FiltersLayout::AboveContent)
//             ->actions([
//                 ReplicateAction::make(),
//                 Tables\Actions\EditAction::make(),
//                 DeleteAction::make()
//                     ->before(function (DeleteAction $action) {
//                         // Check is there any related records

//                         $connectedDocuments = $action->getRecord()->documents->count();
//                         $connectedProducts = $action->getRecord()->products->count();
//                         $connectedApplications = $action->getRecord()->applications->count();
//                         $connectedCategories = $action->getRecord()->connectedCategories->count();
//                         if ($connectedDocuments > 0 || $connectedProducts > 0 || $connectedApplications > 0 || $connectedCategories > 0) {
//                             Notification::make()
//                                 ->warning()
//                                 ->title(__('panel.related_records'))
//                                 ->body(__('panel.related_records_warning'))
//                                 ->send();
//                             $action->halt();
//                         }
//                     })
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
//             'index' => Pages\ListCategories::route('/'),
//             'create' => Pages\CreateCategory::route('/create'),
//             'edit' => Pages\EditCategory::route('/{record}/edit'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.category');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.category_management');
//     }
// }
