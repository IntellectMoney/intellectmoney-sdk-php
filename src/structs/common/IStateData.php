<?php 

namespace IntellectMoney\SDK\Structs\Common;

/**
 * Интерфейс объектов, способных иметь состояние для проверки на ошибочность.
 */
interface IStateData
{
    /**
     * Признак ошибки.
     * 
     * @return bool
     * Возвращает `true`, если есть ошибка;
     * в противном случае возвращает `false`.
     */
    public function isError(): bool;

    /**
     * Сообщение об ошибке.
     * 
     * @return ?string
     * Возвращает сообщение об ошибке, если она есть.
     */
    public function getErrorMessage(): ?string;

    /**
     * Код ошибки.
     * 
     * @return ?int
     * Возвращает код ошибки, если он есть.
     */
    public function getErrorCode(): ?int;
}