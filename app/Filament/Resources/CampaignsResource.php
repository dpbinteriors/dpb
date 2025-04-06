<?php
//
//namespace App\Filament\Resources;
//
//use App\Filament\Resources\CampaignsResource\Pages;
//use App\Filament\Resources\CampaignsResource\RelationManagers;
//use App\Models\Campaign;
//use Filament\Actions\Action;
//use Filament\Forms\Components\DateTimePicker;
//use Filament\Tables\Actions\ReplicateAction;
//
//use Filament\Forms\Components\RichEditor;
//use Filament\Tables\Actions\DeleteAction;
//
//use Filament\Forms;
//use Filament\Forms\Components\Checkbox;
//use Filament\Forms\Components\FileUpload;
//use Filament\Forms\Components\Section;
//use Filament\Forms\Components\Textarea;
//use Filament\Forms\Components\DatePicker;
//use Filament\Forms\Components\TextInput;
//use Filament\Forms\Form;
//use Filament\Resources\Concerns\Translatable;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;
//
//class CampaignsResource extends Resource
//{
//    use Translatable;
//
//    protected static ?string $model = Campaign::class;
//    protected static ?int $navigationSort = 1;
//
//    protected static ?string $navigationIcon = 'heroicon-o-photo';
//
//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Section::make(__("panel.general_settings"))
//                    ->schema([
//
//                        FileUpload::make('campaign_image')
//                            ->label(__('panel.main_image') . ' (1920x430)')
//                            ->directory('campaign_image')
//                            ->visibility('public')
//                            ->required()
//                            ->columnSpan(12)
//                            ->image()
//                            ->previewable()
//                            ->optimize('webp')
//                            ->imageEditor(),
//
//
//                        TextInput::make('title')
//                            ->columnSpan(12)
//                            ->translateLabel()
//                            ->label(__('panel.title')),
//
//                        Textarea::make('description')
//                            ->label(__('panel.description'))
//                            ->columnSpan(12),
//
//                        TextInput::make('button_text')
//                            ->label(__('panel.button_text'))
//                            ->columnSpan(6),
//
//                        TextInput::make('button_url')
//                            ->label(__('panel.button_url'))
//                            ->columnSpan(6),
//
//                        DatePicker::make('campaign_start_date')
//                            ->label(__('panel.campaign_start_date'))
//                            ->columnSpan(6)
//                            ->required(),
//
//                        DatePicker::make('campaign_end_date')
//                            ->label(__('panel.campaign_end_date'))
//                            ->columnSpan(6)
//                            ->required(),
//
//                    ])->columns(12)->columnSpan(8),
//                Section::make(__("panel.publish_settings"))
//                    ->schema([
//                        Forms\Components\Toggle::make('is_published')
//                            ->label(__('panel.is_published'))
//                            ->columnSpan('full'),
//                        DateTimePicker::make('publish_at')
//                            ->required()
//                            ->label(__('panel.publish_at'))
//                            //Set default to yesterday
//                            ->default(now()->subDay())
//                            ->columnSpan('full'),
//                        DateTimePicker::make('publish_until')
//                            ->label(__('panel.publish_until'))
//                            ->columnSpan('full')
//                    ])->columnSpan(4),
//            ])->columns(12);
//    }
//
//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                Tables\Columns\ImageColumn::make('image')
//                    ->label(__('panel.main_image')),
//                Tables\Columns\TextColumn::make('title')
//                    ->searchable()
//                    ->limit(50)
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('publish_at')->label(__('panel.publish_at'))->dateTime(),
//                Tables\Columns\ToggleColumn::make('is_published')->label(__("panel.is_published")),
//                //Delete Action
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//            ])
//            ->filters([
//                //
//            ])
//            ->defaultSort('position', 'asc')
//            ->actions([
//                ReplicateAction::make(),
//                Tables\Actions\EditAction::make(),
//                DeleteAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ])
//            ->reorderable('position');
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
//            'index' => Pages\ListCampaigns::route('/'),
//            'create' => Pages\CreateCampaign::route('/create'),
//            'edit' => Pages\EditCampaign::route('/{record}/edit'),
//        ];
//    }
//
//    public static function getModelLabel(): string
//    {
//        return __('panel.Campaign');
//    }
//
//    public static function getNavigationLabel(): string
//    {
//        return __('panel.Campaign');
//    }
//}
