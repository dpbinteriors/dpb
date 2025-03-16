<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\ProjectResource\Pages;
// use App\Filament\Resources\ProjectResource\RelationManagers;
// use App\Models\Project;
// use App\Traits\HasTimeStamp;
// use Filament\Forms\Components\Repeater;
// use Filament\Forms\Components\RichEditor;
// use Filament\Forms\Components\Toggle;
// use Filament\Forms\Get;
// use Filament\Forms\Set;
// use Illuminate\Support\Str;
// use Filament\Forms;
// use Filament\Forms\Components\DateTimePicker;
// use Filament\Forms\Components\FileUpload;
// use Filament\Forms\Components\Section;
// use Filament\Forms\Components\Select;
// use Filament\Forms\Components\Textarea;
// use Filament\Forms\Components\TextInput;
// use Filament\Forms\Form;
// use Filament\Resources\Concerns\Translatable;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
// use App\Models\ProjectCategory;
// class ProjectResource extends Resource
// {
//     use Translatable;
//     use HasTimeStamp;

//     protected static ?string $model = Project::class;
//     protected static ?string $navigationIcon = 'heroicon-o-book-open';
//     protected static ?int $navigationSort = 2;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 Section::make(__("panel.general_settings"))
//                     ->schema([
//                         FileUpload::make('image')
//                             ->label(__('panel.main_image'))
//                             ->directory('project_main_images')
//                             ->visibility('public')->image()
//                             ->optimize('webp')
//                             ->columnSpan(12),

//                         TextInput::make('title')
//                             ->label(__('panel.title'))
//                             ->columnSpan(12)
//                             ->required(),

//                         Textarea::make('caption')
//                             ->label(__('panel.caption'))
//                             ->columnSpan(12),

//                         TextInput::make('location')
//                             ->label(__('panel.location'))
//                             ->columnSpan(6)
//                             ->required(),

// //                        RichEditor::make('description')
// //                            ->label(__('panel.description'))
// //                            ->columnSpan(12),

//                         Select::make('category_id')
//                             ->label(__('panel.category'))
//                             ->columnSpan(6)
//                             ->options(ProjectCategory::all()->pluck('title', 'id'))
//                             ->native(false)
//                             ->required(),
//                     ])->columns(12)->columnSpan(8),
//                 Section::make(__("panel.publish_settings"))
//                     ->schema([
//                         Toggle::make('is_promoted')
//                             ->label(__('panel.promote'))
//                             ->default(false)
//                             ->columnSpan(12),
//                         ...self::timeStampFields(),
//                     ])->columnSpan(4),

//                 Repeater::make('Content Blocks')
//                     ->relationship('contentBlocks')
//                     ->label(__('panel.content_blocks'))
//                     ->schema([
//                         Select::make('type')->label(__('panel.type'))
//                             ->default('content')
//                             ->options([
//                                 'content' => __('panel.content'),
//                                 'gallery' => __('panel.gallery'),
//                             ])
//                             ->required()
//                             ->live()
//                             ->columnSpan(12),


//                         TextInput::make('title')
//                             ->hidden(fn (Get $get) => $get('type') !== 'content')
//                             ->label(__('panel.title'))
//                             ->columnSpan(12)
//                             ->required(),

//                         TextInput::make('button_text')
//                             ->hidden(fn(Get $get) => $get('type') !== 'content')
//                             ->label(__('panel.button_text'))
//                             ->columnSpan(6),

//                         TextInput::make('button_url')
//                             ->hidden(fn(Get $get) => $get('type') !== 'content')
//                             ->label(__('panel.button_url'))
//                             ->columnSpan(6),

//                         RichEditor::make('description')
//                             ->hidden(fn(Get $get) => $get('type') !== 'content')
//                             ->label(__('panel.description'))
//                             ->columnSpan(12),

//                         FileUpload::make('image_path')
//                             ->hidden(fn(Get $get) => $get('type') !== 'content')
//                             ->label(__('panel.image'))
//                             ->directory('project_images')
//                             ->visibility('public')->image()
//                             ->optimize('webp')
//                             ->columnSpan(12),

//                         FileUpload::make('image_gallery')
//                             ->hidden(fn(Get $get) => $get('type') === 'content')
//                             ->multiple()
//                             ->label(__('panel.image_gallery'))
//                             ->extraAttributes(['class' => 'gallery-section'])
//                             ->directory('project_images')
//                             ->visibility('public')->image()
//                             ->optimize('webp')
//                             ->columnSpan(12),
//                     ])
//                     ->columnSpan(12)
//                     ->grid(2)
//                     ->orderColumn('order')
//                     ->columns(12)
//             ])->columns(12);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([

//                 Tables\Columns\TextColumn::make('title')
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
//                 //
//             ])
//             ->actions([
//                 Tables\Actions\EditAction::make(),
//                 Tables\Actions\DeleteAction::make(),
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ])->reorderable('order')
//             ->defaultSort('order');
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
//             'index' => Pages\ListProjects::route('/'),
//             'create' => Pages\CreateWork::route('/create'),
//             'edit' => Pages\EditWork::route('/{record}/edit'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.project');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.projects');
//     }
// }
