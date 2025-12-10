<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\PlaylistTrackObject;
use Spotted\PlaylistUserObject\Type;
use Spotted\Users\Playlists\PlaylistNewResponse\Owner;
use Spotted\Users\Playlists\PlaylistNewResponse\Tracks;

/**
 * @phpstan-type PlaylistNewResponseShape = array{
 *   id?: string|null,
 *   collaborative?: bool|null,
 *   description?: string|null,
 *   externalURLs?: ExternalURLObject|null,
 *   followers?: FollowersObject|null,
 *   href?: string|null,
 *   images?: list<ImageObject>|null,
 *   name?: string|null,
 *   owner?: Owner|null,
 *   snapshotID?: string|null,
 *   tracks?: Tracks|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class PlaylistNewResponse implements BaseModel
{
    /** @use SdkModel<PlaylistNewResponseShape> */
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
        ?string $snapshotID = null,
        Tracks|array|null $tracks = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $collaborative && $self['collaborative'] = $collaborative;
        null !== $description && $self['description'] = $description;
        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $followers && $self['followers'] = $followers;
        null !== $href && $self['href'] = $href;
        null !== $images && $self['images'] = $images;
        null !== $name && $self['name'] = $name;
        null !== $owner && $self['owner'] = $owner;
        null !== $snapshotID && $self['snapshotID'] = $snapshotID;
        null !== $tracks && $self['tracks'] = $tracks;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * `true` if the owner allows other users to modify the playlist.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $self = clone $this;
        $self['collaborative'] = $collaborative;

        return $self;
    }

    /**
     * The playlist description. _Only returned for modified, verified playlists, otherwise_ `null`.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Known external URLs for this playlist.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * Information about the followers of the playlist.
     *
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     */
    public function withFollowers(FollowersObject|array $followers): self
    {
        $self = clone $this;
        $self['followers'] = $followers;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the playlist.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
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
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * The name of the playlist.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
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
        $self = clone $this;
        $self['owner'] = $owner;

        return $self;
    }

    /**
     * The version identifier for the current playlist. Can be supplied in other requests to target a specific playlist version.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $self = clone $this;
        $self['snapshotID'] = $snapshotID;

        return $self;
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
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * The object type: "playlist".
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the playlist.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
