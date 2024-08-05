<?php

namespace IntellectMoney\SDK\Common;

use IntellectMoney\SDK\Contracts\Contracts;

/**
 * Менеджер конфигурации.
 */
final class ConfigurationManager
{
    /**
     * Url для запросов к мерчанту.
     * @var string
     */
    private static string $_merchantUrl;

    /**
     * Bearer-токен для входа в систему.
     * @var string
     */
    private static string $_bearerToken;

    /**
     * Секретный ключ для подписи запроса.
     * @var string
     */
    private static string $_signSecretKey;

    /**
     * Выбрасывать исключение при ошибке запроса к API.
     * @var bool
     */
    private static bool $_throwExceptionOnError;

    /**
     * Режим разработки IntellectMoney.
     * @var bool
     */
    private static bool $_devMode;

    /**
     * Загружена ли конфигурация.
     * @var bool
     */
    private static bool $_isLoaded = false;

    /**
     * Url для запросов к мерчанту.
     * 
     * @return string
     * Возвращает url для запросов к мерчанту.
     */
    public static function getMerchantUrl(): string
    {
        static::_loadConfiguration();
        return static::$_merchantUrl;
    }

    /**
     * Bearer-токен для входа в систему.
     * 
     * @return string
     * Возвращает Bearer-токен для входа в систему.
     */
    public static function getBearerToken(): string
    {
        static::_loadConfiguration();
        return static::$_bearerToken;
    }

    /**
     * Секретный ключ для подписи запроса.
     * 
     * @return string
     * Возвращает секретный ключ для подписи запроса.
     */
    public static function getSignSecretKey(): string
    {
        static::_loadConfiguration();
        return static::$_signSecretKey;
    }

    /**
     * Выбрасывать исключение при ошибке запроса к API.
     * 
     * @return bool
     * Возвращает `true`, если нужно выбрасывать исключение при ошибке запроса к API;
     * в противном случае возвращает `false`.
     */
    public static function getThrowExceptionOnError(): bool
    {
        static::_loadConfiguration();
        return static::$_throwExceptionOnError;
    }

    /**
     * Режим разработки IntellectMoney.
     * 
     * @return bool
     * Возвращает `true`, если режим разработки IntellectMoney включен;
     * в противном случае возвращает `false`.
     */
    public static function getDevMode(): bool
    {
        static::_loadConfiguration();
        return static::$_devMode;
    }

    /**
     * Загружает конфигурацию из json-файла.
     * 
     * @throws \RuntimeException Если не удалось загрузить конфигурацию.
     * 
     * @return void
     */
    private static function _loadConfiguration(): void
    {
        if (!static::$_isLoaded) {
            try
            {
                $path = __DIR__ . '/../config.json';
                $config = json_decode(file_get_contents($path), true);
                
                Contracts::keyRequired('merchantUrl', $config);
                Contracts::keyRequired('bearerToken', $config);
                Contracts::keyRequired('signSecretKey', $config);
                Contracts::keyRequired('throwExceptionOnError', $config);

                static::$_merchantUrl = $config['merchantUrl'];
                static::$_bearerToken = $config['bearerToken'];
                static::$_signSecretKey = $config['signSecretKey'];
                static::$_throwExceptionOnError = $config['throwExceptionOnError'] ?? false;
                static::$_devMode = array_key_exists('devMode', $config) ? ($config['devMode'] ?? false) : false;
                static::$_isLoaded = true;
            }
            catch (\Exception $e)
            {
                throw new \RuntimeException('Failed to load configuration file: ' . $e->getMessage());
            }
        }
    }
}