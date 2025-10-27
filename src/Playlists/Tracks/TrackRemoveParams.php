<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Playlists\Tracks\TrackRemoveParams\Track;

/**
 * Remove one or more items from a user's playlist.
 *
 * @see Spotted\Playlists\Tracks->remove
 *
 * @phpstan-type track_remove_params = array{
 *   tracks: list<Track>, snapshotID?: string
 * }
 */
final class TrackRemoveParams implements BaseModel
{
    /** @use SdkModel<track_remove_params> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of objects containing [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) of the tracks or episodes to remove.
     * For example: `{ "tracks": [{ "uri": "spotify:track:4iV5W9uYEdYUVa79Axb7Rh" },{ "uri": "spotify:track:1301WleyT98MSxVHPZCA6M" }] }`. A maximum of 100 objects can be sent at once.
     *
     * @var list<Track> $tracks
     */
    #[Api(list: Track::class)]
    public array $tracks;

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     * The API will validate that the specified items exist and in the specified positions and make the changes,
     * even if more recent changes have been made to the playlist.
     */
    #[Api('snapshot_id', optional: true)]
    public ?string $snapshotID;

    /**
     * `new TrackRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackRemoveParams::with(tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackRemoveParams)->withTracks(...)
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
     * @param list<Track> $tracks
     */
    public static function with(array $tracks, ?string $snapshotID = null): self
    {
        $obj = new self;

        $obj->tracks = $tracks;

        null !== $snapshotID && $obj->snapshotID = $snapshotID;

        return $obj;
    }

    /**
     * An array of objects containing [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) of the tracks or episodes to remove.
     * For example: `{ "tracks": [{ "uri": "spotify:track:4iV5W9uYEdYUVa79Axb7Rh" },{ "uri": "spotify:track:1301WleyT98MSxVHPZCA6M" }] }`. A maximum of 100 objects can be sent at once.
     *
     * @param list<Track> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     * The API will validate that the specified items exist and in the specified positions and make the changes,
     * even if more recent changes have been made to the playlist.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj->snapshotID = $snapshotID;

        return $obj;
    }
}
