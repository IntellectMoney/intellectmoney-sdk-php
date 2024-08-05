<?php 

namespace IntellectMoney\SDK\Structs\Common;

use IntellectMoney\SDK\Contracts\Contracts;

/**
 * Данные способа оплаты.
 */
final class PaymentMethod extends ObjectBase 
{
    /**
     * Идентифкатор способа оплаты.
     * @var int
     */
    protected int $_id;

    /**
     * Доступная сумма для оплаты.
     * @var Money
     */
    protected Money $_amount;

    /**
     * Логическое имя процесса оплаты.
     * @var string
     */
    protected string $_inputType;

    /**
     * Логическое имя способа оплаты.
     * @var string
     */
    protected string $_preference;

    /**
     * Классификации способа оплаты.
     * @var array
     */
    protected array $_preferenceTypes;

    /**
     * Время зачисления средств.
     * @var string
     */
    protected string $_serviceTimeOfEnrollmentType;

    /**
     * Комиссия.
     * @var float
     */
    protected float $_commission;

    /**
     * Отображается ли способ оплаты в UI.
     * @var bool
     */
    protected bool $_isVisible;

    /**
     * Активен ли способ оплаты.
     * @var bool
     */
    protected bool $_isActive;

    /**
     * Позиция способа оплаты в списке.
     * @var int
     */
    protected int $_position;

    public function __construct(array $data = [])
    {
        Contracts::keyRequired('Id', $data);
        Contracts::keyRequired('Amount', $data);
        Contracts::keyRequired('InputType', $data);
        Contracts::keyRequired('Preference', $data);
        Contracts::keyRequired('PreferenceTypes', $data);
        Contracts::keyRequired('ServiceTimeOfEnrollmentType', $data);
        Contracts::keyRequired('Commission', $data);
        Contracts::keyRequired('IsVisible', $data);
        Contracts::keyRequired('IsActive', $data);

        Contracts::keyRequired('Amount', $data['Amount']);
        Contracts::keyRequired('Currency', $data['Amount']);

        $this->_id = intval($data['Id']);
        $this->_amount = new Money($data['Amount']['Amount'], Currency::value($data['Amount']['Currency']));
        $this->_inputType = $data['InputType'];
        $this->_preference = $data['Preference'];
        $this->_preferenceTypes = $data['PreferenceTypes'];
        $this->_serviceTimeOfEnrollmentType = $data['ServiceTimeOfEnrollmentType'];
        $this->_commission = floatval($data['Commission']);
        $this->_isVisible = boolval($data['IsVisible']);
        $this->_isActive = boolval($data['IsActive']);
        $this->_position = intval($data['Position']);
    }

    /**
     * Идентификатор способа оплаты.
     * 
     * @return int
     * Возвращает идентификатор способа оплаты.
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Доступная сумма для оплаты.
     * 
     * @return Money
     * Возвращает доступную сумму для оплаты.
     */
    public function getAmount(): Money
    {
        return $this->_amount;
    }

    /**
     * Логическое имя процесса оплаты.
     * 
     * @return string
     * Возвращает логическое имя процесса оплаты.
     */
    public function getInputType(): string
    {
        return $this->_inputType;
    }

    /**
     * Логическое имя способа оплаты.
     * 
     * @return string
     * Возвращает логическое имя способа оплаты.
     */
    public function getPreference(): string
    {
        return $this->_preference;
    }

    /**
     * Классификации способа оплаты.
     * 
     * @return array
     * Возвращает классификации способа оплаты.
     */
    public function getPreferenceTypes(): array
    {
        return $this->_preferenceTypes;
    }

    /**
     * Время зачисления средств.
     * 
     * @return string
     * Возвращает время зачисления средств.
     */
    public function getServiceTimeOfEnrollmentType(): string
    {
        return $this->_serviceTimeOfEnrollmentType;
    }

    /**
     * Комиссия.
     * 
     * @return float
     * Возвращает комиссию.
     */
    public function getCommission(): float
    {
        return $this->_commission;
    }

    /**
     * Отображается ли способ оплаты в UI.
     * 
     * @return bool
     * Возвращает отображается ли способ оплаты в UI.
     */
    public function getIsVisible(): bool
    {
        return $this->_isVisible;
    }

    /**
     * Активен ли способ оплаты.
     * 
     * @return bool
     * Возвращает активен ли способ оплаты.
     */
    public function getIsActive(): bool
    {
        return $this->_isActive;
    }

    /**
     * Позиция способа оплаты в списке.
     * 
     * @return int
     * Возвращает позицию способа оплаты в списке.
     */
    public function getPosition(): int
    {
        return $this->_position;
    }
}