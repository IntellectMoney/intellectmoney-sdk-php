<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Структура закрытия чека.
 */
final class CashboxReceiptClose extends ObjectBase
{
    /**
     * Список платежей.
     * @var array
     */
    protected array $_payments;

    /**
     * Система налогообложения.
     * @var int
     */
    protected int $_taxationSystem;

    /**
     * Структура закрытия чека.
     * 
     * @param array $data Данные структуры. 
     * ```
     * {
     *  payments?: array, 
     *  taxationSystem: int|string
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        Contracts::keyRequired('taxationSystem', $data);
        Contracts::isAnyOfType($data['taxationSystem'], [StdTypes::_int, StdTypes::_string]);

        if (Contracts::keyExists('payments', $data)) {
            Contracts::isAnyOfType($data['payments'], [StdTypes::_array]);
            $this->setPayments($data['payments']);
        } else {
            $this->setPayments([]);
        }
        $this->setTaxationSystem($data['taxationSystem']);
    }

    /**
     * Получить список платежей.
     * 
     * @return array
     * Возвращает список платежей.
     */
    public function getPayments(): array
    {
        return $this->_payments;
    }

    /**
     * Установить список платежей.
     * 
     * @param array $value Новый список платежей.
     * @return void
     */
    public function setPayments(array $value): void
    {
        $payments = [];
        foreach($value as $payment) {
            Contracts::isAnyOfType($payment, [StdTypes::_array, CashboxReceiptPayment::class]);

            if (is_array($payment))
                array_push($payments, new CashboxReceiptPayment($payment));
            else
                array_push($payments, $payment);
        }

        $this->_payments = $payments;
    }

    /**
     * Получить систему налогообложения.
     * 
     * @return int
     * Возвращает систему налогообложения.
     */
    public function getTaxationSystem(): int
    {
        return $this->_taxationSystem;
    }

    /**
     * Установить систему налогообложения.
     * 
     * @param int $value Новое значение системы налогообложения.
     * @return void
     */
    public function setTaxationSystem(int|string $value): void
    {
        $this->_taxationSystem = TaxationSystem::fromMixed($value);
    }
}