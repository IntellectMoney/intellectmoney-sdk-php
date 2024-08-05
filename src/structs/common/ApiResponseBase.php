<?php 

namespace IntellectMoney\SDK\Structs\Common;

use IntellectMoney\SDK\Structs\Common\ObjectBase;

/**
 * Базовый объект для классов ответов IntellectMoney SDK.
 */
class ApiResponseBase extends ObjectBase implements IStateData
{
    /**
     * HTTP-код ответа.
     * @var int
     */
    protected int $_httpCode;
    
    /**
     * Сообщение об ошибке.
     * @var string
     */
    protected ?string $_errorMessage;

    /**
     * Тело ответа.
     * @var string
     */
    protected ?string $_body;

    public function __construct(int $httpCode, ?string $body = null, ?string $errorMessage = null)
    {
        $this->_httpCode = $httpCode;
        $this->_body = $body;
        $this->_errorMessage = $errorMessage;
    }

    /**
     * HTTP-код ответа.
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->_httpCode;
    }

    /**
     * Сообщение об ошибке.
     * @return string
     */
    public function getErrorMessage(): ?string
    {
        return $this->_errorMessage;
    }

    /**
     * Тело ответа.
     * @return string
     */
    public function getBody(): ?string
    {
        return $this->_body;
    }

    /**
     * Код ошибки.
     * 
     * @return ?int
     * Возвращает код ошибки, если он есть.
     */
    public function getErrorCode(): ?int
    {
        return $this->getHttpCode();
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
        return $this->getHttpCode() !== 200;
    }
}