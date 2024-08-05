<?php

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Способ расчета.
 */
final class PaymentMethodType extends BaseEnum
{
    /**
     * Неизвестно.
     * @var int
     */
    public const Empty = 0;

    /**
     * Предоплата 100%.
     * @var int
     */
    public const Prepay = 1;

    /**
     * Частичная предоплата.
     * @var int
     */
    public const PartialPrepay = 2;

    /**
     * Аванс.
     * @var int
     */
    public const Advance = 3;

    /**
     * Полный расчет
     * @var int
     */
    public const Full = 4;

    /**
     * Частичный расчет и кредит.
     * @var int
     */
    public const PartialAndCredit = 5;

    /**
     * Передача в кредит.
     * @var int
     */
    public const CreditTransfer = 6;

    /**
     * Оплата кредита.
     * @var int
     */
    public const CreditPayment = 7;

    protected static array $_values = [
        self::Empty => 'Empty',
        self::Prepay => 'Prepay',
        self::PartialPrepay => 'PartialPrepay',
        self::Advance => 'Advance',
        self::Full => 'Full',
        self::PartialAndCredit => 'PartialAndCredit',
        self::CreditTransfer => 'CreditTransfer',
        self::CreditPayment => 'CreditPayment',
    ];
}