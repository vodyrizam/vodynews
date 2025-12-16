<?php

namespace App\Enums;

enum BeritaStatus: int
{
    case DRAFT   = 1;
    case PUBLISH = 2;

    /**
     * Label manusia (untuk Blade / UI)
     */
    public function label(): string
    {
        return match ($this) {
            self::DRAFT   => 'Menunggu Validasi',
            self::PUBLISH => 'Publish',
        };
    }

    /**
     * Badge bootstrap (opsional, nilai plus)
     */
    public function badge(): string
    {
        return match ($this) {
            self::DRAFT   => 'secondary',
            self::PUBLISH => 'success',
        };
    }
}
