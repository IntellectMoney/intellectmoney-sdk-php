<?php 

namespace IntellectMoney\SDK\Contracts;

use IntellectMoney\SDK\Structs\Common\StdTypes;
use stdClass;

/**
 * Класс контрактов.
 */
final class Contracts
{
    /**
     * Наличие ключа обязательно.
     * 
     * @param string $key Ключ.
     * @param array $array Массив.
     * @param ?string $msg Сообщение об ошибке.
     * 
     * @throws \InvalidArgumentException Выбрасывает исключение, если контракт не удовлетворен.
     * 
     * @return bool
     * Возвращает `true`, если контракт удовлетворен.
     */
    public static function keyRequired(string $key, array $array, ?string $msg = null): bool
    {
        if (!is_array($array))
            throw new \InvalidArgumentException($msg === null ? 'Argument $array must be an array.' : $msg);
        
        if (!array_key_exists($key, $array))
            throw new \InvalidArgumentException($msg === null ? 'Key "' . $key . '" not found in $array.' : $msg);

        return true;
    }

    /**
     * Проверить, что ключ существует и его значение не равно `null`.
     * 
     * @param string $key Ключ.
     * @param array $array Массив.
     * 
     * @return bool
     * Возвращает `true`, если значение существует; 
     * в противном случае возвращает `false`.
     */
    public static function keyExists(string $key, array $array): bool
    {
        if (!is_array($array))
            return false;
        if (!array_key_exists($key, $array))
            return false;
        return !is_null($array[$key]);
    }

    /**
     * Класс должен принадлежать хотя бы одному из типов.
     * 
     * @param mixed $object Объект.
     * @param array $types Типы.
     * @param ?string $msg Сообщение об ошибке.
     * 
     * @throws \InvalidArgumentException Выбрасывает исключение, если контракт не удовлетворен.
     * 
     * @return bool
     * Возвращает `true`, если объект принадлежит хотя бы одному из типов;
     */
    public static function isAnyOfType(mixed $object, array $types, ?string $msg = null): bool
    {
        foreach($types as $type)
        {
            if ($type !== StdTypes::_array && is_a($object, $type))
                return true;
            if ($type !== StdTypes::_array && gettype($object) === $type)
                return true;
            if ($type === StdTypes::_array && is_array($object))
                return true;
        }
        
        $msg = 'Object must be an instance of any type in list: ' . implode(', ', $types) . ' was ' . gettype($object);
        if (count($types) === 1)
            $msg = 'Object must be an instance of ' . $types[0] . ' was ' . gettype($object);

        throw new \InvalidArgumentException($msg);
    }

    /**
     * Объект не может быть null.
     * 
     * @param mixed $object Объект.
     * @param ?string $msg Сообщение об ошибке.
     * 
     * @throws \InvalidArgumentException Выбрасывает исключение, если контракт не удовлетворен.
     * 
     * @return bool
     * Возвращает `true`, если объект не равен `null`;
     */
    public static function notNull(mixed $object, ?string $msg = null): bool
    {
        if (is_null($object))
            throw new \InvalidArgumentException($msg ?? 'Object must be not null');

        return true;
    }
}