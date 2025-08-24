<?php

namespace App\Enums;

enum AttendanceStatus: int{
    case ON_TIME = 0;
    case LATE = 1;
    case ABSENT = 2;
    case PRESENT = 3;
    case TO_EARLY = 4;
    case OUT_OF_RANGE = 5;

    public function label(): string
    {
        return self::getLabels($this);
    }

    public static function getLabels(self $status): string {
        return match ($status) {
            self::ON_TIME => 'On Time',
            self::LATE => 'Late',
            self::ABSENT => 'Absent',
            self::PRESENT => 'Present',
            self::TO_EARLY => 'Too Early',
            self::OUT_OF_RANGE => 'Out of Range',
        };
    }

    public function color(): string
    {
        return self::getColor($this);
    }

    public static function getColor(self $status): string
    {
        return match ($status) {
            self::ON_TIME => 'success',
            self::LATE => 'danger',
            self::ABSENT => 'danger',
            self::PRESENT => 'primary',
            self::TO_EARLY => 'gray',
            self::OUT_OF_RANGE => 'warning',
        };
    }

    public static function getColorFromString(string $status): string {
        return match ($status) {
            self::ON_TIME->label() => self::ON_TIME->color(),
            self::LATE->label() => self::LATE->color(),
            self::ABSENT->label() => self::ABSENT->color(),
            self::PRESENT->label() => self::PRESENT->color(),
            self::TO_EARLY->label() => self::TO_EARLY->color(),
            self::OUT_OF_RANGE->label() => self::OUT_OF_RANGE->color(),
            default => 'gray',
        };
    }
}
