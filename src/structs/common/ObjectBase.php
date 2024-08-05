<?php 

namespace IntellectMoney\SDK\Structs\Common;

use stdClass;

/**
 * Базовый объект для классов IntellectMoney SDK.
 */
class ObjectBase extends stdClass
{
    /**
     * Возвращает ассоциативный массив со свойствами текущего объекта.
     * 
     * @return array Ассоциативный массив со свойствами текущего объекта.
     */
    public function toArray(): array
    {
        $result = [];
        foreach(get_class_methods($this) as $method)
        {
            if (strncmp('get', $method, 3) === 0)
            {
                $property = preg_replace('/[A-Z]/', '$0', lcfirst(substr($method, 3)));
                $value = $this->$method();
                if ($value === null)
                    continue;

                if ($value instanceof ObjectBase)
                    $value = $value->toArray();
                else if (is_array($value))
                    foreach($value as $k => $v)
                        $value[$k] = $v instanceof ObjectBase ? $v->toArray() : $v;

                $result[$property] = $value;
            }
        }
        return $result;
    }
}