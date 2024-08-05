<?php 

namespace IntellectMoney\SDK\Structs\Common;

use IntellectMoney\SDK\Common\ConfigurationManager;

/**
 * Данные для авторизации в системе.
 */
final class AuthData
{
    /**
     * Cекретный ключ магазина.
     * @var string
     */
    protected string $_secretKey;
    
    /**
     * Bearer-токен для входа в систему.
     * @var string
     */
    protected string $_bearerToken;

    /**
     * Секретный ключ для подписи запроса.
     * @var string
     */
    protected string $_signSecretKey;

    /**
     * Данные для авторизации в системе.
     * 
     * @param string $secretKey Секретный ключ магазина.
     */
    public function __construct(string $secretKey)
    {
        $this->_secretKey = $secretKey;

        $this->_bearerToken = ConfigurationManager::getBearerToken();
        $this->_signSecretKey = ConfigurationManager::getSignSecretKey();        
    }

    /**
     * Bearer-токен для входа в систему.
     * 
     * @return string
     * Возвращает bearer-токен для входа в систему.
     */
    public function getBearerToken(): string
    {
        return $this->_bearerToken;
    }

    /**
     * Секретный ключ для подписи запроса.
     * 
     * @return string
     * Возвращает секретный ключ для подписи запроса.
     */
    public function getSignSecretKey(): string
    {
        return $this->_signSecretKey;
    }

    /**
     * Cекретный ключ магазина.
     * 
     * @return string
     * Возвращает секретный ключ магазина.
     */
    public function getSecretKey(): string
    {
        return $this->_secretKey;
    }
}