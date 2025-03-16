<?php
//
//namespace App\Filament\Resources;
//
//use App\Filament\Resources\BannerResource\Pages;
//use App\Models\Banner;
//use Filament\Forms;
//use Filament\Forms\Form;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//use Filament\Forms\Components\FileUpload;
//use Filament\Forms\Components\Section;
//use Filament\Forms\Components\TextInput;
//use Filament\Forms\Components\DateTimePicker;
//use Filament\Forms\Components\Toggle;
//use Filament\Resources\Concerns\Translatable;
//
//class BannerResource extends Resource
//{
//    use Translatable;
//    protected static ?string $model = Banner::class;
//
//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//
//
//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                // General Settings Section
//                Section::make(__("panel.general_settings"))
//                    ->schema([
//                        FileUpload::make('image_path')
//                            ->label(__('panel.main_image'))
//                            ->image()
//                            ->optimize('webp')
//                            ->columnSpan(12)
//                            ->required(),
//                        TextInput::make('title')
//                            ->required()
//                            ->label(__('panel.title'))
//                            ->columnSpan(12),
//                        TextInput::make('caption')
//                            ->label(__('panel.caption'))
//                            ->columnSpan(12),
//                        TextInput::make('button_text')
//                            ->columnSpan(6)
//                            ->label(__('panel.button_text')),
//                        TextInput::make('button_url')
//                            ->columnSpan(6)
//                            ->label(__('panel.button_url')),
//                    ])->columns(12)->columnSpan(8), // Genel Ayarlar Bölümü, 8 kolonluk alan kaplayacak
//
//                // Publish Settings Section
//                Section::make(__('panel.publish_settings'))
//                    ->schema([
//                        Toggle::make('is_published')
//                            ->columnSpan(12)
//                            ->label(__('panel.is_published'))
//                            ->required(),
//                        DateTimePicker::make('publish_at')
//                            ->label(__('panel.publish_at'))
//                            ->columnSpan(12),
//                        DateTimePicker::make('publish_until')
//                            ->label(__('panel.publish_until'))
//                            ->columnSpan(12),
//                    ])->columns(12)->columnSpan(4), // Yayın Ayarları Bölümü, 4 kolonluk alan kaplayacak
//            ])->columns(12); // Formda toplam 12 kolon var
//    }
//
//    public static function table(Table $table): Table
//    {
//        return $table
//
//            ->columns([
//
//                Tables\Columns\TextColumn::make('title')
//                    ->searchable()
//                    ->label(__('panel.title'))
//                    ->sortable(),
//                Tables\Columns\IconColumn::make('is_published')
//                    ->label(__('panel.is_published'))
//                    ->boolean(),
//                Tables\Columns\TextColumn::make('publish_at')
//                    ->dateTime()
//                    ->label(__('panel.publish_at'))
//                    ->sortable(),
//
//            ])
//            ->filters([
//                //
//            ])
//            ->defaultSort('order', 'asc')
//            ->actions([
//                Tables\Actions\EditAction::make(),
//            ])
//            ->reorderable('order')
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
//
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => Pages\ListBanners::route('/'),
//            'create' => Pages\CreateBanner::route('/create'),
//            'edit' => Pages\EditBanner::route('/{record}/edit'),
//        ];
//    }
//}
