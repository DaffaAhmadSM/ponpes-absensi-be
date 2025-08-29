<?php

namespace App\Filament\Resources\UserAttendances\RelationManagers;

use Filament\Tables\Table;
use App\Enums\AttendanceStatus;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\UserAttendances\UserAttendanceResource;
use App\Filament\Resources\MemberAttendances\MemberAttendanceResource;

class MemberAttendancesRelationManager extends RelationManager
{
    protected static string $relationship = 'memberAttendances';

    protected static ?string $relatedResource = MemberAttendanceResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('attendance_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('check_in_status')
                    ->badge()
                    ->color(fn(string $state): string => AttendanceStatus::getColorFromString($state))
                    ->searchable(),
                TextColumn::make('check_out_status')
                    ->badge()
                    ->color(fn(string $state): string => AttendanceStatus::getColorFromString($state))
                    ->searchable(),
                TextColumn::make('check_in_time')
                    ->label('Check In Time')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('check_out_time')
                    ->label('Check Out Time')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ]);


    }
}
