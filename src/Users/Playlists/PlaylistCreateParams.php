<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
  * Create a playlist for a Spotify user. (The playlist will be empty until
  * you [add tracks](/documentation/web-api/reference/add-tracks-to-playlist).)
  * Each user is generally limited to a maximum of 11000 playlists.
  * 
  * @see Spotted\Services\Users\PlaylistsService::create()
  * @phpstan-type PlaylistCreateParamsShape = array{
  *   name: string,
  *   dollar_paths________requestBody_content__application_json___schema_properties_published?: bool,
  *   collaborative?: bool,
  *   description?: string,
  * }
  * 
 */
final class PlaylistCreateParams implements BaseModel
{
  /** @use SdkModel<PlaylistCreateParamsShape> */
  use SdkModel;
  use SdkParams;

  /**
  * The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
  * 
  * 
  * @var string $name
 */
  #[Api]
  public string $name;

  /**
  * Defaults to `true`. The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private. To be able to create private playlists, the user must have granted the `playlist-modify-private` [scope](/documentation/web-api/concepts/scopes/#list-of-scopes). For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
  * 
  * 
  * @var bool|null $dollar_paths________requestBody_content__application_json___schema_properties_published
 */
  #[Api(
    '$.paths['*'].*.requestBody.content['application/json'].schema.properties.published',
    optional: true,
  )]
  public ?bool $dollar_paths________requestBody_content__application_json___schema_properties_published;

  /**
  * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._
  * 
  * 
  * @var bool|null $collaborative
 */
  #[Api(optional: true)]
  public ?bool $collaborative;

  /**
  * value for playlist description as displayed in Spotify Clients and in the Web API.
  * 
  * 
  * @var string|null $description
 */
  #[Api(optional: true)]
  public ?string $description;

  /**
  * `new PlaylistCreateParams()` is missing required properties by the API.
  * 
  * To enforce required parameters use
  * ```
  * PlaylistCreateParams::with(name: ...)
  * ```
  * 
  * Otherwise ensure the following setters are called
  * 
  * ```
  * (new PlaylistCreateParams)->withName(...)
  * ```
 */
  public function __construct() {$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param string $name
  * @param bool $dollar_paths________requestBody_content__application_json___schema_properties_published
  * @param bool $collaborative
  * @param string $description
  * 
  * @return self
 */
  public static function with(
    string $name,
    bool $dollar_paths________requestBody_content__application_json___schema_properties_published = null,
    bool $collaborative = null,
    string $description = null,
  ): self {
    $obj = new self;

    $obj->name = $name;

    null !== $dollar_paths________requestBody_content__application_json___schema_properties_published && $obj->dollar_paths________requestBody_content__application_json___schema_properties_published = $dollar_paths________requestBody_content__application_json___schema_properties_published;
    null !== $collaborative && $obj->collaborative = $collaborative;
    null !== $description && $obj->description = $description;

    return $obj;
  }

  /**
  * The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
  * 
  * 
  * @param string $name
  * 
  * @return self
 */
  public function withName(string $name): self {
    $obj = clone $this;
    $obj->name = $name;
    return $obj;
  }

  /**
  * Defaults to `true`. The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private. To be able to create private playlists, the user must have granted the `playlist-modify-private` [scope](/documentation/web-api/concepts/scopes/#list-of-scopes). For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
  * 
  * 
  * @param bool $pathsRequestBodyContentApplicationJsonSchemaPropertiesPublished
  * 
  * @return self
 */
  public function withPathsRequestBodyContentApplicationJsonSchemaPropertiesPublished(
    bool $pathsRequestBodyContentApplicationJsonSchemaPropertiesPublished
  ): self {
    $obj = clone $this;
    $obj->dollar_paths________requestBody_content__application_json___schema_properties_published = $pathsRequestBodyContentApplicationJsonSchemaPropertiesPublished;
    return $obj;
  }

  /**
  * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._
  * 
  * 
  * @param bool $collaborative
  * 
  * @return self
 */
  public function withCollaborative(bool $collaborative): self {
    $obj = clone $this;
    $obj->collaborative = $collaborative;
    return $obj;
  }

  /**
  * value for playlist description as displayed in Spotify Clients and in the Web API.
  * 
  * 
  * @param string $description
  * 
  * @return self
 */
  public function withDescription(string $description): self {
    $obj = clone $this;
    $obj->description = $description;
    return $obj;
  }
}