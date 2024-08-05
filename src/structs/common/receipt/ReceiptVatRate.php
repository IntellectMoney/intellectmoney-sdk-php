<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Ставка НДС.
 */
final class ReceiptVatRate extends BaseEnum
{
    /**
     * Не определено.
     * @var int
     */
    public const Empty = 0;

    /**
     * Ставка НДС 20%.
     * @var int
     */
    public const Vat20 = 1;

    /**
     * Ставка НДС 10%.
     * @var int
     */
    public const Vat10 = 2;

    /**
     * Ставка НДС расч. 20/120.
     * @var int
     */
    public const Vat120 = 3;

    /**
     * Ставка НДС расч. 10/110.
     * @var int
     */
    public const Vat110 = 4;

    /**
     * Ставка НДС 0%.
     * @var int
     */
    public const Vat0 = 5;

    /**
     * НДС не облагается.
     * @var int
     */
    public const None = 6;

    protected static array $_values = [
        self::Empty => 'Empty', 
        self::Vat20 => 'Vat20', 
        self::Vat10 => 'Vat10', 
        self::Vat120 => 'Vat120', 
        self::Vat110 => 'Vat110', 
        self::Vat0 => 'Vat0', 
        self::None => 'None'
    ];
}