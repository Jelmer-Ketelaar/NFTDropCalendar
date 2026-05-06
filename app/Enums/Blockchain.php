<?php
namespace App\Enums;

enum Blockchain: string {
    case Arbitrum  = 'arbitrum';
    case Avalanche = 'avalanche';
    case Binance   = 'binance';
    case Cardano   = 'cardano';
    case Elrond    = 'elrond';
    case Ethereum  = 'ethereum';
    case Polygon   = 'polygon';
    case Solana    = 'solana';
    case Venom     = 'venom';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    /** @return array<string, string> */
    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn(self $b) => $b->label(), self::cases()),
        );
    }

    /** @return list<string> */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
