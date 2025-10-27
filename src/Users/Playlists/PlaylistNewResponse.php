<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Users\Playlists\PlaylistNewResponse\Owner;
use Spotted\Users\Playlists\PlaylistNewResponse\Tracks;

/**
 * @phpstan-type playlist_new_response = array{
 *   id?: string,
 *   collaborative?: bool,
 *   description?: string|null,
 *   externalURLs?: ExternalURLObject,
 *   followers?: FollowersObject,
 *   href?: string,
 *   images?: list<ImageObject>,
 *   name?: string,
 *   owner?: Owner,
 *   public?: bool,
 *   snapshotID?: string,
 *   tracks?: Tracks,
 *   type?: string,
 *   uri?: string,
 * }
 */
final class PlaylistNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<playlist_new_response> */
    use SdkModel;

    use SdkResponse;

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
    #[Api(nullable: true, optional: true)]
    public ?string $description;

    /**
     * Known external URLs for this playlist.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of the playlist.
     */
    #[Api(optional: true)]
    public ?FollowersObject $followers;

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
     * The tracks of the playlist.
     */
    #[Api(optional: true)]
    public ?Tracks $tracks;

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
        ?FollowersObject $followers = null,
        ?string $href = null,
        ?array $images = null,
        ?string $name = null,
        ?Owner $owner = null,
        ?bool $public = null,
        ?string $snapshotID = null,
        ?Tracks $tracks = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $collaborative && $obj->collaborative = $collaborative;
        null !== $description && $obj->description = $description;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $followers && $obj->followers = $followers;
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
    public function withDescription(?string $description): self
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
     * Information about the followers of the playlist.
     */
    public function withFollowers(FollowersObject $followers): self
    {
        $obj = clone $this;
        $obj->followers = $followers;

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
     * The tracks of the playlist.
     */
    public function withTracks(Tracks $tracks): self
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
