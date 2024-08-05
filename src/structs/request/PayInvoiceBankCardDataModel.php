<?php

namespace IntellectMoney\SDK\Structs\Request;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\StdTypes;
use IntellectMoney\SDK\Structs\Request\BaseMerchantDataModel;

/**
 * Модель запроса на оплату СКО с банковской карты.
 */
final class PayInvoiceBankCardDataModel extends BaseMerchantDataModel
{
    /**
     * ID магазина.
     * @var int
     */
    protected int $_eshopId;

    /**
     * Номер СКО. 
     * @var int
     */
    protected int $_invoiceId;

    /**
     * Номер карты плательщика
     * @var string
     */
    protected string $_pan;

    /**
     * Держатель карты
     * @var ?string
     */
    protected ?string $_cardHolder;

    /**
     * Месяц окончания срока действия карты
     * @var int
     */
    protected string $_expiredMonth;

    /**
     * Год окончания срока действия карты
     * @var int
     */
    protected string $_expiredYear;

    /**
     * CVV код.
     * @var ?string
     */
    protected ?string $_cvv;

    /**
     * Адрес для успешной 3DS-авторизации.
     * @var string
     */
    protected string $_returnUrl;

    /**
     * IP адрес сайта магазина.
     * @var string
     */
    protected string $_ipAddress;

    /**
     * Подпись для передачи данных.
     * @var string
     */
    protected ?string $_hash;

    /**
     * Модель запроса на оплату СКО с банковской карты.
     * 
     * @param array $data Данные.
     * ```
     * {
     *      eshopId: int|string,
     *      invoiceId: int|string,
     *      pan: string,
     *      expiredMonth: string,
     *      expiredYear: string,
     *      returnUrl: string,
     *      ipAddress: string,
     *      cardHolder: string, 
     *      cvv?: string,
     *      hash?: string
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        Contracts::keyRequired('eshopId', $data);
        Contracts::keyRequired('invoiceId', $data);
        Contracts::keyRequired('pan', $data);
        Contracts::keyRequired('expiredMonth', $data);
        Contracts::keyRequired('expiredYear', $data);
        Contracts::keyRequired('returnUrl', $data);
        Contracts::keyRequired('ipAddress', $data);
        Contracts::keyRequired('cardHolder', $data);

        Contracts::isAnyOfType($data['eshopId'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['invoiceId'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['pan'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['expiredMonth'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['expiredYear'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['returnUrl'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['ipAddress'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['cardHolder'], [StdTypes::_string]);
        
        $this->setEshopId(intval($data['eshopId']));
        $this->setInvoiceId(intval($data['invoiceId']));
        $this->setPan($data['pan']);
        $this->setExpiredMonth($data['expiredMonth']);
        $this->setExpiredYear($data['expiredYear']);
        $this->setReturnUrl($data['returnUrl']);
        $this->setIpAddress($data['ipAddress']);
        $this->setCardHolder($data['cardHolder']);

        if (Contracts::keyExists('cvv', $data)) {
            Contracts::isAnyOfType($data['cvv'], [StdTypes::_string]);
            $this->setCvv($data['cvv']);
        } else {
            $this->setCvv(null);
        }

        if (Contracts::keyExists('hash', $data)) {
            Contracts::isAnyOfType($data['hash'], [StdTypes::_string]);
            $this->setHash($data['hash']);
        } else {
            $this->setHash('');
        }
    }

    /**
     * ID магазина.
     * 
     * @return int
     * Возвращает ID магазина.
     */
    public function getEshopId(): int
    {
        return $this->_eshopId;
    }

    /**
     * ID магазина.
     * 
     * @param int $value Новый ID магазина.
     * 
     * @return void
     */
    public function setEshopId(int $value): void
    {
        $this->_eshopId = $value;
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
     * 
     * @return void
     */
    public function setInvoiceId(int $value): void
    {
        $this->_invoiceId = $value;
    }

    /**
     * Номер карты плательщика
     * 
     * @return string
     * Возвращает номер карты плательщика
     */
    public function getPan(): string
    {
        return $this->_pan;
    }
    
    /**
     * Установить новый номер карты плательщика.
     * 
     * @param string $value Новый номер карты плательщика
     * 
     * @return void
     */
    public function setPan(string $value): void
    {
        $this->_pan = $value;
    }

    /**
     * Держатель карты
     * 
     * @return ?string
     * Возвращает держателя карты
     */
    public function getCardHolder(): ?string
    {
        return $this->_cardHolder;
    }

    /**
     * Установить нового держателя карты.
     * 
     * @param ?string $value Новый держатель карты
     * 
     * @return void
     */
    public function setCardHolder(?string $value): void
    {
        $this->_cardHolder = $value;
    }

    /**
     * Месяц окончания срока действия карты.
     * 
     * @return int
     * Возвращает месяц окончания срока действия карты
     */
    public function getExpiredMonth(): string
    {
        return $this->_expiredMonth;
    }

    /**
     * Установить новый месяц окончания срока действия карты.
     * 
     * @param int $value Новый месяц окончания срока действия карты
     * 
     * @return void
     */
    public function setExpiredMonth(string $value): void
    {
        $this->_expiredMonth = $value;
    }

    /**
     * Год окончания срока действия карты
     * 
     * @return int
     * Возвращает год окончания срока действия карты
     */
    public function getExpiredYear(): string
    {
        return $this->_expiredYear;
    }

    /**
     * Установить новый год окончания срока действия карты
     * 
     * @param int $value Новый год окончания срока действия карты
     * 
     * @return void
     */
    public function setExpiredYear(string $value): void
    {
        $this->_expiredYear = $value;
    }

    /**
     * URL возврата при успешном 3DS.
     * 
     * @return string
     * Возвращает URL возврата при успешном 3DS.
     */
    public function getReturnUrl(): string
    {
        return $this->_returnUrl;
    }

    /**
     * Установить новый URL возврата при успешном 3DS.
     * 
     * @param string $value Новый URL возврата при успешном 3DS.
     * 
     * @return void
     */
    public function setReturnUrl(string $value): void
    {
        $this->_returnUrl = $value;
    }

    /**
     * IP-адрес сайта.
     * 
     * @return ?string
     * Возвращает IP-адрес сайта.
     */
    public function getIpAddress(): ?string
    {
        return $this->_ipAddress;
    }

    /**
     * Установить новый IP-адрес сайта.
     * 
     * @param ?string $value Новый IP-адрес сайта.
     * 
     * @return void
     */
    public function setIpAddress(?string $value): void
    {
        $this->_ipAddress = $value;
    }

    /**
     * CVV.
     * 
     * @return ?string
     * Возвращает CVV.
     */
    public function getCvv(): ?string
    {
        return $this->_cvv;
    }

    /**
     * Установить новый CVV.
     * 
     * @param ?string $value Новый CVV.
     * 
     * @return void
     */
    public function setCvv(?string $value): void
    {
        $this->_cvv = $value;
    }

    /**
     * Хеш.
     * 
     * @return string
     * Возвращает хеш.
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * Установить новый хеш.
     * 
     * @param string $value Новый хеш.
     * 
     * @return void
     */
    public function setHash(string $value): void
    {
        $this->_hash = $value;
    }
}