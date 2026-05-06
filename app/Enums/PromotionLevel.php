<?php
namespace App\Enums;

enum PromotionLevel: string {
    case Promote  = 'promote';
    case Promote1 = 'promote1';
    case Promote2 = 'promote2';
    case Promote3 = 'promote3';

    /** @return array<string, string> */
    public static function options(): array
    {
        return [
            self::Promote->value  => 'Promote (paid)',
            self::Promote1->value => 'Promote 1',
            self::Promote2->value => 'Promote 2',
            self::Promote3->value => 'Promote 3',
        ];
    }

    /** @return list<string> */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
