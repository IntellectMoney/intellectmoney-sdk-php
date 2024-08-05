<?php 

namespace IntellectMoney\SDK\Structs\Request;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\StdTypes;
use IntellectMoney\SDK\Structs\Request\BaseMerchantDataModel;

/**
 * Модель запроса для проверки состояния оплаты.
 */
final class CheckInvoiceDataModel extends BaseMerchantDataModel
{
    /**
     * Номер магазина.
     * @var int
     */
    protected int $_eshopId = 0;

    /**
     * Номер СКО.
     * @var int
     */
    protected int $_invoiceId = 0;

    /**
     * Подпись для переданных данных.
     * @var string
     */
    protected string $_hash = '';

    /**
     * Модель запроса для проверки состояния оплаты.
     * 
     * @param array $data Данные.
     * ```
     * {
     *      eshopId: int|string,
     *      invoiceId: int|string,
     *      hash?: string
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        Contracts::keyRequired('eshopId', $data);
        Contracts::keyRequired('invoiceId', $data);

        Contracts::isAnyOfType($data['eshopId'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['invoiceId'], [StdTypes::_int, StdTypes::_string]);

        $this->_eshopId = intval($data['eshopId']);
        $this->_invoiceId = intval($data['invoiceId']);

        if (Contracts::keyExists('hash', $data)) {
            Contracts::isAnyOfType($data['hash'], [StdTypes::_string]);
            $this->_hash = $data['hash'];
        } else {
            $this->_hash = '';
        }
    }

    /**
     * Номер магазина.
     * 
     * @return int
     * Возвращает номер магазина.
     */
    public function getEshopId(): int
    {
        return $this->_eshopId;
    }

    /**
     * Установить номер магазина.
     * 
     * @param int $value Новый номер магазина.
     * @return void
     */
    public function setEshopId(int $value): void
    {
        $this->_eshopId = intval($value);
    }

    /**
     * Номер СКО.
     * 
     * @return int
     * Возвращает номер СКО.
     */
    public function getInvoiceId(): int
    {
        return $this->_invoiceId;
    }

    /**
     * Установить номер СКО.
     * 
     * @param int $value Новый номер СКО.
     * @return void
     */
    public function setInvoiceId(int $value): void
    {
        $this->_invoiceId = intval($value);
    }

    /**
     * Подпись для переданных данных.
     * 
     * @return string
     * Возвращает подпись для переданных данных.
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * Установить подпись для переданных данных.
     * 
     * @param string $value Новая подпись для переданных данных.
     * @return void
     */
    public function setHash(string $value): void
    {
        $this->_hash = $value;
    }
}