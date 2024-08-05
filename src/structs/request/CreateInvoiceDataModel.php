<?php

namespace IntellectMoney\SDK\Structs\Request;

use DateTime;
use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\Currency;
use IntellectMoney\SDK\Structs\Request\BaseMerchantDataModel;
use IntellectMoney\SDK\Structs\Common\Money;
use IntellectMoney\SDK\Structs\Common\PreferenceType;
use IntellectMoney\SDK\Structs\Common\Receipt\CashboxReceiptData;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Модель запроса на создание СКО.
 */
final class CreateInvoiceDataModel extends BaseMerchantDataModel
{
    /**
     * ID магазина.
     * @var int
     */
    protected int $_eshopId = 0;

    /**
     * Номер покупки.
     * @var string
     */
    protected string $_orderId = '';

    /**
     * (*Опционально*) Описание товара или услуги.
     * @var string|null
     */
    protected ?string $_serviceName = null;

    /**
     * Сумма платежа.
     * @var IntellectMoney\SDK\Structs\Common\Money
     */
    protected Money $_recipientAmount;

    /**
     * (*Опционально*) Имя покупателя.
     * @var string|null
     */
    protected ?string $_userName = null;

    /**
     * E-mail покупателя.
     * @var string
     */
    protected string $_email = '';

    /**
     * (*Опционально*) Ссылка на страницу, на которую будет перенаправлен покупатель в случае успешной оплаты.
     * @var string|null
     */
    protected ?string $_successUrl = null;

    /**
     * (*Опционально*) Ссылка на страницу, на которую будет перенаправлен покупатель в случае неудачной оплаты.
     * @var string|null
     */
    protected ?string $_failUrl = null;

    /**
     * (*Опционально*) Ссылка на страницу, на которую будет перенаправлен покупатель в случае нажатия "Вернуться в магазин".
     * @var string|null
     */
    protected ?string $_backUrl = null;

    /**
     * (*Опционально*) Адрес, на который отправляются уведомления от системы IntellectMoney для этого СКО.
     * @var string|null
     */
    protected ?string $_resultUrl = null;

    /**
     * (*Опционально*) Дата, до которой СКО должен быть оплачен.
     * @var IntellectMoney\SDK\Structs\Common\DateTime|null
     */
    protected ?DateTime $_expireDate = null;

    /**
     * (*Опционально*) Режим холдирования.
     * `true` - Включен режим холдирования.
     * 
     * `false` - Выключен режим холдирования.
     * 
     * `null` - Режим холдирования будет взят из настроек магазина.
     * @var bool|null
     */
    protected ?bool $_holdMode = null;

    /**
     * (*Опционально*) Время холдирования в часах.
     * @var int|null
     */
    protected ?int $_holdTime = null;

    /**
     * (*Опционально*) Способы оплаты, через которые можно будет оплатить СКО.
     * @var array|null
     */
    protected ?array $_preferences = null;

    /**
     * (*Опционально*) Чек покупки.
     * @var IntellectMoney\SDK\Structs\Common\MerchantReceipt|null
     */
    protected ?CashboxReceiptData $_merchantReceipt;

    /**
     * (*Опционально*) Дополнительные поля.
     */
    protected ?array $_userFields = [];

    /**
     * Инициировать рекуррентный СКО.
     * @var bool
     */
    protected bool $_recurring = false;

    /**
     * Секретный ключ магазина.
     * @var string
     */
    protected string $_hash = '';

    /**
     * Хеш покупки.
     * @var string
     */
    protected string $_purchaseHash = '';

