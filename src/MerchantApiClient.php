<?php 

namespace IntellectMoney\SDK;

use IntellectMoney\SDK\Common\ApiClient;
use IntellectMoney\SDK\Common\ConfigurationManager;
use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\ApiRequest;
use IntellectMoney\SDK\Structs\Common\AuthData;
use IntellectMoney\SDK\Structs\Common\Service\ServiceDataResult;
use IntellectMoney\SDK\Structs\Request\CheckInvoiceDataModel;
use IntellectMoney\SDK\Structs\Request\CreateInvoiceDataModel;
use IntellectMoney\SDK\Structs\Request\PayInvoiceBankCardDataModel;

/**
 * Оболочка для взаимодействия с API IntellectMoney.
 */
final class MerchantApiClient extends ApiClient
{
    protected static array $_hashPatterns = [
        'createInvoice' => 'eshopId::orderId::serviceName::recipientAmount::recipientCurrency::userName::email::successUrl::failUrl::backUrl::resultUrl::expireDate::holdMode::preference::secretKey', 
        'bankCardPayment' => 'eshopId::invoiceId::pan::cardHolder::expiredMonth::expiredYear::cvv::returnUrl::ipAddress::secretKey', 
        'getBankCardPaymentState' => 'eshopId::invoiceId::secretKey',
        'purchaseHash'  => 'eshopId::orderId::serviceName::recipientAmount::recipientCurrency::secretKey', 
        'purchaseHashRecurring'  => 'eshopId::orderId::serviceName::recipientAmount::recipientCurrency::recurringType::secretKey', 
    ];

    protected static array $_signPatterns = [
        'createInvoice' => 'eshopId::orderId::serviceName::recipientAmount::recipientCurrency::userName::email::successUrl::failUrl::backUrl::resultUrl::expireDate::holdMode::preference::signSecretKey', 
        'bankCardPayment' => 'eshopId::invoiceId::pan::cardHolder::expiredMonth::expiredYear::cvv::returnUrl::ipAddress::signSecretKey', 
        'getBankCardPaymentState' => 'eshopId::invoiceId::signSecretKey',
    ];

    /**
     * Выставить счет к оплате (СКО).
     * 
     * @param CreateInvoiceDataModel $requestData - Запрос на создание СКО.
     * @param AuthData $authData - Данные для авторизации в системе.
     * 
     * @throws \LogicException Выбрасывает логическое исключенеие в случае ошибки (если включено).
     * @throws \Exception Выбрасывает исключения, если при отправке запроса произошла ошибка.
     * 
     * @return ServiceDataResult
     * Возвращает результат обработки, если запрос успешно отправлен.
     */
    public static function createInvoice(CreateInvoiceDataModel $requestData, AuthData $authData): ServiceDataResult
    {
        Contracts::notNull($requestData);
        $purchaseHashPtr = $requestData->getRecurring() ? 'purchaseHashRecurring' : 'purchaseHash';

        $requestData->setHash(self::getHash(__FUNCTION__, $requestData->toArray(), $authData));
        $requestData->setPurchaseHash(self::getHash($purchaseHashPtr, $requestData->toArray(), $authData));
        $request = new ApiRequest('merchant/createInvoice', $requestData->toArray());

        $response = self::sendRequest($request, $authData);
        $result = new ServiceDataResult($response, __FUNCTION__);
        
        if ($result->isError() && ConfigurationManager::getThrowExceptionOnError())
            throw new \LogicException("MerchantApiClient::" . __FUNCTION__ . " - IntellectMoney API returned error: " . $result->getErrorMessage() . ', error code: ' . $result->getErrorCode());
        
        return $result;
    }

    /**
     * Оплата СКО с помощью банковской карты.
     * 
     * @param PayInvoiceBankCardDataModel $requestData - Запрос на оплату СКО.
     * @param AuthData $authData - Данные для авторизации в системе.
     * 
     * @throws \LogicException Выбрасывает логическое исключенеие в случае ошибки (если включено).
     * @throws \Exception Выбрасывает исключения, если при отправке запроса произошла ошибка.
     * 
     * @return ServiceDataResult
     * Возвращает результат обработки, если запрос успешно отправлен.
     */
    public static function bankCardPayment(PayInvoiceBankCardDataModel $requestData, AuthData $authData): ServiceDataResult
    {
        Contracts::notNull($requestData);

        $requestData->setHash(self::getHash(__FUNCTION__, $requestData->toArray(), $authData));
        $request = new ApiRequest('merchant/bankCardPayment', $requestData->toArray());

        $response = self::sendRequest($request, $authData);
        $result = new ServiceDataResult($response, __FUNCTION__);
        
        if ($result->isError() && ConfigurationManager::getThrowExceptionOnError())
            throw new \LogicException("MerchantApiClient::" . __FUNCTION__ . " - IntellectMoney API returned error: " . $result->getErrorMessage() . ', error code: ' . $result->getErrorCode());
        
        return $result;
    }

    /**
     * Используется для получения информации о состоянии оплаты счета.
     * 
     * @param CheckInvoiceDataModel $requestData - Запрос на проверку состояния оплаты.
     * @param AuthData $authData - Данные для авторизации в системе.
     * 
     * @throws \LogicException Выбрасывает логическое исключенеие в случае ошибки (если включено).
     * @throws \Exception Выбрасывает исключения, если при отправке запроса произошла ошибка.
     * 
     * @return ServiceDataResult
     * Возвращает результат обработки, если запрос успешно отправлен.
     */
    public static function getBankCardPaymentState(CheckInvoiceDataModel $requestData, AuthData $authData): ServiceDataResult
    {
        Contracts::notNull($requestData);

        $requestData->setHash(self::getHash(__FUNCTION__, $requestData->toArray(), $authData));
        $request = new ApiRequest('merchant/getBankCardPaymentState', $requestData->toArray());

        $response = self::sendRequest($request, $authData);
        $result = new ServiceDataResult($response, __FUNCTION__);
        
        if ($result->isError() && ConfigurationManager::getThrowExceptionOnError())
            throw new \LogicException("MerchantApiClient::" . __FUNCTION__ . " - IntellectMoney API returned error: " . $result->getErrorMessage() . ', error code: ' . $result->getErrorCode());
        
        return $result;
    }
}