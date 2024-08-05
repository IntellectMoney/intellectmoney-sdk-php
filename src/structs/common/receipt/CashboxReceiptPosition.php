<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Позиция в чеке.
 */
final class CashboxReceiptPosition extends ObjectBase
{
    /**
     * Количество товара.
     * @var float
     */
    protected float $_quantity;

    /**
     * Цена товара, с учетом всех скидок и наценок.
     * @var float
     */
    protected float $_price;

    /**
     * Ставка НДС.
     * @var int
     */
    protected int $_tax;

    /**
     * Название позиции.
     * @var string
     */
    protected string $_text;

    /**
     * Предмет расчета.
     * @var ?int
     */
    protected ?int $_paymentSubjectType;

    /**
     * Способ расчета.
     * @var ?int
     */
    protected ?int $_paymentMethodType;

    /**
     * ИНН поставщика.
     * @var ?string
     */
    protected ?string $_supplierInn;

    /**
     * Позиция в чеке.
     * @param array $data Данные.
     * ```
     * {
     *     quantity: int|float|string, 
     *     price: int|float|string,
     *     tax: int|float,
     *     text: string, 
     *     paymentSubjectType?: int|string,
     *     paymentMethodType?: int|string,
     *     supplierInn?: string
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        Contracts::keyRequired('quantity', $data);
        Contracts::keyRequired('price', $data);
        Contracts::keyRequired('tax', $data);
        Contracts::keyRequired('text', $data);

        Contracts::isAnyOfType($data['quantity'], [StdTypes::_int, StdTypes::_float, StdTypes::_double, StdTypes::_string]);
        Contracts::isAnyOfType($data['price'], [StdTypes::_float, StdTypes::_double, StdTypes::_string]);
        Contracts::isAnyOfType($data['tax'], [StdTypes::_int, StdTypes::_float]);
        Contracts::isAnyOfType($data['text'], [StdTypes::_string]);

        $this->_quantity = floatval($data['quantity']);
        $this->_price = floatval($data['price']);
        $this->_tax = ReceiptVatRate::fromMixed($data['tax']);
        $this->_text = (string) $data['text'];

        if (Contracts::keyExists('paymentSubjectType', $data)) {
            Contracts::isAnyOfType($data['paymentSubjectType'], [StdTypes::_int, StdTypes::_string]);
            PaymentSubjectType::fromMixed($data['paymentSubjectType']);
        } else {
            $this->_paymentSubjectType = null;
        }

        if (Contracts::keyExists('paymentMethodType', $data)) {
            Contracts::isAnyOfType($data['paymentMethodType'], [StdTypes::_int, StdTypes::_string]);
            PaymentMethodType::fromMixed($data['paymentMethodType']);
        } else {
            $this->_paymentMethodType = null;
        }

        if (Contracts::keyExists('supplierInn', $data)) {
            Contracts::isAnyOfType($data['supplierInn'], [ StdTypes::_string]);
            $this->_supplierInn = (string) $data['supplierInn'];
        } else {
            $this->_supplierInn = null;
        }
    }

    /**
     * Получить количество товара.
     * 
     * @return float
     * Возвращает количество товара.
     */
    public function getQuantity(): float
    {
        return $this->_quantity;
    }

    /**
     * Установить количество товара.
     * 
     * @param float $value Новое значение.
     * 
     * @return void
     */
    public function setQuantity(float|int $value): void
    {
        $this->_quantity = floatval($value);
    }

    /**
     * Получить цену.
     * 
     * @return float
     * Возвращает цену.
     */
    public function getPrice(): float
    {
        return $this->_price;
    }

    /**
     * Установить цену.
     * 
     * @param float $value Новое значение.
     * 
     * @return void
     */
    public function setPrice(float|int $value): void
    {
        $this->_price = floatval($value);
    }

    /**
     * Получить ставку НДС.
     * 
     * @return int
     * Возвращает ставку НДС.
     */
    public function getTax(): int
    {
        return $this->_tax;
    }

    /**
     * Установить ставку НДС.
     * 
     * @param int $value Новое значение.
     * 
     * @return void
     */
    public function setTax(int $value): void
    {
        $this->_tax = $value;
    }

    /**
     * Получить название позиции.
     * 
     * @return string
     * Возвращает название позиции.
     */
    public function getText(): string
    {
        return $this->_text;
    }

    /**
     * Установить название позиции.
     * 
     * @param string $value Новое значение.
     * 
     * @return void
     */
    public function setText(string $value): void
    {
        $this->_text = $value;
    }

    /**
     * Получить предмет расчета.
     * 
     * @return ?int
     * Возвращает предмет расчета.
     */
    public function getPaymentSubjectType(): ?int
    {
        return $this->_paymentSubjectType;
    }

    /**
     * Установить предмет расчета.
     * 
     * @param ?int $value Новое значение.
     * 
     * @return void
     */
    public function setPaymentSubjectType(?int $value): void
    {
        $this->_paymentSubjectType = $value;
    }

    /**
     * Получить способ оплаты.
     * 
     * @return ?int
     * Возвращает способ оплаты.
     */
    public function getPaymentMethodType(): ?int
    {
        return $this->_paymentMethodType;
    }

    /**
     * Установить способ оплаты.
     * 
     * @param ?int $value Новое значение.
     * 
     * @return void
     */
    public function setPaymentMethodType(?int $value): void
    {
        $this->_paymentMethodType = $value;
    }

    /**
     * Получить ИНН поставщика.
     * 
     * @return ?string
     * Возвращает ИНН поставщика.
     */
    public function getSupplierInn(): ?string
    {
        return $this->_supplierInn;
    }

    /**
     * Установить ИНН поставщика.
     * 
     * @param ?string $value Новое значение.
     * 
     * @return void
     */
    public function setSupplierInn(?string $value): void
    {
        $this->_supplierInn = $value;
    }
}