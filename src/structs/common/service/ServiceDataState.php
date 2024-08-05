<?php 

namespace IntellectMoney\SDK\Structs\Common\Service;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\IStateData;
use IntellectMoney\SDK\Structs\Common\ObjectBase;

final class ServiceDataState extends ObjectBase implements IStateData
{
    /**
     * Статус-код.
     * @var int
     */
    protected int $_code;

    /**
     * Описание статус-кода.
     * @var ?string
     */
    protected ?string $_desc;

    public function __construct(array $data = [])
    {
        Contracts::keyRequired('Code', $data);
        Contracts::keyRequired('Desc', $data);

        $this->_code = intval($data['Code']) ?? null;
        $this->_desc = $data['Desc'] ?? null;
    }

    /**
     * Статус-код.
     * 
     * @return int
     * Возвращает статус-код.
     */
    public function getCode(): int
    {
        return $this->_code;
    }

    /**
     * Описание статус-кода.
     * 
     * @return ?string
     * Возвращает описание статус-кода.
     */
    public function getDesc(): ?string
    {
        return $this->_desc;
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
        return $this->getCode() !== 0;
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
        return $this->getDesc();
    }

    /**
     * Код ошибки.
     * 
     * @return ?int
     * Возвращает код ошибки, если он есть.
     */
    public function getErrorCode(): ?int
    {
        return $this->getCode();
    }
}
