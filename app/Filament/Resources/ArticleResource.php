<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\ArticleResource\Pages;
// use App\Filament\Resources\ArticleResource\RelationManagers;
// use App\Models\Article;
// use App\Traits\HasTimeStamp;
// use Filament\Forms\Components\RichEditor;
// use Filament\Forms\Components\Toggle;
// use Filament\Forms\Get;
// use Filament\Forms\Set;
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

// class ArticleResource extends Resource
// {
//     use Translatable;
//     use HasTimeStamp;

//     protected static ?string $model = Article::class;
//     protected static ?string $navigationIcon = 'heroicon-o-book-open';
//     protected static ?int $navigationSort = 2;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 Section::make(__("panel.general_settings"))
//                     ->schema([
//                         FileUpload::make('image_path')
//                             ->label(__('panel.main_image'))
//                             ->directory('article_main_images')
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

//                         RichEditor::make('description')
//                             ->label(__('panel.description'))
//                             ->columnSpan(12),

//                         FileUpload::make('gallery')
//                             ->label(__("Gallery"))
//                             ->directory('article_gallery')
//                             ->extraAttributes(['class' => 'gallery-section'])
//                             ->reorderable()
//                             ->multiple()
//                             ->imagePreviewHeight('100')
//                             ->downloadable()
//                             ->image()
//                             ->panelLayout('circular')->columnSpan(12),

//                     ])->columns(12)->columnSpan(8),
//                 Section::make(__("panel.publish_settings"))
//                     ->schema([
//                         Toggle::make('is_promoted')
//                             ->label(__('panel.promote'))
//                             ->default(false)
//                             ->columnSpan(12),
//                         ...self::timeStampFields(),
//                     ])->columnSpan(4),
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
//             'index' => Pages\ListArticles::route('/'),
//             'create' => Pages\CreateArticle::route('/create'),
//             'edit' => Pages\EditArticle::route('/{record}/edit'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.article');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.articles');
//     }
// }
