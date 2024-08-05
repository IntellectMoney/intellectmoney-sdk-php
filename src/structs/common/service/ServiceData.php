<?php 

namespace IntellectMoney\SDK\Structs\Common\Service;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\IStateData;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\Service\ServiceDataState;

/**
 * Базовый класс для структур с данными.
 */
abstract class ServiceData extends ObjectBase implements IStateData
{
    /**
     * Статус обработки запроса сервисом.
     * @var ServiceDataState
     */
    protected ServiceDataState $_state;

    /**
     * Базовый класс для структур с данными.
     * 
     * @param array $data Данные из которых будет собран объект.
     */
    public function __construct(array $data = [])
    {
        Contracts::keyRequired('State', $data);

        $this->_state = new ServiceDataState($data['State']);
    }

    /**
     * Статус ошибки.
     * 
     * @return bool
     * Возвращает `true`, если есть ошибка; 
     * в противном случае возвращает `false`.
     */
    public function isError(): bool
    {
        return $this->_state->isError();
    }

    /**
     * Код ошибки.
     * 
     * @return ?int
     * Возвращает код ошибки, если он есть.
     */
    public function getErrorCode(): ?int
    {
        return $this->_state->getErrorCode();
    }

    /**
     * Сообщение об ошибке.
     * 
     * @return string|null
     * Возвращает сообщение об ошибке, если оно есть; 
     * в противном случае возвращает `null`.
     */
    public function getErrorMessage(): ?string
    {
        return $this->_state->getErrorMessage();
    }
}

