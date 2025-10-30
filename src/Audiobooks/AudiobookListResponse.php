<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\AudiobookListResponse\Audiobook;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AudiobookListResponseShape = array{audiobooks: list<Audiobook>}
 */
final class AudiobookListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudiobookListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Audiobook> $audiobooks */
    #[Api(list: Audiobook::class)]
    public array $audiobooks;

    /**
     * `new AudiobookListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookListResponse::with(audiobooks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudiobookListResponse)->withAudiobooks(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Audiobook> $audiobooks
     */
    public static function with(array $audiobooks): self
    {
        $obj = new self;

        $obj->audiobooks = $audiobooks;

        return $obj;
    }

    /**
     * @param list<Audiobook> $audiobooks
     */
    public function withAudiobooks(array $audiobooks): self
    {
        $obj = clone $this;
        $obj->audiobooks = $audiobooks;

        return $obj;
    }
}
