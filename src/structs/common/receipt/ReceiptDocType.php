<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Тип документа.
 */
final class ReceiptDocType extends BaseEnum
{
    /**
     * Неизвестно.
     * @var int
     */
    public const Empty = 0;

    /**
     * Приход.
     * @var int
     */
    public const In = 1; 

    /**
     * Возврат прихода.
     * @var int
     */
    public const InReturn = 2;

    /**
     * Расход.
     * @var int
     */
    public const Out = 3;

    /**
     * Возврат расхода.
     * @var int
     */
    public const OutReturn = 4;

    protected static array $_values = [
        self::Empty => 'Empty',
        self::In => 'In',
        self::InReturn => 'InReturn',
        self::Out => 'Out',
        self::OutReturn => 'OutReturn',
    ];
}