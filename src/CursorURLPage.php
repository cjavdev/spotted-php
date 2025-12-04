<?php

namespace Spotted;

use Psr\Http\Message\ResponseInterface;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkPage;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Contracts\BasePage;
use Spotted\Core\Conversion;
use Spotted\Core\Conversion\Contracts\Converter;
use Spotted\Core\Conversion\Contracts\ConverterSource;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Util;

/**
 * @phpstan-type CursorURLPageShape = array{
 *   next?: string|null, items?: list<mixed>|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class CursorURLPage implements BaseModel, BasePage
{
    /** @use SdkModel<CursorURLPageShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    #[Api(optional: true)]
    public ?string $next;

    /** @var list<TItem>|null $items */
    #[Api(list: 'mixed', optional: true)]
    public ?array $items;

    /**
     * @internal
     *
     * @param array{
     *   method: string,
     *   path: string,
     *   query: array<string,mixed>,
     *   headers: array<string,string|list<string>|null>,
     *   body: mixed,
     * } $request
     */
    public function __construct(
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

        // @phpstan-ignore-next-line argument.type
        self::__unserialize($data);

        if ($this->offsetGet('items')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('items')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('items', $acc);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
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
     *     headers: array<string,string|list<string>|null>,
     *     body: mixed,
     *   },
     *   RequestOptions,
     * }|null
     */
    public function nextRequest(): ?array
    {
        if (!count($this->getItems()) || !($url = $this->next ?? null)) {
            return null;
        }

        $nextRequest = array_merge_recursive($this->request, ['path' => $url]);

        // @phpstan-ignore-next-line return.type
        return [$nextRequest, $this->options];
    }
}
