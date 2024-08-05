<?php 

namespace IntellectMoney\SDK\Structs\Common;

/**
 * Базовый класс для перечислений.
 */
abstract class BaseEnum
{
    /**
     * Список значений перечисления:
     * Ключ - значения перечисления.
     * Значение - имя перечисления.
     */
    protected static array $_values = [];

    /**
     * Возвращает ключ, по его значению.
     * 
     * @param int $value Значение перечисления.
     * 
     * @throws \OutOfRangeException Если значение перечисления не существует.
     * 
     * @return string Ключ перечисления.
     */
    public static function key(int $value): string
    {
        if (array_key_exists($value, static::$_values))
            return static::$_values[$value];
        throw new \OutOfRangeException('Invalid enum value: ' . $value);
    }

    /**
     * Проверить, существует ли значение.
     * 
     * @param int $value Значение перечисления.
     * 
     * @return bool
     * Возвращает `true`, если значение существует;
     * в противном случае возвращает `false`.
     */
    public static function valueExists(int $value): bool
    {
        return array_key_exists($value, static::$_values);
    }

    /**
     * Получить значение, по ключу перечисления.
     * 
     * @param string $key Ключ перечисления.
     * 
     * @throws \OutOfRangeException Если ключ перечисления не существует.
     * 
     * @return int Значение перечисления.
     */
    public static function value(string $key): int
    {
        foreach (static::$_values as $k => $v) {
            if ($v == $key)
                return $k;
        }
        throw new \OutOfRangeException('Invalid enum key: ' . $key);
    }

    /**
     * Проверить, существует ли ключ.
     * 
     * @param string $key Ключ перечисления.
     * 
     * @return bool
     * Возвращает `true`, если ключ существует;
     * в противном случае возвращает `false`.
     */
    public static function keyExists(string $key): bool
    {
        foreach(static::$_values as $k => $v)
            if ($v == $key)
                return true;
        return false;
    }

    /**
     * Получить значение перечисления из переменной.
     * 
     * @param mixed $value Значение перечисления.
     * 
     * @return int
     * Возвращает значение перечисления, которое точно существует; 
     * Возвращает `0`, если значение недействительно.
     * Возвращает `null`, если значение `null`.
     */
    public static function fromMixed(mixed $value): ?int
    {
        if ($value === null)
            return null;

        if (is_string($value))
            return static::value($value);
        if (static::valueExists(intval($value)))
            return $value;
        return 0;
    }
}