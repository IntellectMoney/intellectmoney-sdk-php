<?php 

namespace IntellectMoney\SDK\Structs\Common;

/**
 * Перечисление HTTP кодов.
 */
final class HttpCode extends BaseEnum
{
    /**
     * Continue.
     * @var int
     */
    public const Continue = 100;

    /**
     * Switching Protocols.
     * @var int
     */
    public const SwitchingProtocols = 101;

    /**
     * OK.
     * @var int
     */
    public const OK = 200;

    /**
     * Created.
     * @var int
     */
    public const Created = 201;

    /**
     * Accepted.
     * @var int
     */
    public const Accepted = 202;

    /**
     * Non-Authoritative Information.
     * @var int
     */
    public const NonAuthoritativeInformation = 203;

    /**
     * No Content.
     * @var int
     */
    public const NoContent = 204;

    /**
     * Reset Content.
     * @var int
     */
    public const ResetContent = 205;

    /**
     * Partial Content.
     * @var int
     */
    public const PartialContent = 206;

    /**
     * Multi-Status.
     * @var int
     */
    public const MultiStatus = 207;

    /**
     * Already Reported.
     * @var int
     */
    public const AlreadyReported = 208;

    /**
     * IM Used.
     * @var int
     */
    public const IMUsed = 226;

    /**
     * Multiple Choices.
     * @var int
     */
    public const MultipleChoices = 300;

    /**
     * Moved Permanently.
     * @var int
     */
    public const MovedPermanently = 301;

    /**
     * Found.
     * @var int
     */
    public const Found = 302;

    /**
     * See Other.
     * @var int
     */
    public const SeeOther = 303;

    /**
     * Not Modified.
     * @var int
     */
    public const NotModified = 304;

    /**
     * Use Proxy.
     * @var int
     */
    public const UseProxy = 305;

    /**
     * Switch Proxy.
     * @var int
     */
    public const SwitchProxy = 306;

    /**
     * Temporary Redirect.
     * @var int
     */
    public const TemporaryRedirect = 307;

    /**
     * Permanent Redirect.
     * @var int
     * 
     */
    public const PermanentRedirect = 308;

    /**
     * Bad Request.
     * @var int
     */
    public const BadRequest = 400;

    /**
     * Unauthorized.
     * @var int
     */
    public const Unauthorized = 401;

    /**
     * Payment Required.
     * @var int
     */
    public const PaymentRequired = 402;

    /**
     * Forbidden.
     * @var int
     */
    public const Forbidden = 403;

    /**
     * Not Found.
     * @var int
     */
    public const NotFound = 404;

    /**
     * Method Not Allowed.
     * @var int
     */
    public const MethodNotAllowed = 405;

    /**
     * Not Acceptable.
     * @var int
     */
    public const NotAcceptable = 406;

    /**
     * Proxy Authentication Required.
     * @var int
     */
    public const ProxyAuthenticationRequired = 407;

    /**
     * Request Timeout.
     * @var int
     */
    public const RequestTimeout = 408;

    /**
     * Conflict.
     * @var int
     */
    public const Conflict = 409;

    /**
     * Gone.
     * @var int
     */
    public const Gone = 410;

    /**
     * Length Required.
     * @var int
     */
    public const LengthRequired = 411;

    /**
     * Precondition Failed.
     * @var int
     */
    public const PreconditionFailed = 412;

    /**
     * Request Entity Too Large.
     * @var int
     */
    public const RequestEntityTooLarge = 413;

    /**
     * Request-URI Too Long.
     * @var int
     */
    public const RequestURITooLong = 414;

    /**
     * Unsupported Media Type.
     * @var int
     */
    public const UnsupportedMediaType = 415;

    /**
     * Requested Range Not Satisfiable.
     * @var int
     */
    public const RequestedRangeNotSatisfiable = 416;

    /**
     * Expectation Failed.
     * @var int
     */
    public const ExpectationFailed = 417;

    /**
     * I'm a teapot.
     * @var int
     */
    public const ImATeapot = 418;

    /**
     * Unprocessable Entity.
     * @var int
     */
    public const UnprocessableEntity = 422;

    /**
     * Locked.
     * @var int
     */
    public const Locked = 423;

    /**
     * Failed Dependency.
     * @var int
     */
    public const FailedDependency = 424;

    /**
     * Upgrade Required.
     * @var int
     */
    public const UpgradeRequired = 426;

    /**
     * Precondition Required.
     * @var int
     */
    public const PreconditionRequired = 428;

