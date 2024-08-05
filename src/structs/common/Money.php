<?php 

namespace IntellectMoney\SDK\Structs\Common;

use IntellectMoney\SDK\Structs\Common\Currency;

/**
 * Класс измерения денежных средств.
 */
final class Money extends ObjectBase
{
    /**
     * Сумма денежных средств.
     * @var float
     */
    protected float $_amount = 0;

    /**
     * Валюта денежных средств - цифровой код ISO-4217.
     * @var int
     */
    protected int $_currecy = Currency::TST;

    public function __construct(float $amount, int $currency = Currency::TST)
    {
        $this->_amount = $amount;
        $this->_currecy = $currency;
    }

    /**
     * Получить сумму денежных средств.
     * 
     * @return float Сумма денежных средств.
     */
    public function getAmount(): float
    {
        return $this->_amount;
    }

    /**
     * Получить валюту денежных средств.
     * 
     * @return int Код валюты денежных средств - цифровой код ISO-4217.
     */
    public function getCurrency(): int
    {
        return $this->_currecy;
    }

    public function setAmount(float $value): void
    {
        $this->_amount = $value;
    }

    public function setCurrency(int $value): void
    {
        $this->_currecy = $value;
    }

    /**
     * Получить код валюты денежных средств.
     * 
     * @return string Код валюты денежных средств - код ISO-4217.
     */
    public function getCurrencyCode(): string
    {
        return Currency::key($this->_currecy);
    }

    public function toArray(): array
    {
        return [
            'amount' => number_format($this->_amount, 2, '.', ''),
            'currencyCode' => $this->_currecy
        ];
    }

    public function __toString(): string
    {
        return $this->_amount . ' ' . Currency::key($this->_currecy);
    }
}