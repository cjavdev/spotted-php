<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ShowBase;

/**
 * @phpstan-type ShowListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null, show?: ShowBase|null
 * }
 */
final class ShowListResponse implements BaseModel
{
    /** @use SdkModel<ShowListResponseShape> */
    use SdkModel;

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the show.
     */
    #[Optional]
    public ?ShowBase $show;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ShowBase|array{
     *   id: string,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   publisher: string,
     *   totalEpisodes: int,
     *   type?: 'show',
     *   uri: string,
     * } $show
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        ShowBase|array|null $show = null
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $show && $self['show'] = $show;

        return $self;
    }

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * Information about the show.
     *
     * @param ShowBase|array{
     *   id: string,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   publisher: string,
     *   totalEpisodes: int,
     *   type?: 'show',
     *   uri: string,
     * } $show
     */
    public function withShow(ShowBase|array $show): self
    {
        $self = clone $this;
        $self['show'] = $show;

        return $self;
    }
}
