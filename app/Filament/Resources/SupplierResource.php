<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\SupplierResource\Pages;
// use App\Filament\Resources\SupplierResource\RelationManagers;
// use App\Models\Supplier;
// use Filament\Forms;
// use Filament\Forms\Components\FileUpload;
// use Filament\Forms\Components\TextInput;
// use Filament\Forms\Form;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Columns\TextColumn;
// use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

// class SupplierResource extends Resource
// {
//     protected static ?string $model = Supplier::class;

//     protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//     protected static ?int $navigationSort = 18;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 FileUpload::make('image_path')
//                     ->label(__('panel.main_image'))
//                     ->directory('suppliers')
//                     ->visibility('public')->image()
//                     ->columnSpan(12),
//                 TextInput::make('title')
//                     ->required()
//                     ->columnSpan(6),
//                 Forms\Components\TextInput::make('company_website')
//                     ->label('Website')
//                     ->columnSpan(6),
//             ])->columns(12);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([

//                 TextColumn::make('title')

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
//             ]);
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ManageSuppliers::route('/'),
//         ];
//     }

//     public static function getModelLabel(): string
//     {
//         return __('panel.supplier');
//     }

//     public static function getNavigationLabel(): string
//     {
//         return __('panel.suppliers');
//     }
// }
