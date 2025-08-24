<?php

namespace App\Filament\Resources\MemberAttendances;

use App\Filament\Resources\MemberAttendances\Pages\CreateMemberAttendance;
use App\Filament\Resources\MemberAttendances\Pages\EditMemberAttendance;
use App\Filament\Resources\MemberAttendances\Pages\ListMemberAttendances;
use App\Filament\Resources\MemberAttendances\Pages\ViewMemberAttendance;
use App\Filament\Resources\MemberAttendances\Schemas\MemberAttendanceForm;
use App\Filament\Resources\MemberAttendances\Schemas\MemberAttendanceInfolist;
use App\Filament\Resources\MemberAttendances\Tables\MemberAttendancesTable;
use App\Models\MemberAttendance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MemberAttendanceResource extends Resource
{
    protected static ?string $model = MemberAttendance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static ?string $recordTitleAttribute = 'Member Attendance';

//    title
    protected static string|null|UnitEnum $navigationGroup = 'Member Attendances';

    public static function form(Schema $schema): Schema
    {
        return MemberAttendanceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MemberAttendanceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MemberAttendancesTable::configure($table);
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
            'index' => ListMemberAttendances::route('/'),
            'create' => CreateMemberAttendance::route('/create'),
            'view' => ViewMemberAttendance::route('/{record}'),
            'edit' => EditMemberAttendance::route('/{record}/edit'),
        ];
    }
}
