<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\AudiobookBulkGetResponse\Audiobook;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AudiobookShape from \Spotted\Audiobooks\AudiobookBulkGetResponse\Audiobook
 *
 * @phpstan-type AudiobookBulkGetResponseShape = array{
 *   audiobooks: list<Audiobook|AudiobookShape>
 * }
 */
final class AudiobookBulkGetResponse implements BaseModel
{
    /** @use SdkModel<AudiobookBulkGetResponseShape> */
    use SdkModel;

    /** @var list<Audiobook> $audiobooks */
    #[Required(list: Audiobook::class)]
    public array $audiobooks;

    /**
     * `new AudiobookBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookBulkGetResponse::with(audiobooks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudiobookBulkGetResponse)->withAudiobooks(...)
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
     * @param list<Audiobook|AudiobookShape> $audiobooks
     */
    public static function with(array $audiobooks): self
    {
        $self = new self;

        $self['audiobooks'] = $audiobooks;

        return $self;
    }

    /**
     * @param list<Audiobook|AudiobookShape> $audiobooks
     */
    public function withAudiobooks(array $audiobooks): self
    {
        $self = clone $this;
        $self['audiobooks'] = $audiobooks;

        return $self;
    }
}