    /**
     * Too Many Requests.
     * @var int
     */
    public const TooManyRequests = 429;

    /**
     * Request Header Fields Too Large.
     * @var int
     */
    public const RequestHeaderFieldsTooLarge = 431;

    /**
     * Unavailable For Legal Reasons.
     * @var int
     */
    public const UnavailableForLegalReasons = 451;

    /**
     * Internal Server Error.
     * @var int
     */
    public const InternalServerError = 500;

    /**
     * Not Implemented.
     * @var int
     */
    public const NotImplemented = 501;

    /**
     * Bad Gateway.
     * @var int
     */
    public const BadGateway = 502;

    /**
     * Service Unavailable.
     * @var int
     */
    public const ServiceUnavailable = 503;

    /**
     * Gateway Timeout.
     * @var int
     */
    public const GatewayTimeout = 504;

    /**
     * HTTP Version Not Supported.
     * @var int
     */
    public const HttpVersionNotSupported = 505;

    /**
     * Variant Also Negotiates.
     * @var int
     */
    public const VariantAlsoNegotiates = 506;

    /**
     * Insufficient Storage.
     * @var int
     */
    public const InsufficientStorage = 507;

    /**
     * Loop Detected.
     * @var int
     */
    public const LoopDetected = 508;

    /**
     * Not Extended.
     * @var int
     */
    public const NotExtended = 510;

    /**
     * Network Authentication Required.
     * @var int
     */
    public const NetworkAuthenticationRequired = 511;

    protected static array $_values = [
        self::Continue => 'Continue',
        self::SwitchingProtocols => 'SwitchingProtocols',
        self::OK => 'OK',
        self::Created => 'Created',
        self::Accepted => 'Accepted',
        self::NonAuthoritativeInformation => 'NonAuthoritativeInformation',
        self::NoContent => 'NoContent',
        self::ResetContent => 'ResetContent',
        self::PartialContent => 'PartialContent',
        self::MultiStatus => 'MultiStatus',
        self::AlreadyReported => 'AlreadyReported',
        self::IMUsed => 'IMUsed',
        self::MultipleChoices => 'MultipleChoices',
        self::MovedPermanently => 'MovedPermanently',
        self::Found => 'Found',
        self::SeeOther => 'SeeOther',
        self::NotModified => 'NotModified',
        self::UseProxy => 'UseProxy',
        self::TemporaryRedirect => 'TemporaryRedirect',
        self::PermanentRedirect => 'PermanentRedirect',
        self::BadRequest => 'BadRequest',
        self::Unauthorized => 'Unauthorized',
        self::PaymentRequired => 'PaymentRequired',
        self::Forbidden => 'Forbidden',
        self::NotFound => 'Not Found',
        self::MethodNotAllowed => 'MethodNotAllowed',
        self::NotAcceptable => 'NotAcceptable',
        self::ProxyAuthenticationRequired => 'ProxyAuthenticationRequired', 
        self::RequestTimeout => 'RequestTimeout', 
        self::Conflict => 'Conflict', 
        self::Gone => 'Gone', 
        self::LengthRequired => 'LengthRequired',
        self::PreconditionFailed => 'PreconditionFailed', 
        self::RequestEntityTooLarge => 'RequestEntityTooLarge', 
        self::RequestURITooLong => 'RequestURITooLong', 
        self::UnsupportedMediaType => 'UnsupportedMediaType', 
        self::RequestedRangeNotSatisfiable => 'RequestedRangeNotSatisfiable', 
        self::ExpectationFailed => 'ExpectationFailed', 
        self::ImATeapot => 'ImATeapot', 
        self::UnprocessableEntity => 'UnprocessableEntity', 
        self::Locked => 'Locked', 
        self::FailedDependency => 'FailedDependency', 
        self::UpgradeRequired => 'UpgradeRequired', 
        self::PreconditionRequired => 'PreconditionRequired', 
        self::TooManyRequests => 'TooManyRequests', 
        self::RequestHeaderFieldsTooLarge => 'RequestHeaderFieldsTooLarge', 
        self::UnavailableForLegalReasons => 'UnavailableForLegalReasons', 
        self::InternalServerError => 'InternalServerError', 
        self::NotImplemented => 'NotImplemented', 
        self::BadGateway => 'BadGateway', 
        self::ServiceUnavailable => 'ServiceUnavailable', 
        self::GatewayTimeout => 'GatewayTimeout',
    ];
}