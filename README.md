# IntellectMoney Merchant SDK - PHP

Данное SDK позволяет проводить платежи при помощи [Merchant API 2.0](https://wiki.intellectmoney.ru/display/TECH/Merchant+2.0+API).

[Быстрый старт Merchant API](https://wiki.intellectmoney.ru/pages/viewpage.action?pageId=160333826#1603338264b60de6b54d544c296013d698782b806)

## Требования

+ PHP >= 8.0 + libcurl

## Установка

### Через терминал
1. [Установить менеджер пакетов Composer](https://getcomposer.org/download/).
2. Выполнить команду ```composer require intellectmoney/sdk-php``` в терминале.

### Через файл ```composer.json``` своего проекта

1. Добавить строку ```"intellectmoney/sdk-php": "^1.0.0"``` в список зависимостей.
2. Обновить зависимости проекта при помощи ```composer update```.
3. В входной точке приложения подключите ```require_once __DIR__ . '/../vendor/autoload.php';```.

## Начало работы

1. Занесите в файл конфигурации ```config.json``` аутентификационные данные API.
```json
{
    "bearerToken": "YOUR_BEARER_TOKEN", 
    "signSecretKey": "YOUR_SIGN_SECRET_KEY", 
    "merchantUrl": "https://api.intellectmoney.ru/", 
    "throwExceptionOnError": true
}
```
+ ```bearerToken``` - Запрашивается и выдается в личном кабинете IntellectMoney.
+ ```signSecretKey``` - Секретный ключ запроса выдается вместе с ```bearerToken```.
+ ```throwExceptionOnError``` - Библиотека будет выбрасывать исключения в случае возникновения ошибки.

2. Подключите классы клиента в своем коде:
```php
use IntellectMoney\SDK\MerchantApiClient;
use IntellectMoney\SDK\Structs\Common\AuthData;
use IntellectMoney\SDK\Structs\Request\CreateInvoiceDataModel;
```
+ ```MerchantApiClient``` - Клиент API.
+ ```AuthData``` - Данные аутентификации в API.
+ ```CreateInvoiceDataModel``` - Данные запроса для создания СКО.

3. Создайте объект аутентификационных данных и передайте ему секретный ключ магазина.
Секретный ключ магазина устанавливается Вами в [личном кабинете IntellectMoney](https://lk.intellectmoney.ru/eshops).
```php 
$authData = new AuthData("your_eshop_secret_key");
```

4. Создайте объект запроса и передайте ему данные нового (или уже существующего) заказа:
```php
$dataModel = new CreateInvoiceDataModel([
    "eshopId" => "465932",
    "orderId" => "fdsfdsfsd",
    "recipientAmount" => new Money(10),
    "email" => "e.mozgovoy+1@intellectmoney.ru"
]);
```

5. Отправьте запрос в API и обработайте результат:
```php
$result = MerchantApiClient::createInvoice($dataModel, $authData);
```

# Полезные ссылки

+ [Merchant API: Быстрый старт](https://wiki.intellectmoney.ru/pages/viewpage.action?pageId=160333826)
+ [Документация Merchant API 2.0](https://wiki.intellectmoney.ru/display/TECH/Merchant+2.0+API)
+ [Личный кабинет IntellectMoney - Магазины](https://lk.intellectmoney.ru/eshops)
+ [Личный кабинет IntellectMoney - Запрос доступа к API](https://lk.intellectmoney.ru/profile/security/api)