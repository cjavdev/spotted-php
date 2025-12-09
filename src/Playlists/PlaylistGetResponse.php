<?php

declare(strict_types=1);

namespace Spotted\Playlists;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Playlists\PlaylistGetResponse\Owner;
use Spotted\Playlists\PlaylistGetResponse\Tracks;
use Spotted\PlaylistTrackObject;
use Spotted\PlaylistUserObject\Type;

/**
 * @phpstan-type PlaylistGetResponseShape = array{
 *   id?: string|null,
 *   collaborative?: bool|null,
 *   description?: string|null,
 *   externalURLs?: ExternalURLObject|null,
 *   followers?: FollowersObject|null,
 *   href?: string|null,
 *   images?: list<ImageObject>|null,
 *   name?: string|null,
 *   owner?: Owner|null,
 *   published?: bool|null,
 *   snapshotID?: string|null,
 *   tracks?: Tracks|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class PlaylistGetResponse implements BaseModel
{
    /** @use SdkModel<PlaylistGetResponseShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    #[Optional]
    public ?string $id;

    /**
     * `true` if the owner allows other users to modify the playlist.
     */
    #[Optional]
    public ?bool $collaborative;

    /**
     * The playlist description. _Only returned for modified, verified playlists, otherwise_ `null`.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * Known external URLs for this playlist.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of the playlist.
     */
    #[Optional]
    public ?FollowersObject $followers;

    /**
     * A link to the Web API endpoint providing full details of the playlist.
     */
    #[Optional]
    public ?string $href;

    /**
     * Images for the playlist. The array may be empty or contain up to three images. The images are returned by size in descending order. See [Working with Playlists](/documentation/web-api/concepts/playlists). _**Note**: If returned, the source URL for the image (`url`) is temporary and will expire in less than a day._.
     *
     * @var list<ImageObject>|null $images
     */
    #[Optional(list: ImageObject::class)]
    public ?array $images;

    /**
     * The name of the playlist.
     */
    #[Optional]
    public ?string $name;

    /**
     * The user who owns the playlist.
     */
    #[Optional]
    public ?Owner $owner;

    /**
     * The playlist's public/private status (if it is added to the user's profile): `true` the playlist is public, `false` the playlist is private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The version identifier for the current playlist. Can be supplied in other requests to target a specific playlist version.
     */
    #[Optional('snapshot_id')]
    public ?string $snapshotID;

    /**
     * The tracks of the playlist.
     */
    #[Optional]
    public ?Tracks $tracks;

    /**
     * The object type: "playlist".
     */
    #[Optional]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    #[Optional]
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
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param Owner|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   displayName?: string|null,
     * } $owner
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<PlaylistTrackObject>|null,
     * } $tracks
     */
    public static function with(
        ?string $id = null,
        ?bool $collaborative = null,
        ?string $description = null,
        ExternalURLObject|array|null $externalURLs = null,
        FollowersObject|array|null $followers = null,
        ?string $href = null,
        ?array $images = null,
        ?string $name = null,
        Owner|array|null $owner = null,
        ?bool $published = null,
        ?string $snapshotID = null,
        Tracks|array|null $tracks = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $collaborative && $obj['collaborative'] = $collaborative;
        null !== $description && $obj['description'] = $description;
        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $followers && $obj['followers'] = $followers;
        null !== $href && $obj['href'] = $href;
        null !== $images && $obj['images'] = $images;
        null !== $name && $obj['name'] = $name;
        null !== $owner && $obj['owner'] = $owner;
        null !== $published && $obj['published'] = $published;
        null !== $snapshotID && $obj['snapshotID'] = $snapshotID;
        null !== $tracks && $obj['tracks'] = $tracks;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * `true` if the owner allows other users to modify the playlist.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $obj = clone $this;
        $obj['collaborative'] = $collaborative;

        return $obj;
    }

    /**
     * The playlist description. _Only returned for modified, verified playlists, otherwise_ `null`.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Known external URLs for this playlist.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $obj = clone $this;
        $obj['externalURLs'] = $externalURLs;

        return $obj;
    }

    /**
     * Information about the followers of the playlist.
     *
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     */
    public function withFollowers(FollowersObject|array $followers): self
    {
        $obj = clone $this;
        $obj['followers'] = $followers;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the playlist.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * Images for the playlist. The array may be empty or contain up to three images. The images are returned by size in descending order. See [Working with Playlists](/documentation/web-api/concepts/playlists). _**Note**: If returned, the source URL for the image (`url`) is temporary and will expire in less than a day._.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj['images'] = $images;

        return $obj;
    }

    /**
     * The name of the playlist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The user who owns the playlist.
     *
     * @param Owner|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   displayName?: string|null,
     * } $owner
     */
    public function withOwner(Owner|array $owner): self
    {
        $obj = clone $this;
        $obj['owner'] = $owner;

        return $obj;
    }

    /**
     * The playlist's public/private status (if it is added to the user's profile): `true` the playlist is public, `false` the playlist is private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $obj = clone $this;
        $obj['published'] = $published;

        return $obj;
    }

    /**
     * The version identifier for the current playlist. Can be supplied in other requests to target a specific playlist version.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj['snapshotID'] = $snapshotID;

        return $obj;
    }

    /**
     * The tracks of the playlist.
     *
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<PlaylistTrackObject>|null,
     * } $tracks
     */
    public function withTracks(Tracks|array $tracks): self
    {
        $obj = clone $this;
        $obj['tracks'] = $tracks;

        return $obj;
    }

    /**
     * The object type: "playlist".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
