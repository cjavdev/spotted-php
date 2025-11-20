<?php

declare(strict_types=1);

namespace Spotted\Playlists\Followers;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
  * Add the current user as a follower of a playlist.
  * 
  * @see Spotted\Services\Playlists\FollowersService::follow()
  * @phpstan-type FollowerFollowParamsShape = array{
  *   dollar_paths________requestBody_content__application_json___schema_properties_published?: bool,
  * }
  * 
 */
final class FollowerFollowParams implements BaseModel
{
  /** @use SdkModel<FollowerFollowParamsShape> */
  use SdkModel;
  use SdkParams;

  /**
  * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
  * 
  * 
  * @var bool|null $dollar_paths________requestBody_content__application_json___schema_properties_published
 */
  #[Api(
    '$.paths['*'].*.requestBody.content['application/json'].schema.properties.published',
    optional: true,
  )]
  public ?bool $dollar_paths________requestBody_content__application_json___schema_properties_published;

  /**  */
  public function __construct() {$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param bool $dollar_paths________requestBody_content__application_json___schema_properties_published
  * 
  * @return self
 */
  public static function with(
    bool $dollar_paths________requestBody_content__application_json___schema_properties_published = null,
  ): self {
    $obj = new self;

    null !== $dollar_paths________requestBody_content__application_json___schema_properties_published && $obj->dollar_paths________requestBody_content__application_json___schema_properties_published = $dollar_paths________requestBody_content__application_json___schema_properties_published;

    return $obj;
  }

  /**
  * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
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
}