<?php

namespace App\Filament\Resources\UserAttendances;

use UnitEnum;
use BackedEnum;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\MemberAttendance;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\UserAttendances\Pages\EditUserAttendance;
use App\Filament\Resources\UserAttendances\Pages\ViewUserAttendance;
use App\Filament\Resources\UserAttendances\Pages\ListUserAttendances;
use App\Filament\Resources\UserAttendances\Pages\CreateUserAttendance;
use App\Filament\Resources\UserAttendances\Schemas\UserAttendanceForm;
use App\Filament\Resources\UserAttendances\Tables\UserAttendancesTable;
use App\Filament\Resources\UserAttendances\Schemas\UserAttendanceInfolist;
use App\Filament\Resources\UserAttendances\RelationManagers\MemberAttendancesRelationManager;

class UserAttendanceResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    protected static ?string $recordTitleAttribute = 'User Attendance';

    protected static string|null|UnitEnum $navigationGroup = 'Member Attendances';


    public static function getNavigationLabel(): string
    {
        return 'User Attendances';
    }

    public static function form(Schema $schema): Schema
    {
        return UserAttendanceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserAttendanceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserAttendancesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            MemberAttendancesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserAttendances::route('/'),
            // 'create' => CreateUserAttendance::route('/create'),
            'view' => ViewUserAttendance::route('/{record}'),
            // 'edit' => EditUserAttendance::route('/{record}/edit'),
        ];
    }
}
