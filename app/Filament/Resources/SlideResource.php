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

                        Forms\Components\Select::make('media_type_select')
                            ->label('Medya Türü Seçin')
                            ->options([
                                'video' => 'Video',
                                'image' => 'Görsel',
                            ])
                            ->reactive()
                            ->required()
                            ->dehydrated(false) // veritabanına yazılmaz
                            ->default(fn ($get, $record) => $record?->video ? 'video' : 'image') // ilk yüklemede ayarla
                            ->afterStateHydrated(function ($state, callable $set, $get, $record) {
                                // Form yüklendiğinde değer boşsa tahmin et
                                if (! $state && $record) {
                                    $set('media_type_select', $record->video ? 'video' : 'image');
                                }
                            })
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Seçim değiştiğinde diğer dosyaları sıfırla
                                $set('video', null);
                                $set('second_image', null);
                            })
                            ->columnSpan(12),


                        FileUpload::make('video')
                            ->label('Video (Önerilen: 1920x430)')
                            ->directory('home_slides')
                            ->visibility('public')
                            ->acceptedFileTypes(['video/mp4', 'video/webm'])
                            ->maxSize(102400) // 100 MB
                            ->required(fn ($get) => $get('media_type_select') === 'video')
                            ->visible(fn ($get) => $get('media_type_select') === 'video')
                            ->columnSpan(12),

                        FileUpload::make('second_image')
                            ->label('Görsel (Önerilen: 1920x430)')
                            ->directory('home_slides')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(10240) // 10 MB
                            ->required(fn ($get) => $get('media_type_select') === 'image')
                            ->visible(fn ($get) => $get('media_type_select') === 'image')
                            ->columnSpan(12),




                        TextInput::make('title')
                            ->columnSpan(6)
                            ->translateLabel()
                            ->label(__('panel.title')),

                        TextInput::make('type')
                            ->columnSpan(6)
                            ->translateLabel()
                            ->label(__('panel.type')),

                        TextInput::make('slogan')
                            ->columnSpan(6)
                            ->translateLabel()
                            ->label(__('panel.slogan')),

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
