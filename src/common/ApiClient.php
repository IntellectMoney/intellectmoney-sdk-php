<?php

namespace IntellectMoney\SDK\Common;

use IntellectMoney\SDK\Structs\Common\ApiRequest;
use IntellectMoney\SDK\Structs\Common\ApiResponseBase;
use IntellectMoney\SDK\Structs\Common\AuthData;
use IntellectMoney\SDK\Structs\Common\HttpCode;

/**
 * Базовый клиент для любого API IntellectMoney.
 */
abstract class ApiClient
{
    /**
     * Список паттернов, для формирования хеша.
     * 
     * @var array
     */
    protected static array $_hashPatterns = [];

    /**
     * Список паттернов, для формирования подписки запроса.
     * 
     * @var array
     */
    protected static array $_signPatterns = [];

    /**
     * Сформировать хеш для подписи запроса. 
     * 
     * @param string $pattern Паттерн, по которому формируется базовая строка.
     * @param array $options Параметры, из которых получаются данные для подписи.
     * @param AuthData $authData Данные для авторизации в системе.
     * 
     * @return string 
     * Возвращает хеш для подписи.
     */
    protected static function getHash(string $pattern, array $options, AuthData $authData): string
    {
        if (array_key_exists($pattern, static::$_hashPatterns))
            return static::_calculateHash(static::$_hashPatterns[$pattern], $options, $authData);
        throw new \OutOfRangeException('Invalid pattern: ' . $pattern);
    }

    /**
     * Сформировать Sign для подписи запроса.
     * 
     * @param $method Для которого формируется подпись.
     * @param array $options Параметры, из которых получаются данные для подписи.
     * @param AuthData $authData Данные для авторизации в системе.
     * 
     * @return string
     * Возвращает подпись.
     */
    protected static function getSign(string $method, array $options, AuthData $authData): string
    {
        if (array_key_exists($method, static::$_signPatterns))
            return static::_calculateHash(static::$_signPatterns[$method], $options, $authData);
        throw new \OutOfRangeException('Invalid method: ' . $method);
    }

    /**
     * Отправить запрос в API.
     * 
     * @param ApiRequest $request Запрос.
     * @param AuthData $authData Данные для авторизации в системе.
     * 
     * @return ApiResponseBase
     * Возвращает ответ API.
     */
    protected static function sendRequest(ApiRequest $request, AuthData $authData): ApiResponseBase
    {
        $curl = curl_init();
        $uri_parts = explode('/', $request->getUrl());
        $full_url = ConfigurationManager::getMerchantUrl() . $request->getUrl();
        $function_name = end($uri_parts);
        $json_data = json_encode($request->getData());
        $sign = static::getSign($function_name, $request->getData(), $authData);

        $headers = [
            'Authorization: Bearer ' . $authData->getBearerToken(),
            'Sign: ' . $sign
        ];
        foreach ($request->getHeaders() as $header => $value)
            $headers[] = $header . ': ' . $value;

        curl_setopt($curl, CURLOPT_URL, $full_url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if (ConfigurationManager::getDevMode()) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($curl);
        $err_msg = $response === false ? curl_error($curl) : null;
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_code != 200 && empty($err_msg))
            $err_msg = HttpCode::key($http_code);

        curl_close($curl);
        return new ApiResponseBase($http_code, $response === false ? null : $response, $err_msg);
    }

    /**
     * Вычислить хеш.
     * 
     * @param string $pattern Паттерн, по которому формируется базовая строка.
     * @param array $options Параметры, из которых получаются данные для подписи.
     * @param AuthData $authData Данные для авторизации в системе.
     * 
     * @return string
     * Возвращает хеш.
     */
    private static function _calculateHash(string $pattern, array $options, AuthData $authData): string
    {
        if (empty($pattern))
            throw new \InvalidArgumentException('Empty pattern');

        $pattern_parts = explode('::', $pattern);
        foreach ($pattern_parts as &$part) {
            switch (strtolower($part)) {
                case 'secretkey':
                    $part = $authData->getSecretKey();
                    break;
                case 'signsecretkey':
                    $part = $authData->getSignSecretKey();
                    break;
                default:
                    $hash_value = '';
                    foreach ($options as $option => $value) {
                        if (strtolower($part) !== strtolower($option))
                            continue;
                        $hash_value = $value;
                        break;
                    }
                    $part = $hash_value;
                break;
            }
        }
        
        return md5(implode('::', $pattern_parts));
    }
}
