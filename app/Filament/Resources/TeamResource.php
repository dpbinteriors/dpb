<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;

use App\Models\Team;
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

class TeamResource extends Resource
{
    use Translatable;
    use HasTimeStamp;

    protected static ?string $model = Team::class;
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
                            ->directory('article_main_images')
                            ->visibility('public')->image()
                            ->optimize('webp')
                            ->columnSpan(12),

                        TextInput::make('title')
                            ->label(__('panel.title'))
                            ->columnSpan(12)
                            ->required(),



                        TextInput::make('position_name')
                            ->label(__('panel.position_name'))
                            ->columnSpan(12),


                        TextInput::make('twitter_url')
                            ->label(__('panel.twitter_url'))
                            ->columnSpan(6),

                        TextInput::make('instagram_url')
                            ->label(__('panel.instagram_url'))
                            ->columnSpan(6),

                        TextInput::make('linkedin_url')
                            ->label(__('panel.linkedin_url'))
                            ->columnSpan(6),

                        TextInput::make('behance_url')
                            ->label(__('panel.behance_url'))
                            ->columnSpan(6),


                    ])->columns(12)->columnSpan(8),
                Section::make(__("panel.publish_settings"))
                    ->schema([
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
            ])->reorderable('position');
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeam::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.team');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.team');
    }
}
