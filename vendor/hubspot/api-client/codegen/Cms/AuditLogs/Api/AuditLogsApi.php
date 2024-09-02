<?php
/**
 * AuditLogsApi
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Cms\AuditLogs
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Cms Content Audit
 *
 * Use this endpoint to query audit logs of CMS changes that occurred on your HubSpot account.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Cms\AuditLogs\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Cms\AuditLogs\ApiException;
use HubSpot\Client\Cms\AuditLogs\Configuration;
use HubSpot\Client\Cms\AuditLogs\HeaderSelector;
use HubSpot\Client\Cms\AuditLogs\ObjectSerializer;

/**
 * AuditLogsApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Cms\AuditLogs
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AuditLogsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getPage' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getPage
     *
     * Query audit logs
     *
     * @param  string[] $user_id Comma separated list of user ids to filter by. (optional)
     * @param  string[] $event_type Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED). (optional)
     * @param  string[] $object_type Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.) (optional)
     * @param  string[] $object_id Comma separated list of object ids to filter by. (optional)
     * @param  string $after Timestamp after which audit logs will be returned (optional)
     * @param  string $before Timestamp before which audit logs will be returned (optional)
     * @param  int $limit The number of logs to return. (optional)
     * @param  string[] $sort The sort direction for the audit logs. (Can only sort by timestamp). (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPage'] to see the possible values for this operation
     *
     * @throws \HubSpot\Client\Cms\AuditLogs\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog|\HubSpot\Client\Cms\AuditLogs\Model\Error
     */
    public function getPage($user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null, string $contentType = self::contentTypes['getPage'][0])
    {
        list($response) = $this->getPageWithHttpInfo($user_id, $event_type, $object_type, $object_id, $after, $before, $limit, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getPageWithHttpInfo
     *
     * Query audit logs
     *
     * @param  string[] $user_id Comma separated list of user ids to filter by. (optional)
     * @param  string[] $event_type Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED). (optional)
     * @param  string[] $object_type Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.) (optional)
     * @param  string[] $object_id Comma separated list of object ids to filter by. (optional)
     * @param  string $after Timestamp after which audit logs will be returned (optional)
     * @param  string $before Timestamp before which audit logs will be returned (optional)
     * @param  int $limit The number of logs to return. (optional)
     * @param  string[] $sort The sort direction for the audit logs. (Can only sort by timestamp). (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPage'] to see the possible values for this operation
     *
     * @throws \HubSpot\Client\Cms\AuditLogs\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog|\HubSpot\Client\Cms\AuditLogs\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPageWithHttpInfo($user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null, string $contentType = self::contentTypes['getPage'][0])
    {
        $request = $this->getPageRequest($user_id, $event_type, $object_type, $object_id, $after, $before, $limit, $sort, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Cms\AuditLogs\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\HubSpot\Client\Cms\AuditLogs\Model\Error' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\AuditLogs\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\AuditLogs\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPageAsync
     *
     * Query audit logs
     *
     * @param  string[] $user_id Comma separated list of user ids to filter by. (optional)
     * @param  string[] $event_type Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED). (optional)
     * @param  string[] $object_type Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.) (optional)
     * @param  string[] $object_id Comma separated list of object ids to filter by. (optional)
     * @param  string $after Timestamp after which audit logs will be returned (optional)
     * @param  string $before Timestamp before which audit logs will be returned (optional)
     * @param  int $limit The number of logs to return. (optional)
     * @param  string[] $sort The sort direction for the audit logs. (Can only sort by timestamp). (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsync($user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null, string $contentType = self::contentTypes['getPage'][0])
    {
        return $this->getPageAsyncWithHttpInfo($user_id, $event_type, $object_type, $object_id, $after, $before, $limit, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPageAsyncWithHttpInfo
     *
     * Query audit logs
     *
     * @param  string[] $user_id Comma separated list of user ids to filter by. (optional)
     * @param  string[] $event_type Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED). (optional)
     * @param  string[] $object_type Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.) (optional)
     * @param  string[] $object_id Comma separated list of object ids to filter by. (optional)
     * @param  string $after Timestamp after which audit logs will be returned (optional)
     * @param  string $before Timestamp before which audit logs will be returned (optional)
     * @param  int $limit The number of logs to return. (optional)
     * @param  string[] $sort The sort direction for the audit logs. (Can only sort by timestamp). (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsyncWithHttpInfo($user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null, string $contentType = self::contentTypes['getPage'][0])
    {
        $returnType = '\HubSpot\Client\Cms\AuditLogs\Model\CollectionResponsePublicAuditLog';
        $request = $this->getPageRequest($user_id, $event_type, $object_type, $object_id, $after, $before, $limit, $sort, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPage'
     *
     * @param  string[] $user_id Comma separated list of user ids to filter by. (optional)
     * @param  string[] $event_type Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED). (optional)
     * @param  string[] $object_type Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.) (optional)
     * @param  string[] $object_id Comma separated list of object ids to filter by. (optional)
     * @param  string $after Timestamp after which audit logs will be returned (optional)
     * @param  string $before Timestamp before which audit logs will be returned (optional)
     * @param  int $limit The number of logs to return. (optional)
     * @param  string[] $sort The sort direction for the audit logs. (Can only sort by timestamp). (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPageRequest($user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null, string $contentType = self::contentTypes['getPage'][0])
    {










        $resourcePath = '/cms/v3/audit-logs/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $user_id,
            'userId', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $event_type,
            'eventType', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_type,
            'objectType', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_id,
            'objectId', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $after,
            'after', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $before,
            'before', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sort,
            'sort', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', '*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
