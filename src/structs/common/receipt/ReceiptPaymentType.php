<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Тип оплаты.
 */
final class ReceiptPaymentType extends BaseEnum
{
    /**
     * 1 – сумма по чеку наличными, 1031
     * @var int
     */
    public const Cash = 1;

    /**
     * 2 – сумма по чеку электронными, 1081
     * @var int
     */
    public const Electronic = 2;

    /**
     * 14 – сумма по чеку предоплатой (зачетом аванса и (или) предыдущих платежей), 1215
     * @var int
     */
    public const Advance = 14;

    /**
     * 15 – сумма по чеку постоплатой (в кредит), 1216
     */
    public const Credit = 15;

    /**
     * 16 – сумма по чеку (БСО) встречным предоставлением, 1217
     * @var int
     */
    public const Other = 16;

    protected static array $_values = [
        self::Cash => 'Cash',
        self::Electronic => 'Electronic',
        self::Advance => 'Advance',
        self::Credit => 'Credit',
        self::Other => 'Other',
    ];
}