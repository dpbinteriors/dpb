<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommercialRoomsResource\Pages;
use App\Filament\Resources\CommercialRoomsResource\RelationManagers;
use App\Models\Article;
use App\Models\CommercialRooms;
use App\Models\ResidentialRooms;
use App\Traits\HasTimeStamp;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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

class CommercialRoomsResource extends Resource
{
    use Translatable;
    use HasTimeStamp;

    protected static ?string $model = CommercialRooms::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("panel.general_settings"))
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('panel.main_image'))
                            ->directory('commercial_rooms')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*', 'video/mp4'])
                            ->maxSize(10240) // 10 MB
                            ->columnSpan(12)
                            ->helperText('Yalnızca görsel veya MP4 video dosyaları yükleyin. Maksimum boyut: 10MB.'),


                        TextInput::make('title')
                            ->label(__('panel.title'))
                            ->columnSpan(12)
                            ->required()




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

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommercialRoom::route('/'),
            'create' => Pages\CreateCommercialRoom::route('/create'),
            'edit' => Pages\EditCommercialRoom::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.commercial_rooms');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.commercial_rooms');
    }
}
