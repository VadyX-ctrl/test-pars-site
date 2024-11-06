<?php

declare(strict_types=1);

namespace App\Parser;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final readonly class HtmlFetcher
{
    public function __construct(
        private HttpClientInterface $httpClient,
    ) {
    }

    public function fetchHtml(string $url): string
    {
        try {
            $response = $this->httpClient->request('GET', $url);
        } catch (\Exception $e) {
            throw new \Exception(\sprintf('Error when request to url %s', $url));
        }
        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new \Exception(\sprintf('Error when fetch html from url: %s, status code: %s', $url, $statusCode));
        }

        return $response->getContent();
    }
}