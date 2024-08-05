<?php 

namespace IntellectMoney\SDK\Structs\Common;

/**
 * Состояние платежа.
 */
final class PaymentStep extends BaseEnum
{
    /**
     * Успешно завершен (Счет оплачен).
     * @var int
     */
    public const Ok = 0;

    /**
     * Создан.
     * @var int
     */
    public const Created = 1;

    /**
     * В обработке.
     * @var int
     */
    public const InProcess = 2;

    /**
     * Отправлен на 3DS.
     * @var int
     */
    public const SendTo3DS = 3;

    /**
     * Отправлен на активационный платеж.
     * @var int
     */
    public const ActivationPayment = 4;

    /**
     * Ошибка платежа.
     * @var int
     */
    public const Error = 10;

    protected static array $_values = [
        self::Ok => 'Ok', 
        self::Created => 'Created', 
        self::InProcess => 'InProcess', 
        self::SendTo3DS => 'SendTo3DS', 
        self::ActivationPayment => 'ActivationPayment', 
        self::Error => 'Error',
    ];
}