    /**
     * Создание модели данных для создания СКО.
     * 
     * @param array $options Данные.
     * ```
     * {
     *      eshopId: int|string,
     *      orderId: string,
     *      recipientAmount: array|Money,
     *      email: string,
     *      serviceName?: string,
     *      secretKey?: string,
     *      userName?: string,
     *      successUrl?: string,
     *      failUrl?: string,
     *      backUrl?: string,
     *      resultUrl?: string,
     *      expireDate?: DateTime,
     *      holdMode?: bool,
     *      holdTime?: int,
     *      preferences?: array,
     *      merchantReceipt?: CashboxReceiptData,
     *      userFields?: array,
     *      recurring?: bool,
     * }
     * ```
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        Contracts::keyRequired('eshopId', $data);
        Contracts::keyRequired('orderId', $data);
        Contracts::keyRequired('recipientAmount', $data);
        Contracts::keyRequired('email', $data);
        Contracts::isAnyOfType($data['eshopId'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['orderId'], [StdTypes::_string]);
        Contracts::isAnyOfType($data['recipientAmount'], [Money::class, StdTypes::_array]);
        Contracts::isAnyOfType($data['email'], [StdTypes::_string]);

        $this->setEshopId(intval($data['eshopId']));
        $this->setOrderId($data['orderId']);
        $this->setOptionalValue($data, 'serviceName', [$this, 'setServiceName'], [StdTypes::_string]);
        $this->setEmail($data['email']);
        $this->setOptionalValue($data, 'secretKey', [$this, 'setSecretKey'], [StdTypes::_string], '');
        $this->setRecipientAmount($data['recipientAmount']);
        $this->setOptionalValue($data, 'userName', [$this, 'setUserName'], [StdTypes::_string]);
        $this->setOptionalValue($data, 'successUrl', [$this, 'setSuccessUrl'], [StdTypes::_string]);
        $this->setOptionalValue($data, 'failUrl', [$this, 'setFailUrl'], [StdTypes::_string]);
        $this->setOptionalValue($data, 'backUrl', [$this, 'setBackUrl'], [StdTypes::_string]);
        $this->setOptionalValue($data, 'resultUrl', [$this, 'setResultUrl'], [StdTypes::_string]);
        $this->setOptionalValue($data, 'holdMode', [$this, 'setHoldMode'], [StdTypes::_bool]);

        if ($this->_holdMode === true) {
            Contracts::keyRequired('expireDate', $data, 'Expire date is required when holdMode is `true`.');
            Contracts::keyRequired('holdTime', $data, 'Hold time is required when holdMode is `true`.');
            Contracts::isAnyOfType($data['holdMode'], [StdTypes::_bool]);
        }

        $this->setOptionalValue($data, 'expireDate', [$this, 'setExpireDate'], [DateTime::class]);
        $this->setOptionalValue($data, 'holdTime', [$this, 'setHoldTime'], [StdTypes::_int]);
        $this->setOptionalValue($data, 'preferences', [$this, 'setPreferences'], [StdTypes::_array]);
        $this->setOptionalValue($data, 'recurring', [$this, 'setRecurring'], [StdTypes::_bool], false);
        $this->setOptionalValue($data, 'userFields', [$this, 'setUserFields'], [StdTypes::_array], null);
        $this->setOptionalValue($data, 'merchantReceipt', [$this, 'setMerchantReceipt'], [CashboxReceiptData::class, StdTypes::_array], null);
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
     * 
     * @return void
     */
    public function setEshopId(int $value): void
    {
        $this->_eshopId = intval($value);
    }

    /**
     * Идентификатор заказа.
     * 
     * @return string
     * Возвращает идентификатор заказа.
     */
    public function getOrderId(): string
    {
        return $this->_orderId;
    }

    /**
     * Установить идентификатор заказа.
     * 
     * @param string $value Новый идентификатор заказа.
     * 
     * @return void
     */
    public function setOrderId(string $value): void
    {
        $this->_orderId = $value;
    }

    /**
     * Описание товара или услуги.
     * 
     * @return string|null
     * Возвращает описание товара или услуги.
     */
    public function getServiceName(): ?string
    {
        return $this->_serviceName;
    }

    /**
     * Установить новое описание товара или услуги.
     * 
     * @param string|null $value Новое описание товара или услуги.
     * 
     * @return void
     */
    public function setServiceName(?string $value): void
    {
        $this->_serviceName = $value;
    }

    /**
     * Сумма платежа.
     * 
     * @return Money
     */
    public function getRecipientAmount(): Money
    {
        return $this->_recipientAmount->Amount;
    }

