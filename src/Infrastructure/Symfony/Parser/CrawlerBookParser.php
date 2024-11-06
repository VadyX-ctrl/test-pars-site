<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony\Parser;

use App\Parser\HtmlFetcher;
use App\Parser\ParserInterface;
use App\Product\Factory\ProductFactory;
use App\Product\ProductCollection;
use Symfony\Component\DomCrawler\Crawler;

final readonly class CrawlerBookParser implements ParserInterface
{
    private const string MAIN_PAGE = 'http://books.toscrape.com';
    private const string PAGE_PATTERN = 'http://books.toscrape.com/catalogue/page-%d.html';
    private const string PRODUCT_LINK_PATTERN = 'http://books.toscrape.com/catalogue/%s';

    public function __construct(
        private HtmlFetcher $htmlFetcher,
        private ProductFactory $productFactory,
    ) {
    }

    public function fetchProducts(): ProductCollection
    {
        $pagesToParse = [self::MAIN_PAGE];
        for ($page = 2; $page <= 4; $page++) {
            $pagesToParse[] = sprintf(self::PAGE_PATTERN, $page);
        }

        $products = new ProductCollection([]);
        foreach ($pagesToParse as $page) {
            $products = $products->merge($this->parsePage($page));
        }

        return $products;
    }

    private function parsePage(string $url): ProductCollection
    {
        $products = [];

        try {
            $html = $this->htmlFetcher->fetchHtml($url);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $crawler = new Crawler($html);

        $crawler->filter('.product_pod')->each(function (Crawler $node) use (&$products) {
            try {
                $name = $node->filter('h3 a')->attr('title');
                $price = $node->filter('.price_color')->text();
                $imageLink = $node->filter('.image_container img')->attr('src');
                $productLink = $node->filter('h3 a')->attr('href');

                $price = (float)preg_replace('/[^0-9.]/', '', $price);
                $imageLink = \sprintf('%s/%s', self::MAIN_PAGE, \ltrim($imageLink, './'));
                $productLink = \sprintf(self::PRODUCT_LINK_PATTERN, $productLink);

                $product = $this->productFactory->create($name, $price, $imageLink, $productLink);

                $products[] = $product;
            } catch (\Exception $e) {
                // TODO add logging
            }
        });

        return new ProductCollection($products);
    }
}
