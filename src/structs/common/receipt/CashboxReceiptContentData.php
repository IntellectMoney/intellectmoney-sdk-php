<?php

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\Receipt\CashboxReceiptClose;
use IntellectMoney\SDK\Structs\Common\Receipt\CashboxReceiptPosition;
use IntellectMoney\SDK\Structs\Common\Receipt\ReceiptDocType;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Класс, представляющий содержимое чека.
 */
final class CashboxReceiptContentData extends ObjectBase
{
    /**
     * Тип чека.
     * @var int
     */
    protected int $_type = 1;

    /**
     * Телефон или e-mail покупателя.
     * @var string
     */
    protected string $_customerContact = '';

    /**
     * Признак агента.
     * @var ?int
     */
    protected ?int $_agentType = null;

    /**
     * Позиции чека.
     * @var array
     */
    protected array $_positions = [];

    /**
     * Структура закрытия чека.
     * @var CashboxReceiptClose
     */
    protected ?CashboxReceiptClose $_checkClose;

    /**
     * Класс, представляющий содержимое чека.
     * 
     * @param array $data Массив с данными.
     * ```
     * {
     *  type: int|string, 
     *  customerContact: string,
     *  agentType: ?int,
     *  positions?: array,
     *  checkClose?: CashboxReceiptClose
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        Contracts::keyRequired('type', $data);
        Contracts::keyRequired('customerContact', $data);
        Contracts::isAnyOfType($data['type'], [StdTypes::_int, StdTypes::_string]);
        Contracts::isAnyOfType($data['customerContact'], [StdTypes::_string]);

        $this->_type = ReceiptDocType::fromMixed($data['type']);
        $this->_customerContact = (string) $data['customerContact'];
        
        if (Contracts::keyExists('agentType', $data)) {
            Contracts::isAnyOfType($data['agentType'], [StdTypes::_int]);
            $this->_agentType = intval($data['agentType']);
        }

        if (Contracts::keyExists('positions', $data)) {
            Contracts::isAnyOfType($data['positions'], [StdTypes::_array]);
            $this->setPositions($data['positions']);
        } else {
            $this->setPositions([]);
        }

        if (Contracts::keyExists('checkClose', $data)) {
            Contracts::isAnyOfType($data['checkClose'], [CashboxReceiptClose::class, StdTypes::_array]);
            $this->setCheckClose($data['checkClose']);
        } else {
            $this->setCheckClose(null);
        }
    }

    /**
     * Получить тип чека.
     * 
     * @return int
     * Возвращает тип чека.
     */
    public function getType(): int
    {
        return $this->_type;
    }

    /**
     * Установить тип чека.
     * 
     * @param int|string $value Новое значение типа чека.
     * @return void
     */
    public function setType(int|string $value): void
    {
        $this->_type = ReceiptDocType::fromMixed($value);
    }

    /**
     * Получить телефон или e-mail покупателя.
     * 
     * @return string
     * Возвращает телефон или e-mail покупателя.
     */
    public function getCustomerContact(): string
    {
        return $this->_customerContact;
    }

    /**
     * Установить телефон или e-mail покупателя.
     * 
     * @param string $value Новое значение телефона или e-mail покупателя.
     * @return void
     */
    public function setCustomerContact(string $value): void
    {
        $this->_customerContact = $value;
    }

    /**
     * Получить признак агента.
     * 
     * @return ?int
     * Возвращает признак агента.
     */
    public function getAgentType(): ?int
    {
        return $this->_agentType;
    }

    /**
     * Установить признак агента.
     * 
     * @param ?int $value Новое значение признака агента.
     * @return void
     */
    public function setAgentType(?int $value): void
    {
        $this->_agentType = $value;
    }

    /**
     * Получить позиции чека.
     * 
     * @return array
     * Возвращает позиции чека.
     */
    public function getPositions(): array
    {
        return $this->_positions;
    }

    /**
     * Установить позиции чека.
     * 
     * @param array $value Новое значение позиции чека.
     * @return void
     */
    public function setPositions(array $value): void
    {
        $this->_positions = [];

        Contracts::isAnyOfType($value, [StdTypes::_array]);

        foreach($value as $id => $position) {
            Contracts::isAnyOfType($position, [StdTypes::_array, CashboxReceiptPosition::class]);
            if (is_array($position))
                array_push($this->_positions, new CashboxReceiptPosition($position));
            else
                array_push($this->_positions, $position);
        }
    }

    /**
     * Получить структуру закрытия чека.
     * 
     * @return CashboxReceiptClose
     * Возвращает структуру закрытия чека.
     */
    public function getCheckClose(): ?CashboxReceiptClose
    {
        return $this->_checkClose;
    }

    /**
     * Установить структуру закрытия чека.
     * 
     * @param CashboxReceiptClose $value Новое значение структуры закрытия чека.
     * @return void
     */
    public function setCheckClose(CashboxReceiptClose|array|null $value): void
    {
        if ($value === null) {
            $this->_checkClose = null;
            return;
        }

        if (is_array($value))
            $this->_checkClose = new CashboxReceiptClose($value);
        else
            $this->_checkClose = $value;
    }
}