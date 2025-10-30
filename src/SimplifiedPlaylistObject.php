<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedPlaylistObject\Owner;

/**
 * @phpstan-type SimplifiedPlaylistObjectShape = array{
 *   id?: string,
 *   collaborative?: bool,
 *   description?: string,
 *   externalURLs?: ExternalURLObject,
 *   href?: string,
 *   images?: list<ImageObject>,
 *   name?: string,
 *   owner?: Owner,
 *   public?: bool,
 *   snapshotID?: string,
 *   tracks?: PlaylistTracksRefObject,
 *   type?: string,
 *   uri?: string,
 * }
 */
final class SimplifiedPlaylistObject implements BaseModel
{
    /** @use SdkModel<SimplifiedPlaylistObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * `true` if the owner allows other users to modify the playlist.
     */
    #[Api(optional: true)]
    public ?bool $collaborative;

    /**
     * The playlist description. _Only returned for modified, verified playlists, otherwise_ `null`.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Known external URLs for this playlist.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the playlist.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * Images for the playlist. The array may be empty or contain up to three images. The images are returned by size in descending order. See [Working with Playlists](/documentation/web-api/concepts/playlists). _**Note**: If returned, the source URL for the image (`url`) is temporary and will expire in less than a day._.
     *
     * @var list<ImageObject>|null $images
     */
    #[Api(list: ImageObject::class, optional: true)]
    public ?array $images;

    /**
     * The name of the playlist.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The user who owns the playlist.
     */
    #[Api(optional: true)]
    public ?Owner $owner;

    /**
     * The playlist's public/private status (if it is added to the user's profile): `true` the playlist is public, `false` the playlist is private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Api(optional: true)]
    public ?bool $public;

    /**
     * The version identifier for the current playlist. Can be supplied in other requests to target a specific playlist version.
     */
    #[Api('snapshot_id', optional: true)]
    public ?string $snapshotID;

    /**
     * A collection containing a link ( `href` ) to the Web API endpoint where full details of the playlist's tracks can be retrieved, along with the `total` number of tracks in the playlist. Note, a track object may be `null`. This can happen if a track is no longer available.
     */
    #[Api(optional: true)]
    public ?PlaylistTracksRefObject $tracks;

    /**
     * The object type: "playlist".
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    #[Api(optional: true)]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ImageObject> $images
     */
    public static function with(
        ?string $id = null,
        ?bool $collaborative = null,
        ?string $description = null,
        ?ExternalURLObject $externalURLs = null,
        ?string $href = null,
        ?array $images = null,
        ?string $name = null,
        ?Owner $owner = null,
        ?bool $public = null,
        ?string $snapshotID = null,
        ?PlaylistTracksRefObject $tracks = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $collaborative && $obj->collaborative = $collaborative;
        null !== $description && $obj->description = $description;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $href && $obj->href = $href;
        null !== $images && $obj->images = $images;
        null !== $name && $obj->name = $name;
        null !== $owner && $obj->owner = $owner;
        null !== $public && $obj->public = $public;
        null !== $snapshotID && $obj->snapshotID = $snapshotID;
        null !== $tracks && $obj->tracks = $tracks;
        null !== $type && $obj->type = $type;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * `true` if the owner allows other users to modify the playlist.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $obj = clone $this;
        $obj->collaborative = $collaborative;

        return $obj;
    }

    /**
     * The playlist description. _Only returned for modified, verified playlists, otherwise_ `null`.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Known external URLs for this playlist.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->externalURLs = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the playlist.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * Images for the playlist. The array may be empty or contain up to three images. The images are returned by size in descending order. See [Working with Playlists](/documentation/web-api/concepts/playlists). _**Note**: If returned, the source URL for the image (`url`) is temporary and will expire in less than a day._.
     *
     * @param list<ImageObject> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj->images = $images;

        return $obj;
    }

    /**
     * The name of the playlist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The user who owns the playlist.
     */
    public function withOwner(Owner $owner): self
    {
        $obj = clone $this;
        $obj->owner = $owner;

        return $obj;
    }

    /**
     * The playlist's public/private status (if it is added to the user's profile): `true` the playlist is public, `false` the playlist is private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublic(bool $public): self
    {
        $obj = clone $this;
        $obj->public = $public;

        return $obj;
    }

    /**
     * The version identifier for the current playlist. Can be supplied in other requests to target a specific playlist version.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj->snapshotID = $snapshotID;

        return $obj;
    }

    /**
     * A collection containing a link ( `href` ) to the Web API endpoint where full details of the playlist's tracks can be retrieved, along with the `total` number of tracks in the playlist. Note, a track object may be `null`. This can happen if a track is no longer available.
     */
    public function withTracks(PlaylistTracksRefObject $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }

    /**
     * The object type: "playlist".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
