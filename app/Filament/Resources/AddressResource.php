<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    use Translatable;
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?int $navigationSort = 20;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label(__('panel.title'))
                    ->columnSpan(12)
                    ->required(),
                TextInput::make('url')
                    ->label(__('panel.location_link'))
                    ->columnSpan(12)
                    ->required(),
                TextInput::make('address')
                    ->label(__('panel.address'))
                    ->columnSpan(12)
                    ->required(),
                TextInput::make('phone')
                    ->label(__('panel.phone'))
                    ->columnSpan(4),
                TextInput::make('fax')
                    ->label(__('panel.fax'))
                    ->columnSpan(4),
                TextInput::make('mail')
                    ->label(__('panel.mail'))
                    ->columnSpan(4),

                TextInput::make('wp_number')
                    ->label(__('panel.wp_number'))
                    ->helperText('Sadece ilk oluşturulan iletişim adresinde yer alan WhatsApp numarası siteye eklenir.')
                    ->columnSpan(4),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('panel.title'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.contact_address');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.contact_addresses');
    }

}
