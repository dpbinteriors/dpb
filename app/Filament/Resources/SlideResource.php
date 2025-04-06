<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\ReplicateAction;

use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;

use Filament\Forms;
use Filament\Forms\Components\Checkbox;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideResource extends Resource
{
    use Translatable;

    protected static ?string $model = Slide::class;
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("panel.general_settings"))
                    ->schema([

                        FileUpload::make('image')
                            ->label(__('panel.main_image') . ' (1920x430)')
                            ->directory('home_slides')
                            ->visibility('public')
                            ->required()
                            ->columnSpan(12)
                            ->image()
                            ->previewable()
                            ->optimize('webp')
                            ->imageEditor(),

                        FileUpload::make('second_image')
                            ->label(__('panel.second_image') . ' (824x1830)')
                            ->directory('home_slides')
                            ->visibility('public')
                            ->required()
                            ->columnSpan(12)
                            ->image()
                            ->previewable()
                            ->optimize('webp')
                            ->imageEditor(),


                        TextInput::make('title')
                            ->columnSpan(6)
                            ->translateLabel()
                            ->label(__('panel.title')),

                        TextInput::make('description')
                            ->label(__('panel.tag'))
                            ->columnSpan(6),


                    ])->columns(12)->columnSpan(8),
                Section::make(__("panel.publish_settings"))
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label(__('panel.is_published'))
                            ->columnSpan('full'),
                        DateTimePicker::make('publish_at')
                            ->required()
                            ->label(__('panel.publish_at'))
                            //Set default to yesterday
                            ->default(now()->subDay())
                            ->columnSpan('full'),
                        DateTimePicker::make('publish_until')
                            ->label(__('panel.publish_until'))
                            ->columnSpan('full')
                    ])->columnSpan(4),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('panel.main_image')),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_at')->label(__('panel.publish_at'))->dateTime(),
                Tables\Columns\ToggleColumn::make('is_published')->label(__("panel.is_published")),
                //Delete Action
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
            ->defaultSort('position', 'asc')
            ->actions([
                ReplicateAction::make(),
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('position');
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.slide');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.slides');
    }
}
