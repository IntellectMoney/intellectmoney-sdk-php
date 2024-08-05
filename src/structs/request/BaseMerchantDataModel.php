<?php 

namespace IntellectMoney\SDK\Structs\Request;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ObjectBase;
use IntellectMoney\SDK\Structs\Common\StdTypes;

/**
 * Базовый класс для моделей запросов к API Merchant.
 */
abstract class BaseMerchantDataModel extends ObjectBase
{
    /**
     * Язык.
     * @var string
     */
    protected string $language = 'en';

    /**
     * Базовый класс для моделей запросов к API Merchant.
     * 
     * @param array|null $data - Список опций, из которых будет создан экземпляр класса.
     * ```
     * {
     *      language: string
     * }
     * ```
     */
    public function __construct(?array $data = null) {
        if (Contracts::keyExists('language', $data)) {
            Contracts::isAnyOfType($data['language'], [StdTypes::_string]);
            $this->setLanguage($data['language']);
        }
    }

    /**
     * Язык.
     * 
     * @return string
     * Возвращает язык.
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Установить язык.
     * 
     * @param string $value Новый значение языка.
     * @return void
     */
    public function setLanguage(string $value): void
    {
        $this->language = $value;
    }
}