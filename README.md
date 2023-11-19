---

**OpenAI Context** for Laravel is a community-maintained library that allows you to ask question using a context. This library also allow you to ask question without a context, but keep in mind that gpt 3.5 using old data (2021 or lower) so when using a context from url, you can ask anything with that

> **Note:** This repository contains the integration code of the **OpenAI PHP for Laravel** for Laravel(https://github.com/openai-php/laravel).

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First, install OpenAI Context via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require renannazar/laravel-openai-context
```

Next, publish the configuration file:

```bash
php artisan vendor:publish --provider="OpenAI\Laravel\ServiceProvider"
```

This will create a `config/openai.php` configuration file in your project, which you can modify to your needs
using environment variables:

```env
OPENAI_API_KEY=sk-...
```

You can get OpenAi Api Key (https://platform.openai.com/api-keys)

Finally, you may use the `OpenAI` facade to access the OpenAI API:

```php
use Renannazar\LaravelOpenaiContext\Facades\OpenaiContext;

$url = "https://newsorarticle.com";
$question = "ask anything about that url";

$result = OpenaiContext::askContextByUrl($url, $question);
//$result = OpenaiContext::askContextByText($text, $question); -> for text only without url

return $result['content']; // array
```

## Configuration

Configuration is done via environment variables or directly in the configuration file (`config/openai.php`).

### OpenAI API Key and Organization

Specify your OpenAI API Key and organization. This will be
used to authenticate with the OpenAI API - you can find your API key
and organization on your OpenAI dashboard, at https://openai.com.

```env
OPENAI_API_KEY=
OPENAI_ORGANIZATION=
```

### Request Timeout

The timeout may be used to specify the maximum number of seconds to wait
for a response. By default, the client will time out after 30 seconds.

```env
OPENAI_REQUEST_TIMEOUT=
```

OpenAI Context for Laravel is an open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.
