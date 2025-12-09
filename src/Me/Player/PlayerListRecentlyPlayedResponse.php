<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\LinkedTrackObject;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type PlayerListRecentlyPlayedResponseShape = array{
 *   context?: ContextObject|null,
 *   played_at?: \DateTimeInterface|null,
 *   track?: TrackObject|null,
 * }
 */
final class PlayerListRecentlyPlayedResponse implements BaseModel
{
    /** @use SdkModel<PlayerListRecentlyPlayedResponseShape> */
    use SdkModel;

    /**
     * The context the track was played from.
     */
    #[Optional]
    public ?ContextObject $context;

    /**
     * The date and time the track was played.
     */
    #[Optional]
    public ?\DateTimeInterface $played_at;

    /**
     * The track the user listened to.
     */
    #[Optional]
    public ?TrackObject $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ContextObject|array{
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $track
     */
    public static function with(
        ContextObject|array|null $context = null,
        ?\DateTimeInterface $played_at = null,
        TrackObject|array|null $track = null,
    ): self {
        $obj = new self;

        null !== $context && $obj['context'] = $context;
        null !== $played_at && $obj['played_at'] = $played_at;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    /**
     * The context the track was played from.
     *
     * @param ContextObject|array{
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     */
    public function withContext(ContextObject|array $context): self
    {
        $obj = clone $this;
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * The date and time the track was played.
     */
    public function withPlayedAt(\DateTimeInterface $playedAt): self
    {
        $obj = clone $this;
        $obj['played_at'] = $playedAt;

        return $obj;
    }

    /**
     * The track the user listened to.
     *
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $track
     */
    public function withTrack(TrackObject|array $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
