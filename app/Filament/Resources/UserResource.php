<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\UserActivities;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//php artisan shield::filament-resource Fair --generate --simple --soft-deletes --view
class UserResource extends Resource implements HasShieldPermissions
{
    private static string $superAdminRole = 'super_admin';
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('name')
                    ->translateLabel('Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('password')
                    ->translateLabel('Password')
                    ->minLength(6)
                    ->password()
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->placeholder(fn(string $context) => $context !== 'create' ? '*******' : '')
                    ->required(fn(string $context): bool => $context === 'create'),
                Select::make('role_id')
                    ->translateLabel('User Role')
                    ->multiple()
                    ->relationship('roles', 'name', fn(Builder $query) => $query->whereNot('name', self::$superAdminRole))
                    ->searchable()
                    ->preload()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
            'activities' => UserActivities::route('/{record}/activities'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        // Only super admin can view super admin user
        $canAccessSuperAdmin = Auth::user()->can('view_super_admin_user');
//        dd($canAccessSuperAdmin);
        $superAdminRole = self::$superAdminRole;

        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])->when(!$canAccessSuperAdmin, function ($query) use ($superAdminRole) {
                return $query->whereDoesntHave('roles', function ($query) use ($superAdminRole) {
                    $query->where('name', $superAdminRole);
                });
            });
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'view_super_admin'
        ];
    }

    public static function getModelLabel(): string
    {
        return __('panel.user');
    }

    public static function getNavigationLabel(): string
    {
        return __('panel.users');
    }

    public static function getNavigationGroup(): string
    {
        return __('panel.user-management');
    }

}