    /**
     * Установить новую сумму платежа.
     * 
     * @param Money|array $value Новая сумма платежа.
     * 
     * @return void
     */
    public function setRecipientAmount(Money|array $value)
    {
        if ($value instanceof Money) {
            $this->_recipientAmount = new Money($value->getAmount(), $value->getCurrency());
        } else if (is_array($value)) {
            Contracts::keyRequired('amount', $value);
            Contracts::keyRequired('currency', $value);
            Contracts::isAnyOfType($value['amount'], [StdTypes::_int, StdTypes::_float, StdTypes::_double]);
            Contracts::isAnyOfType($value['currency'], [StdTypes::_int, StdTypes::_string]);

            $amount = floatval($value['amount']);
            $currency = $value['currency'];
            if ($value['currency'] instanceof string) {
                if (Currency::keyExists($currency))
                    $currency = Currency::value($currency);
                else
                    $currency = intval($currency);
            }

            $this->_recipientAmount = new Money($amount, intval($currency));
        }
    }

    /**
     * Имя плательщика.
     * 
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->_userName;
    }

    /**
     * Установить новое имя плательщика.
     * 
     * @param string|null $value Новое имя плательщика.
     * 
     * @return void
     */
    public function setUserName(?string $value): void
    {
        $this->_userName = $value;
    }

    /**
     * E-mail плательщика.
     * 
     * @return string
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * Установить новый E-mail плательщика.
     * 
     * @param string $value Новый E-mail плательщика.
     * 
     * @return void
     */
    public function setEmail(string $value): void
    {
        $this->_email = $value;
    }

    /**
     * Ссылка для перехода после оплаты.
     * 
     * @return string|null
     */
    public function getSuccessUrl(): ?string
    {
        return $this->_successUrl;
    }

    /**
     * Установить новую ссылку для перехода после оплаты.
     * 
     * @param string|null $value Новая ссылка для перехода после оплаты.
     * 
     * @return void
     */
    public function setSuccessUrl(?string $value): void
    {
        $this->_successUrl = $value;
    }

    /**
     * Ссылка на страницу, на которую будет перенаправлен покупатель в случае неудачной оплаты.
     * 
     * @return string|null
     */
    public function getFailUrl(): ?string
    {
        return $this->_failUrl;
    }

    /**
     * Установить новую ссылку на страницу, на которую будет перенаправлен покупатель в случае неудачной оплаты.
     * 
     * @param string|null $value Новая ссылка на страницу, на которую будет перенаправлен покупатель в случае неудачной оплаты.
     * 
     * @return void
     */
    public function setFailUrl(?string $value): void
    {
        $this->_failUrl = $value;
    }

    /**
     * Ссылка на страницу, на которую будет перенаправлен покупатель в случае нажатия "Вернуться в магазин".
     * 
     * @return string|null
     */
    public function getBackUrl(): ?string
    {
        return $this->_backUrl;
    }

    /**
     * Установить новую ссылку, на которую будет перенаправлен покупатель в случае нажатия "Вернуться в магазин".
     * 
     * @param string|null $value Новая ссылка, на которую будет перенаправлен покупатель в случае нажатия "Вернуться в магазин". 
     * 
     * @return void
     */
    public function setBackUrl(?string $value): void
    {
        $this->_backUrl = $value;
    }

    /**
     * Адрес, на который отправляются уведомления от системы IntellectMoney для этого СКО.
     * 
     * @return string|null
     * Адрес, на который отправляются уведомления от системы IntellectMoney для этого СКО.
     */
    public function getResultUrl(): ?string
    {
        return $this->_resultUrl;
    }

    /**
     * Установить новый адрес, на который отправляются уведомления от системы IntellectMoney.
     * 
     * @param ?string $value Новый адрес, на который отправляются уведомления от системы IntellectMoney.
     * 
     * @return void
     */
    public function setResultUrl(?string $value): void
    {
        $this->_resultUrl = $value;
    }

    /**
     * Дата, до которой СКО должен быть оплачен.
     * 
     * @return DateTime|null
     */
    public function getExpireDate(): ?DateTime
    {
        return $this->_expireDate;
    }

    /**
     * Установить дату, до которой СКО должен быть оплачен.
     * 
     * @param DateTime|null $value Новая дата, до которой должен быть оплачен СКО. 
     * 
     * @return void
     */
    public function setExpireDate(?DateTime $value): void
    {
        if ($value === null) {
            $this->_expireDate = null;
            return;
        }

        Contracts::isAnyOfType($value, [DateTime::class]);
        $this->_expireDate = $value;
    }

