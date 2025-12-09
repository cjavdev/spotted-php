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
 *   playedAt?: \DateTimeInterface|null,
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
    #[Optional('played_at')]
    public ?\DateTimeInterface $playedAt;

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
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $track
     */
    public static function with(
        ContextObject|array|null $context = null,
        ?\DateTimeInterface $playedAt = null,
        TrackObject|array|null $track = null,
    ): self {
        $obj = new self;

        null !== $context && $obj['context'] = $context;
        null !== $playedAt && $obj['playedAt'] = $playedAt;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    /**
     * The context the track was played from.
     *
     * @param ContextObject|array{
     *   externalURLs?: ExternalURLObject|null,
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
        $obj['playedAt'] = $playedAt;

        return $obj;
    }

    /**
     * The track the user listened to.
     *
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
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
