<?php

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\Receipt\CashboxReceiptContentData;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Класс, представляющий чек магазина.
 */
final class CashboxReceiptData extends ObjectBase
{
    /**
     * ИНН поставщика.
     * @var string
     */
    protected string $_inn = '';

    /**
     * Группа устройств.
     * @var string
     */
    protected string $_group = '';

    /**
     * Пропускать ли проверку суммы на стороне API.
     * @var bool
     */
    protected bool $_skipAmountCheck = false;

    /**
     * Содержимое чека.
     * @var CashboxReceiptContentData
     */
    protected CashboxReceiptContentData $_content;

    /**
     * Класс, представляющий чек магазина.
     * 
     * @param array $data Данные чека.
     * ```
     * {
     *    inn: ?string,
     *    group: ?string,
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        if (Contracts::keyExists('inn', $data)) {
            Contracts::isAnyOfType($data['inn'], [StdTypes::_string]);
            $this->_inn = $data['inn'];
        }
        if (Contracts::keyExists('group', $data)) {
            Contracts::isAnyOfType($data['group'], [StdTypes::_string]);
            $this->_group = $data['group'];
        }
        if (Contracts::keyExists('skipAmountCheck', $data))
            $this->_skipAmountCheck = (bool) $data['skipAmountCheck'];

        if (Contracts::keyExists('content', $data) && Contracts::isAnyOfType($data['content'], [CashboxReceiptContentData::class, StdTypes::_array])) {
            if (!is_array($data['content'])) {
                $this->_content = $data['content'];
            } else {
                $this->_content = new CashboxReceiptContentData($data['content']);
            }
        }
    }

    /**
     * Получить ИНН поставщика.
     * 
     * @return string
     * Возвращает ИНН поставщика.
     */
    public function getInn(): string
    {
        return $this->_inn;
    }

    /**
     * Установить ИНН поставщика.
     * 
     * @param string $value Новое значение ИНН.
     * @return void
     */
    public function setInn(string $value): void
    {
        $this->_inn = $value;
    }

    /**
     * Получить группу устройств.
     * 
     * @return string
     * Возвращает группу устройств.
     */
    public function getGroup(): string
    {
        return $this->_group;
    }

    /**
     * Установить группу устройств.
     * 
     * @param string $value Новое значение группы.
     * @return void
     */
    public function setGroup(string $value): void
    {
        $this->_group = $value;
    }

    /**
     * Пропускать ли проверку суммы на стороне API.
     * 
     * @return bool
     * Возвращает флаг - пропускать ли проверку суммы на стороне API.
     */
    public function getSkipAmountCheck(): bool
    {
        return $this->_skipAmountCheck;
    }

    /**
     * Установить флаг - пропускать ли проверку суммы на стороне API.
     * 
     * @param bool $value Новое значение флага.
     * @return void
     */
    public function setSkipAmountCheck(bool $value): void
    {
        $this->_skipAmountCheck = $value;
    }

    /**
     * Получить содержимое чека.
     * 
     * @return CashboxReceiptContentData
     * Возвращает содержимое чека.
     */
    public function getContent(): CashboxReceiptContentData
    {
        return $this->_content;
    }

    /**
     * Установить содержимое чека.
     * 
     * @param CashboxReceiptContentData|array $value Новое значение содержимого чека.
     * @return void
     */
    public function setContent(CashboxReceiptContentData|array $value): void
    {
        if (is_array($value))
            $this->_content = new CashboxReceiptContentData($value);
        $this->_content = $value;
    }

    /**
     * Добавить позицию в чек.
     * 
     * @param CashboxReceiptPosition|array $value Позиция чека.
     * @return void
     */
    public function pushPosition(array|CashboxReceiptPosition $value): void
    {
        $currentPositions = $this->getContent()->getPositions();
        if (is_array($value)) {
            $currentPositions[] = new CashboxReceiptPosition($value);
        } else {
            Contracts::isAnyOfType($value, [CashboxReceiptPosition::class]);
            $currentPositions[] = $value;
        }

        $this->getContent()->setPositions($currentPositions);
    }

    /**
     * Добавить платеж в чек.
     * 
     * @param CashboxReceiptPayment|array $value Платеж.
     * @return void
     */
    public function pushPayment(array|CashboxReceiptPayment $value): void
    {
        Contracts::notNull($this->_content->getCheckClose(), 'Can not add payment to receipt without checkClose structure.');

        $currentPayments = $this->getContent()->getCheckClose()->getPayments();
        if (is_array($value)) {
            $currentPayments[] = new CashboxReceiptPayment($value);
        } else {
            Contracts::isAnyOfType($value, [CashboxReceiptPayment::class]);
            $currentPayments[] = $value;
        }

        $this->getContent()->getCheckClose()->setPayments($currentPayments);
    }
}
