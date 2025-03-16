<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\ApplicationResource\Pages;
// use App\Filament\Resources\ApplicationResource\RelationManagers;
// use App\Models\Application;
// use App\Models\CategoryType;
// use App\Traits\HasTimeStamp;
// use Filament\Forms\Components\RichEditor;
// use Filament\Forms\Components\Select;
// use Filament\Forms\Get;
// use Filament\Forms\Set;
// use Filament\Tables\Filters\SelectFilter;
// use Illuminate\Support\Str;
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
// use Illuminate\Database\Eloquent\SoftDeletingScope;

// class ApplicationResource extends Resource
// {
//     use Translatable;
//     use HasTimeStamp;

//     protected static ?string $model = Application::class;
//     protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
//     protected static ?int $navigationSort = 12;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 Section::make(__("panel.general_settings"))
//                     ->schema([
//                         FileUpload::make('image_path')
//                             ->label(__('panel.main_image'))
//                             ->directory('application_main_images')
//                             ->visibility('public')->image()
//                             ->columnSpan(12),

//                         TextInput::make('title')
//                             ->label(__('panel.title'))
//                             ->columnSpan(12),
// //
//                         Textarea::make('caption')
//                             ->label(__('panel.caption'))
//                             ->columnSpan(12),
//                             RichEditor::make('description')
//                             ->label(__('panel.description'))
//                             ->columnSpan(12),

//                         // Category Relationship
//                         Select::make('category_id')
//                             ->required()
//                             ->relationship(name: 'category', titleAttribute: 'title', modifyQueryUsing: function (Builder $query) {
//                                 $categoryType = CategoryType::where('key', 'APPLICATION')->first();
//                                 return $query->where('category_type_id', $categoryType->id);
//                             })
//                             ->label(__('panel.application_category'))
//                             ->createOptionAction(fn($action) => $action->label('Your label here'))
//                             ->getOptionLabelFromRecordUsing(fn($record, $Livewire) => $record->getTranslation('title', $Livewire->activeLocale))
//                             ->columnSpan(12),
//                         // -----

// //                        FileUpload::make('image_gallery')
// //                            ->label(__("Gallery"))
// //                            ->directory('application_gallery')
// //                            ->extraAttributes(['class' => 'gallery-section'])
// //                            ->reorderable()
// //                            ->multiple()
// //                            ->imagePreviewHeight('100')
// //                            ->downloadable()
// //                            ->image()
// //                            ->panelLayout('circular')->columnSpan(12),

//                     ])->columns(12)->columnSpan(8),
//                 Section::make(__("panel.publish_settings"))
//                     ->schema([
//                         ...self::timeStampFields(),
//                     ])->columnSpan(4),
//             ])->columns(12);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 Tables\Columns\TextColumn::make('title')
//                     ->label(__('panel.title'))
//                     ->searchable()
//                     ->sortable(query: fn(Builder $query, string $direction): Builder => $query->orderByWithLang('title', $direction, app()->currentLocale())),

//                 Tables\Columns\TextColumn::make('category.title')
//                     ->label(__('panel.application_category'))
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
//                     ->label(__('panel.application_category'))
//                     ->relationship(name: 'category', titleAttribute: 'title')
//                     ->getOptionLabelFromRecordUsing(fn($record, $Livewire) => $record->title)
//             ])
//             ->actions([
//                 Tables\Actions\EditAction::make(),
//                 Tables\Actions\DeleteAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ])->reorderable('position');
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
//             'index' => Pages\ListApplications::route('/'),
//             'create' => Pages\CreateApplication::route('/create'),
//             'edit' => Pages\EditApplication::route('/{record}/edit'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.application_type');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.application_types');
//     }
// }
