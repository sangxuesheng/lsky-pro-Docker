<?php

namespace Overtrue\CosClient;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Overtrue\CosClient\Exceptions\InvalidArgumentException;
use Overtrue\CosClient\Exceptions\InvalidConfigException;
use Overtrue\CosClient\Support\XML;

class ObjectClient extends Client
{
    public ?string $baseUri = null;

    /**
     * @throws \Overtrue\CosClient\Exceptions\InvalidConfigException
     */
    public function __construct(array|Config $config)
    {
        if (!($config instanceof Config)) {
            $config = new Config($config);
        }

        if (!$config->has('bucket')) {
            throw new InvalidConfigException('No bucket configured.');
        }

        $schema = $config->get('use_https', true) ? 'https' : 'http';
        $host = $config->get('domain', \sprintf(
            '%s-%s.cos.%s.myqcloud.com',
            $config->get('bucket'),
            $config->get('app_id'),
            $config->get('region', self::DEFAULT_REGION)
        ));

        $this->baseUri = \sprintf('%s://%s/', $schema, rtrim($host, '/'));

        parent::__construct($config->extend([
            'guzzle' => [
                'base_uri' => $this->baseUri,
            ],
        ]));
    }

    public function putObject(string $key, string $body, array $headers = []): Http\Response
    {
        return $this->put(\urlencode($key), \compact('body', 'headers'));
    }

    /**
     * @throws \Overtrue\CosClient\Exceptions\InvalidArgumentException
     */
    public function copyObject(string $key, array $headers): Http\Response
    {
        if (empty($headers['x-cos-copy-source'])) {
            throw new InvalidArgumentException('Missing required header: x-cos-copy-source');
        }

        if (($headers['x-cos-metadata-directive'] ?? 'Copy') === 'Replaced' && empty($headers['Content-Type'])) {
            throw new InvalidArgumentException('Missing required header: Content-Type');
        }

        return $this->put(\urlencode($key), array_filter(\compact('headers')));
    }

    /**
     * @see https://docs.guzzlephp.org/en/stable/request-options.html#multipart
     */
    public function postObject(array $multipart): Http\Response
    {
        return $this->post('/', \compact('multipart'));
    }

    public function getObject(string $key, array $query = [], array $headers = []): Http\Response
    {
        return $this->get(\urlencode($key), \compact('query', 'headers'));
    }

    public function headObject(string $key, string $versionId = null, array $headers = []): Http\Response
    {
        return $this->head(\urlencode($key), [
            'query' => \compact('versionId'),
            'headers' => $headers,
        ]);
    }

    public function deleteObject(string $key, string $versionId = null): Http\Response
    {
        return $this->delete(\urlencode($key), [
            'query' => \compact('versionId'),
        ]);
    }

    public function deleteObjects(array $body): Http\Response
    {
        return $this->post('/?delete', ['body' => XML::fromArray($body)]);
    }

    public function optionsObject(string $key): Http\Response
    {
        return $this->options(\urlencode($key));
    }

    public function restoreObject(string $key, array $body, string $versionId = null): Http\Response
    {
        return $this->post(\urlencode($key), [
            'query' => [
                'restore' => '',
                'versionId' => $versionId,
            ],
            'body' => XML::fromArray($body),
        ]);
    }

    public function selectObjectContents(string $key, array $body): Http\Response
    {
        return $this->post(\urlencode($key), [
            'query' => [
                'select' => '',
                'select-type' => 2,
            ],
            'body' => XML::fromArray($body),
        ]);
    }

    public function putObjectACL(string $key, array $body, array $headers = []): Http\Response
    {
        return $this->put(\urlencode($key), [
            'query' => [
                'acl' => '',
            ],
            'body' => XML::fromArray($body),
            'headers' => $headers,
        ]);
    }

    public function getObjectACL(string $key): Http\Response
    {
        return $this->get(\urlencode($key), [
            'query' => [
                'acl' => '',
            ],
        ]);
    }

    public function putObjectTagging(string $key, array $body, string $versionId = null): Http\Response
    {
        return $this->put(\urlencode($key), [
            'query' => [
                'tagging' => '',
                'VersionId' => $versionId,
            ],
            'body' => XML::fromArray($body),
        ]);
    }

    public function getObjectTagging(string $key, string $versionId = null): Http\Response
    {
        return $this->get(\urlencode($key), [
            'query' => [
                'tagging' => '',
                'VersionId' => $versionId,
            ],
        ]);
    }

    public function deleteObjectTagging(string $key, string $versionId = null): Http\Response
    {
        return $this->delete(\urlencode($key), [
            'query' => [
                'tagging' => '',
                'VersionId' => $versionId,
            ],
        ]);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function createUploadId(string $key, array $headers): Http\Response
    {
        if (empty($headers['Content-Type'])) {
            throw new InvalidArgumentException('Missing required headers: Content-Type');
        }

        return $this->post(\urlencode($key), [
            'query' => [
                'uploads' => '',
            ],
            'headers' => $headers,
        ]);
    }

    public function uploadPart(string $key, int $partNumber, string $uploadId, string $body, array $headers = []): Http\Response
    {
        return $this->putPart(...\func_get_args());
    }

    public function putPart(string $key, int $partNumber, string $uploadId, string $body, array $headers = []): Http\Response
    {
        return $this->put(\urlencode($key), [
            'query' => \compact('partNumber', 'uploadId'),
            'headers' => $headers,
            'body' => $body,
        ]);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function copyPart(string $key, int $partNumber, string $uploadId, array $headers = []): Http\Response
    {
        if (empty($headers['x-cos-copy-source'])) {
            throw new InvalidArgumentException('Missing required header: x-cos-copy-source');
        }

        return $this->put(\urlencode($key), [
            'query' => \compact('partNumber', 'uploadId'),
            'headers' => $headers,
        ]);
    }

    public function markUploadAsCompleted(string $key, string $uploadId, array $body): Http\Response
    {
        return $this->post(\urlencode($key), [
            'query' => [
                'uploadId' => $uploadId,
            ],
            'body' => XML::fromArray($body),
        ]);
    }

    public function markUploadAsAborted(string $key, string $uploadId): Http\Response
    {
        return $this->delete(\urlencode($key), [
            'query' => [
                'uploadId' => $uploadId,
            ],
        ]);
    }

    public function getUploadJobs(array $query = []): Http\Response
    {
        return $this->get('/?uploads', \compact('query'));
    }

    public function getUploadedParts(string $key, string $uploadId, array $query = []): Http\Response
    {
        $query['uploadId'] = $uploadId;

        return $this->get(\urlencode($key), compact('query'));
    }

    public function getObjectUrl(string $key): string
    {
        return \sprintf('%s/%s', \rtrim($this->baseUri, '/'), \ltrim($key, '/'));
    }

    public function getObjectSignedUrl(string $key, ?string $expires = '+60 minutes'): string
    {
        $objectUrl = $this->getObjectUrl($key);
        $signature = new Signature($this->config['secret_id'], $this->config['secret_key']);
        $request = new Request('GET', $objectUrl);

        return \strval((new Uri($objectUrl))->withQuery(\http_build_query(['sign' => $signature->createAuthorizationHeader($request, $expires)])));
    }
}
