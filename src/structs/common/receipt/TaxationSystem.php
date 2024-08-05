<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Система налогообложения.
 */
final class TaxationSystem extends BaseEnum
{
    /**
     * Общая, ОСН
     * @var int
     */
    public const Common = 0;

    /**
     * Упрощенная, УСН
     * @var int
     */
    public const Simplified = 1;

    /**
     * Упрощенная доход минус расход, УСН доход - расход.
     * @var int
     */
    public const SimplifiedMinusOutlay = 2;

    /**
     * Единый сельскозахозяйственный налог, ЕСХН
     * @var int
     */
    public const UnifiedAgrocultural = 4;

    /**
     * Патентная система налогообложения, Патент.
     * @var int
     */
    public const Patent = 5;

    /**
     * Неизвестно.
     * @var int
     */
    public const Unknown = 255;

    protected static array $_values = [
        self::Common => 'Common',
        self::Simplified => 'Simplified',
        self::SimplifiedMinusOutlay => 'SimplifiedMinusOutlay',
        self::UnifiedAgrocultural => 'UnifiedAgrocultural',
        self::Patent => 'Patent',
        self::Unknown => 'Unknown',
    ];
}