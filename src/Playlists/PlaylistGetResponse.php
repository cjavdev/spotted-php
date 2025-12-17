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

/**
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type FollowersObjectShape from \Spotted\FollowersObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 * @phpstan-import-type OwnerShape from \Spotted\Playlists\PlaylistGetResponse\Owner
 * @phpstan-import-type TracksShape from \Spotted\Playlists\PlaylistGetResponse\Tracks
 *
 * @phpstan-type PlaylistGetResponseShape = array{
 *   id?: string|null,
 *   collaborative?: bool|null,
 *   description?: string|null,
 *   externalURLs?: null|ExternalURLObject|ExternalURLObjectShape,
 *   followers?: null|FollowersObject|FollowersObjectShape,
 *   href?: string|null,
 *   images?: list<ImageObjectShape>|null,
 *   name?: string|null,
 *   owner?: null|Owner|OwnerShape,
 *   published?: bool|null,
 *   snapshotID?: string|null,
 *   tracks?: null|Tracks|TracksShape,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
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
     * @param ExternalURLObjectShape $externalURLs
     * @param FollowersObjectShape $followers
     * @param list<ImageObjectShape> $images
     * @param OwnerShape $owner
     * @param TracksShape $tracks
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
        null !== $published && $self['published'] = $published;
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
     * @param ExternalURLObjectShape $externalURLs
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
     * @param FollowersObjectShape $followers
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
     * @param list<ImageObjectShape> $images
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
     * @param OwnerShape $owner
     */
    public function withOwner(Owner|array $owner): self
    {
        $self = clone $this;
        $self['owner'] = $owner;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

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
     * @param TracksShape $tracks
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
