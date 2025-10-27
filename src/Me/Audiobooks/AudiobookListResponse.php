<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook;

/**
 * @phpstan-type audiobook_list_response = array{
 *   addedAt?: \DateTimeInterface, audiobook?: Audiobook
 * }
 */
final class AudiobookListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<audiobook_list_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Api('added_at', optional: true)]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the audiobook.
     */
    #[Api(optional: true)]
    public ?Audiobook $audiobook;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        ?Audiobook $audiobook = null
    ): self {
        $obj = new self;

        null !== $addedAt && $obj->addedAt = $addedAt;
        null !== $audiobook && $obj->audiobook = $audiobook;

        return $obj;
    }

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->addedAt = $addedAt;

        return $obj;
    }

    /**
     * Information about the audiobook.
     */
    public function withAudiobook(Audiobook $audiobook): self
    {
        $obj = clone $this;
        $obj->audiobook = $audiobook;

        return $obj;
    }
}
