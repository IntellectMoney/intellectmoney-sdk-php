<?php 

namespace IntellectMoney\SDK\Structs\Common;

final class ApiRequest
{
    /**
     * Данные, которые будут отправлены в API.
     * @var array
     */
    private array $_data;

    /**
     * Заголовки, которые будут отправлены в API при запросе.
     * @var array
     */
    private array $_headers;

    /**
     * Ссылка для запроса.
     * @var string
     */
    private string $_url;

    /**
     * HTTP метод запроса.
     * @var string
     */
    private string $_method;

    /**
     * Ссылка для запроса.
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * HTTP метод запроса.
     * @return string
     */
    public function getMethod(): string
    {
        return $this->_method;
    }

    /**
     * Данные, которые будут отправлены в API.
     * @return array
     */
    public function getData(): array
    {
        return $this->_data;
    }

    /**
     * Заголовки, которые будут отправлены в API при запросе.
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->_headers;
    }

    public function __construct(string $url, array $data = [])
    {
        $this->_url = $url;
        $this->_method = 'POST';
        $this->_data = $data;
        $this->_headers = [];

        $this->setHeader('Content-Type', 'application/json');
        $this->setHeader('Accept', 'application/json');
    }

    public function setHeader(string $header, $value)
    {
        $this->_headers[$header] = $value;
    }
}