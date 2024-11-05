<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony\Parser;

use App\Product\Factory\ProductFactory;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final readonly class ProductFetcher
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ProductFactory $productFactory,
    ) {
    }

    public function fetchProducts(string $url): array
    {
        $products = [];

        try {
            $response = $this->httpClient->request('GET', $url);
            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                throw new \Exception("Помилка при отриманні сторінки $url: код статусу $statusCode");
            }

            $html = $response->getContent();
        } catch (\Exception $e) {
            throw new \Exception("Помилка при запиті до $url: " . $e->getMessage(), 0, $e);
        }

        $crawler = new Crawler($html);

        $crawler->filter('.product_pod')->each(function (Crawler $node) use (&$products) {
            try {
                $name = $node->filter('h3 a')->attr('title');
                $price = $node->filter('.price_color')->text();
                $imageLink = $node->filter('.image_container img')->attr('src');
                $productLink = $node->filter('h3 a')->attr('href');

                $price = floatval(preg_replace('/[^0-9.]/', '', $price));
                $imageLink = 'http://books.toscrape.com/' . ltrim($imageLink, '/');
                $productLink = 'http://books.toscrape.com/catalogue/' . ltrim($productLink, '/');

                $product = $this->productFactory->create($name, $price, $imageLink, $productLink);

                $products[] = $product;
            } catch (\Exception $e) {
                // Обробка помилки або логування
            }
        });

        return $products;
    }
}
