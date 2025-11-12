<?php

namespace Spotted;

use Psr\Http\Message\ResponseInterface;
use Spotted\Core\Util;
use Spotted\Core\Conversion;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkPage;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Contracts\BasePage;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Conversion\Contracts\Converter;
use Spotted\Core\Conversion\Contracts\ConverterSource;

/**
  * @phpstan-type CursorURLPageShape = array{
  *   next?: string|null, items?: list<mixed>|null
  * }
  * @template TItem
  * @implements BasePage<TItem>
  * 
 */
final class CursorURLPage implements BaseModel, BasePage
{
  /** @use SdkModel<CursorURLPageShape> */
  use SdkModel;

  /** @use SdkPage<TItem> */
  use SdkPage;

  /** @var string|null $next */
  #[Api(optional: true)]
  public ?string $next;

  /** @var list<TItem>|null $items */
  #[Api(list: "mixed", optional: true)]
  public ?array $items;

  /** @return list<TItem> */
  function getItems(): array {
    // @phpstan-ignore-next-line
    return $this->offsetGet('items') ?? [];
  }

  /**
  * @internal
  * 
  * @return array{
  *   array{
  *     method: string,
  *     path: string,
  *     query: array<string,mixed>,
  *     headers: array<string,string|null|list<string>>,
  *     body: mixed,
  *   },
  *   RequestOptions,
  * }|null
 */
  function nextRequest(): ?array {
    $urlString = $this->next ?? null
    if (!$urlString) {
      return null;
    }

    $nextRequest = $this->request;

    return [$nextRequest, $this->options];
  }

  /**
  * @internal
  * 
  * @param string|Converter|ConverterSource $convert
  * @param Client $client
  * @param array{
  *   method: string,
  *   path: string,
  *   query: array<string,mixed>,
  *   headers: array<string,string|null|list<string>>,
  *   body: mixed,
  * } $request
  * @param RequestOptions $options
 */
  function __construct(
    private string|Converter|ConverterSource $convert,
    private Client $client,
    private array $request,
    private RequestOptions $options,
    ResponseInterface $response,
  ) {
    $this->initialize();

    $data = Util::decodeContent($response);

    if (!is_array($data)) {
      return;

    }

    // @phpstan-ignore-next-line
    self::__unserialize($data);

    if ($this->offsetExists('items')) {
      $acc = Conversion::coerce(
        new ListOf($convert), value: $this->offsetGet('items')
      );
      // @phpstan-ignore-next-line
      $this->offsetSet('items', $acc);

    }
  }
}