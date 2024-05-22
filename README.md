# guzzle-downloader
## Simple realisation of Balpom\UniversalDownloader\PSR18DownloadInterface based on Guzzle PHP HTTP client.

This downloader is a simple realisation of PSR18DownloadInterface from [balpom/universal-downloader](https://github.com/balpom/universal-downloader),  based on Guzzle PHP HTTP client ([guzzle/guzzle](https://github.com/guzzle/guzzle); see more information on [https://guzzlephp.org](https://guzzlephp.org/)).

### Requirements 
- **PHP >= 8.1**

### Installation
#### Using composer (recommended)
```bash
composer require balpom/guzzle-downloader
```

### Guzzle downloader usage sample

```php
$downloader = new \Balpom\GuzzleDownloader\Downloader();
$downloader = $downloader->get('https://ipmy.ru/ip');
$result = $downloader->result();
echo $result ->code() . PHP_EOL; // Must be 200.
echo $result ->content() . PHP_EOL; // Must be your IP.
echo $result ->mime() . PHP_EOL; // Must be "text/html".
```

Method "response()" return PSR7 Response (Psr\Http\Message\RequestInterface: [https://www.php-fig.org/psr/psr-7/](https://www.php-fig.org/psr/psr-7/)).
```php
print_r($result->response());
```

### Opportunities for extension
Protected method "downloader()" return Balpom\UniversalDownloader\Downloader, which created into constructor of Downloader.php.
And protected method client() return GuzzleHttp\Client (which also created into constructor of Downloader.php).

### License
MIT License See [LICENSE.MD](LICENSE.MD)