    /**
     * Режим холдирования 
     * 
     * @return bool|null
     * Режим холдирования
     */
    public function getHoldMode(): ?bool
    {
        return $this->_holdMode;
    }

    /**
     * Установить режим холдирования
     * 
     * @param bool|null $value Новый режим холдирования
     * 
     * @return void
     */
    public function setHoldMode(?bool $value): void
    {
        $this->_holdMode = $value;
    }

    /**
     * Время холдирования (в часах).
     * 
     * @return int|null
     * Время холдирования (в часах).
     */
    public function getHoldTime(): ?int
    {
        return $this->_holdTime;
    }

    /**
     * Установить время холдирования (в часах).
     * 
     * @param int|null $value Новое время холдирования (в часах).
     * 
     * @return void
     */
    public function setHoldTime(?int $value): void
    {
        if ($value === null) {
            $this->_holdTime = null;
            return;
        }

        if ($value < 0 || $value > 119)
            throw new \InvalidArgumentException('Hold time must be in range 0-119.');

        $this->_holdTime = $value;
    }

    /**
     * Способы оплаты.
     * 
     * @return array|null
     * Способы оплаты.
     */
    public function getPreferences(): ?array
    {
        return $this->_preferences;
    }

    /**
     * Установить способы оплаты.
     * 
     * @param array|null $value Новые способы оплаты.
     * 
     * @return void
     */
    public function setPreferences(?array $value): void
    {
        if ($value === null) {
            $this->_preferences = null;
            return;
        }

        if (!is_array($value))
            throw new \InvalidArgumentException('Preference must be an array of preference ids (from enum) or strings.');

        foreach ($value as $pref) {
            if (!is_int($pref) && !is_string($pref))
                throw new \InvalidArgumentException('Preference must be an array of preference ids (from enum) or strings.');

            if (is_int($pref) && !PreferenceType::valueExists($pref))
                throw new \InvalidArgumentException('Invalid preference.');

            if (is_string($pref) && !PreferenceType::keyExists($pref))
                throw new \InvalidArgumentException('Invalid preference.');
        }

        $this->_preference = $value;
    }

    /**
     * Чек покупки.
     * 
     * @return CashboxReceiptData|null
     * Чек покупки.
     */
    public function getMerchantReceipt(): ?CashboxReceiptData
    {
        return $this->_merchantReceipt;
    }

    /**
     * Установить чек покупки.
     * 
     * @param CashboxReceiptData|null $value Новый чек покупки.
     * 
     * @return void
     */
    public function setMerchantReceipt(CashboxReceiptData|array|null $value): void
    {
        if ($value === null)
        {
            $this->_merchantReceipt = null;
            return;
        }

        if (is_array($value))
            $this->_merchantReceipt = new CashboxReceiptData($value);
        else
            $this->_merchantReceipt = $value;
    }

    /**
     * Дополнительные поля.
     * 
     * @return array|null
     * Дополнительные поля.
     */
    public function getUserFields(): ?array
    {
        return $this->_userFields;
    }

    /**
     * Установить дополнительные поля.
     * 
     * @param array|null $value Новые дополнительные поля.
     * 
     * @return void
     */
    public function setUserFields(?array $value): void
    {
        if ($value === null) {
            $this->_userFields = null;
            return;
        }

        $this->_userFields = $value;
    }

    /**
     * Подпись запроса.
     * 
     * @return string
     * Подпись запроса.
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * Установить подпись запроса.
     * 
     * @param string $value Новая подпись запроса.
     * 
     * @return void
     */
    public function setHash(string $value): void
    {
        $this->_hash = $value;
    }

    /**
     * Подпись покупки.
     * 
     * @return string
     * Подпись покупки.
     */
    public function getPurchaseHash(): string
    {
        return $this->_purchaseHash;
    }

    /**
     * Установить подпись покупки.
     * 
     * @param string $value Новая подпись покупки.
     * 
     * @return void
     */
    public function setPurchaseHash(string $value): void
    {
        $this->_purchaseHash = $value;
    }

