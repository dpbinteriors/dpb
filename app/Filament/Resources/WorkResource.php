<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Filament\Resources\WorkResource\RelationManagers;
use App\Models\Project;
use App\Models\Works;
use App\Traits\HasTimeStamp;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\WorksCategories;

class WorkResource extends Resource
{
    use Translatable;
    use HasTimeStamp;

    protected static ?string $model = Works::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("panel.general_settings"))
                    ->schema([
                        FileUpload::make('image_path')
                            ->label(__('panel.main_image'))
                            ->directory('works_main_images')
                            ->visibility('public')->image()
                            ->optimize('webp')
                            ->columnSpan(12),


                        TextInput::make('title')
                            ->label(__('panel.title'))
                            ->columnSpan(12)
                            ->required(),

                        TextInput::make('caption')
                            ->label(__('panel.caption'))
                            ->columnSpan(12)
                            ->required(),

                        TextInput::make('style')
                            ->label(__('panel.style'))
                            ->columnSpan(6)
                            ->required(),

                        TextInput::make('tag')
                            ->label(__('panel.tag'))
                            ->columnSpan(6)
                            ->required(),

                        RichEditor::make('description')
                            ->label(__('panel.description'))
                            ->columnSpan(12)
                            ->required(),



                        Select::make('category_id')
                            ->label(__('panel.category'))
                            ->columnSpan(6)
                            ->options(WorksCategories::all()->pluck('title', 'id'))
                            ->native(false)
                            ->required(),


                        FileUpload::make('gallery')
                            ->label(__("Gallery"))
                            ->directory('article_gallery')
                            ->extraAttributes(['class' => 'gallery-section'])
                            ->reorderable()
                            ->multiple()
                            ->imagePreviewHeight('100')
                            ->downloadable()
                            ->image()
                            ->panelLayout('circular')->columnSpan(12),

                    ])->columns(12)->columnSpan(8),
                Section::make(__("panel.publish_settings"))
                    ->schema([
                        Toggle::make('is_promoted')
                            ->label(__('panel.promote'))
                            ->default(false)
                            ->columnSpan(12),
                        ...self::timeStampFields(),
                    ])->columnSpan(4),


            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('createdBy.name')->label(__('panel.created_by'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_at')
                    ->label(__('panel.publish_at'))
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label(__('panel.is_published'))
                    ->sortable()
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
            ])->reorderable('order')
            ->defaultSort('order');
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
            'index' => Pages\ListWork::route('/'),
            'create' => Pages\CreateWork::route('/create'),
            'edit' => Pages\EditWork::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.works');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.works');
    }
}
