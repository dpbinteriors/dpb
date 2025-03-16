<?php
//
//namespace App\Filament\Resources;
//
//use App\Filament\Resources\ReferenceResource\Pages;
//use App\Filament\Resources\ReferenceResource\RelationManagers;
//use App\Models\Reference;
//use Filament\Forms;
//use Filament\Forms\Form;
//use Filament\Pages\Actions\ButtonAction;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;
//
//class ReferenceResource extends Resource
//{
//    protected static ?string $model = Reference::class;
//    protected static ?int $navigationSort = 3;
//
//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//
//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Forms\Components\FileUpload::make('image_path')
//                    ->image()
//                    ->label(__("panel.image"))
//                    ->directory('references_logo')
//                    ->columnSpanFull(12),
//
//                Forms\Components\TextInput::make('title')
//                    ->label(__("panel.title"))
//                    ->required()->columnSpanFull(12),
//
//                Forms\Components\TextInput::make('company_website')
//                    ->label(__("panel.company_website"))
//                    ->url()
//                    ->required()->columnSpanFull(12),
//                // Float Right
//                Forms\Components\Toggle::make('is_published')
//                    ->label(__("panel.is_published"))
//                    ->default(true)
//                    ->columnSpanFull(12)->columnStart(11),
//            ])->columns(12);
//    }
//
//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                Tables\Columns\TextColumn::make('title')->label(__("panel.title")),
//                Tables\Columns\TextColumn::make('company_website')->label(__("panel.company_website")),
//                // Show is_publish when clicked change the status
//                Tables\Columns\ToggleColumn::make('is_published')->label(__("panel.is_published")),
//            ])
//            ->filters([
//                //
//            ])
//            ->actions([
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => Pages\ManageReferences::route('/'),
//        ];
//    }
//
//    public static function getModelLabel(): string
//    {
//        return __('panel.supplier');
//    }
//
//    public static function getNavigationLabel(): string
//    {
//        return __('panel.suppliers');
//    }
//}
