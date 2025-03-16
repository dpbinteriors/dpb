<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaLinkResource\Pages;
use App\Models\SocialMediaLink;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaLinkResource extends Resource
{
    protected static ?string $model = SocialMediaLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';
    protected static ?int $navigationSort = 21;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__("panel.title"))
                    ->required()
                    ->columnSpan(12),
                Forms\Components\TextInput::make('url')
                    ->label(__("panel.social_media_link"))
                    ->required()
                    ->url()
                    ->columnSpan(12),
                FileUpload::make('image_path')
                    ->label(__('panel.main_image'))
                    ->directory('social_media_icons')
                    ->visibility('public')
                    ->required()
                    ->columnSpan(12)
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->numeric()
                    ->sortable(),
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->reorderable('position');;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSocialMediaLinks::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.social_media_link');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.social_media_links');
    }

}
