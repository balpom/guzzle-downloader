<?php

declare(strict_types=1);

namespace Balpom\GuzzleDownloader;

use Balpom\UniversalDownloader\PSR18DownloadInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Balpom\UniversalDownloader\Factory\Psr17Factories;
use Balpom\UniversalDownloader\Downloader as PSR18Downloader;
use Balpom\UniversalDownloader\DownloadInterface;
use Balpom\UniversalDownloader\HttpDownloadInterface;
use Balpom\UniversalDownloader\HttpDownloadResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Downloader implements PSR18DownloadInterface
{

    private PSR18Downloader $downloader;
    private Client $client;

    public function __construct(Client|null $client = null)
    {
        if (null === $client) {
            $client = new Client();
        }
        $this->setClient($client);
        $factory = new HttpFactory();
        $factories = new Psr17Factories($factory, $factory, $factory, $factory);
        $this->downloader = new PSR18Downloader($client, $factories);
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    protected function downloader(): PSR18Downloader
    {
        return $this->downloader;
    }

    public function attempts(int $attempts): DownloadInterface
    {
        return $this->downloader->attempts($attempts);
    }

    public function pause(int $seconds): DownloadInterface
    {
        return $this->downloader->pause($seconds);
    }

    public function get(string $uri): DownloadInterface
    {
        return $this->downloader->get($uri);
    }

    public function head(string $uri): HttpDownloadInterface
    {
        return $this->downloader->head($uri);
    }

    public function post(string $uri, array $data = []): HttpDownloadInterface
    {
        return $this->downloader->post($uri, $data);
    }

    public function result(): HttpDownloadResultInterface
    {
        return $this->downloader->result();
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->downloader->sendRequest($request);
    }
}
