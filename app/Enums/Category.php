<?php
namespace App\Enums;

enum Category: string {
    case Artwork  = 'Artwork';
    case Fun      = 'Fun';
    case Metaverse = 'Metaverse';

    /** @return array<string, string> */
    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_column(self::cases(), 'value'),
        );
    }

    /** @return list<string> */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
