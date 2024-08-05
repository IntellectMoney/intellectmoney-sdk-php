<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Оплата по чеку.
 */
final class CashboxReceiptPayment extends ObjectBase
{
    /**
     * Тип платежа.
     * @var int
     */
    protected int $_type;

    /**
     * Сумма платежа.
     * @var float
     */
    protected float $_amount;

    /**
     * Оплата по чеку.
     * 
     * @param array $data Данные.
     * ```
     * {
     *     type: int|string, 
     *     amount: float
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        Contracts::keyRequired('type', $data);
        Contracts::keyRequired('amount', $data);
        Contracts::isAnyOfType($data['type'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['amount'], [StdTypes::_float, StdTypes::_double]);

        $this->setType($data['type']);
        $this->setAmount(floatval($data['amount']));
    }

    /**
     * Получить тип платежа.
     * 
     * @return int
     * Возвращает тип платежа.
     */
    public function getType(): int
    {
        return $this->_type;
    }

    /**
     * Установить тип платежа.
     * 
     * @param int|string $value Новый тип платежа.
     * @return void
     */
    public function setType(int|string $value): void
    {
        $this->_type = ReceiptPaymentType::fromMixed($value);
    }

    /**
     * Получить сумму платежа.
     * 
     * @return float
     * Возвращает сумму платежа.
     */
    public function getAmount(): float
    {
        return $this->_amount;
    }

    /**
     * Установить сумму платежа.
     * 
     * @param float $value Новая сумма платежа.
     * @return void
     */
    public function setAmount(float $value): void
    {
        $this->_amount = $value;
    }
}