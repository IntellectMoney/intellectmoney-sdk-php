<?php

namespace IntellectMoney\SDK\Structs\Common\Service;

use IntellectMoney\SDK\Common\ResultFactory;
use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ApiResponseBase;
use IntellectMoney\SDK\Structs\Common\Service\ServiceDataState;
use IntellectMoney\SDK\Structs\Common\Service\ServiceData;

/**
 * Результат обработки запроса сервисом.
 */
final class ServiceDataResult extends ApiResponseBase
{
    /**
     * Статус обработки запроса сервисом.
     * @var ServiceDataState
     */
    private ServiceDataState $_operationState;

    /**
     * Результат запроса.
     * @var ServiceData
     */
    private ?ServiceData $_result;

    /**
     * Идентификатор магазина.
     * @var int
     */
    private ?int $_eshopId;

    /**
     * Создание объекта.
     * 
     * @param ApiResponseBase $response Ответ, полученый от API.
     * @param string $method Вызваный метод.
     */
    public function __construct(ApiResponseBase $response, string $method)
    {
        Contracts::notNull($response);

        parent::__construct($response->getHttpCode(), $response->getBody(), $response->getErrorMessage());
        $response_data = json_decode($this->getBody(), true);

        if ($this->getHttpCode() !== 200)
            return;

        Contracts::keyRequired('OperationState', $response_data);

        $this->_operationState = new ServiceDataState($response_data['OperationState']);
        $this->_eshopId = Contracts::keyExists('EshopId', $response_data) && is_numeric($response_data['EshopId']) ? intval($response_data['EshopId']) : null;
        if (!is_array($response_data['Result'])) {
            $this->_result = null;
            return;
        }

        $this->_result = ResultFactory::create($method, $response_data['Result']);
    }

    /**
     * Статус обработки запроса сервисом.
     * @return ServiceDataState
     */
    public function getOperationState(): ServiceDataState
    {
        return $this->_operationState;
    }

    /**
     * Идентификатор магазина.
     * @return ?int
     */
    public function getEshopId(): ?int
    {
        return $this->_eshopId;
    }

    /**
     * Результат запроса.
     * @return mixed
     */
    public function getResult(): ServiceData
    {
        return $this->_result;
    }

    /**
     * Признак ошибки.
     * 
     * @return bool
     * Возвращает `true`, если есть ошибка;
     * в противном случае возвращает `false`.
     */
    public function isError(): bool
    {
        if ($this->getHttpCode() !== 200)
            return true;

        if ($this->_operationState->isError())
            return true;

        if ($this->_result->isError())
            return true;

        return false;
    }

    /**
     * Код ошибки.
     * 
     * @return ?int
     * Возвращает код ошибки, если он есть.
     */
    public function getErrorCode(): ?int
    {
        if ($this->getHttpCode() !== 200)
            return $this->getHttpCode();

        if ($this->_operationState->isError())
            return $this->_operationState->getErrorCode();

        return $this->_result->getErrorCode();
    }

    /**
     * Сообщение об ошибке.
     * 
     * @return ?string
     * Возвращает сообщение об ошибке, если оно есть;
     * в противном случае возвращает `null`.
     */
    public function getErrorMessage(): ?string
    {
        if ($this->getHttpCode() !== 200)
            return $this->_errorMessage;

        if ($this->_operationState->isError())
            return $this->_operationState->getErrorMessage();

        return $this->_result->getErrorMessage();
    }
}
