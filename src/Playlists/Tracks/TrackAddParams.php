<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Add one or more items to a user's playlist.
 *
 * @see Spotted\Services\Playlists\TracksService::add()
 *
 * @phpstan-type TrackAddParamsShape = array{position?: int, uris?: list<string>}
 */
final class TrackAddParams implements BaseModel
{
    /** @use SdkModel<TrackAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The position to insert the items, a zero-based index. For example, to insert the items in the first position: `position=0` ; to insert the items in the third position: `position=2`. If omitted, the items will be appended to the playlist. Items are added in the order they appear in the uris array. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M"], "position": 3}`.
     */
    #[Optional]
    public ?int $position;

    /**
     * A JSON array of the [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) to add. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M", "spotify:episode:512ojhOuo1ktJprKbVcKyQ"]}`<br/>A maximum of 100 items can be added in one request. _**Note**: if the `uris` parameter is present in the query string, any URIs listed here in the body will be ignored._.
     *
     * @var list<string>|null $uris
     */
    #[Optional(list: 'string')]
    public ?array $uris;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $uris
     */
    public static function with(?int $position = null, ?array $uris = null): self
    {
        $self = new self;

        null !== $position && $self['position'] = $position;
        null !== $uris && $self['uris'] = $uris;

        return $self;
    }

    /**
     * The position to insert the items, a zero-based index. For example, to insert the items in the first position: `position=0` ; to insert the items in the third position: `position=2`. If omitted, the items will be appended to the playlist. Items are added in the order they appear in the uris array. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M"], "position": 3}`.
     */
    public function withPosition(int $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }

    /**
     * A JSON array of the [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) to add. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M", "spotify:episode:512ojhOuo1ktJprKbVcKyQ"]}`<br/>A maximum of 100 items can be added in one request. _**Note**: if the `uris` parameter is present in the query string, any URIs listed here in the body will be ignored._.
     *
     * @param list<string> $uris
     */
    public function withUris(array $uris): self
    {
        $self = clone $this;
        $self['uris'] = $uris;

        return $self;
    }
}
