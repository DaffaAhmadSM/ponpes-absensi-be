<?php

namespace App\Filament\Resources\MemberAttendances\Tables;

use App\Enums\AttendanceStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MemberAttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('instanceLocation.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('attendance_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('check_in_status')
                    ->badge()
                    ->color(fn (string $state): string => AttendanceStatus::getColorFromString($state))
                    ->searchable(),
                TextColumn::make('check_out_status')
                    ->badge()
                    ->color(fn (string $state): string => AttendanceStatus::getColorFromString($state))
                    ->searchable(),
                TextColumn::make('check_in_time')
                    ->label('Check In Time')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('check_out_time')
                    ->label('Check Out Time')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