    /**
     * Флаг рекуррентного платежа.
     * 
     * @return bool
     * Флаг рекуррентного платежа.
     */
    public function getRecurring(): bool
    {
        return $this->_recurring;
    }

    /**
     * Установить флаг рекуррентного платежа.
     * 
     * @param bool $value Новый флаг рекуррентного платежа.
     * 
     * @return void
     */
    public function setRecurring(bool $value): void
    {
        $this->_recurring = $value;
    }

    /**
     * Секретный ключ.
     * 
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->_secretKey;
    }

    /**
     * Установить секретный ключ.
     * 
     * @param string $value Новый секретный ключ.
     * 
     * @return void
     */
    public function setSecretKey(string $value): void
    {
        $this->_secretKey = $value;
    }

    public function toArray(): array
    {
        $amount = $this->_recipientAmount->toArray();
        $result = [];
        $this->appendToArrayIfNotNull($result, 'eshopId', $this->_eshopId);
        $this->appendToArrayIfNotNull($result, 'orderId', $this->_orderId);
        $this->appendToArrayIfNotNull($result, 'serviceName', $this->_serviceName);
        $this->appendToArrayIfNotNull($result, 'recipientAmount', $amount['amount']);
        $this->appendToArrayIfNotNull($result, 'recipientCurrency', Currency::key(Currency::fromMixed($amount['currencyCode'])));
        $this->appendToArrayIfNotNull($result, 'userName', $this->_userName);
        $this->appendToArrayIfNotNull($result, 'email', $this->_email);
        $this->appendToArrayIfNotNull($result, 'successUrl', $this->_successUrl);
        $this->appendToArrayIfNotNull($result, 'failUrl', $this->_failUrl);
        $this->appendToArrayIfNotNull($result, 'backUrl', $this->_backUrl);
        $this->appendToArrayIfNotNull($result, 'expireDate', $this->_expireDate === null ? null : $this->_expireDate->format('Y-m-d H:i:s'));
        $this->appendToArrayIfNotNull($result, 'holdTime', $this->_holdTime);
        $this->appendToArrayIfNotNull($result, 'resultUrl', $this->_resultUrl);
        $this->appendToArrayIfNotNull($result, 'hash', $this->_hash);
        $this->appendToArrayIfNotNull($result, 'purchaseHash', $this->_purchaseHash);
        $this->appendToArrayIfNotNull($result, 'language', $this->getLanguage() ?? 'ru');

        if ($this->_holdMode !== null)
            $result['holdMode'] = $this->_holdMode ? 1 : 0;

        if ($this->_preferences !== null) {
            $result['preference'] = implode(':', array_map(function ($pref) {
                return PreferenceType::key($pref);
            }, $this->_preferences));
        }

        if ($this->_recurring === true)
            $result['recurringType'] = 'Activate';

        if ($this->_userFields !== null) {
            $i = 0;
            foreach ($this->_userFields as $key => $value) {
                if (is_string($key))
                    $result['userFieldName_' . $i] = $key;
                $result['userField_' . $i] = $value;
                $i++;
            }
        }

        if ($this->_merchantReceipt !== null)
            $result['merchantReceipt'] = json_encode($this->_merchantReceipt->toArray());
        
        return $result;
    }

    /**
     * Установить опциональное значение.
     * 
     * @param array& $data Массив параметров.
     * @param string $key Имя параметра.
     * @param callable $setter Функция, которая установит поле.
     * @param array& $allowedTypes Массив допустимых типов.
     * @param mixed $defaultValue Значение по умолчанию.
     * 
     * @return void
     */
    private function setOptionalValue(array& $data, string $key, callable $setter, array $allowedTypes, mixed $defaultValue = null): void
    {
        if (Contracts::keyExists($key, $data)) {
            Contracts::isAnyOfType($data[$key], $allowedTypes);
            $setter($data[$key]);
            return;
        }
        $setter($defaultValue);
    }

    /**
     * Добавить значение в массив, если оно не равно null.
     * 
     * @param array& $array Массив параметров.
     * @param string $key Имя параметра.
     * @param mixed $value Значение.
     * 
     * @return void
     */
    private function appendToArrayIfNotNull(array& $array, string $key, mixed $value): void
    {
        if ($value !== null)
            $array[$key] = $value;
    }
}
