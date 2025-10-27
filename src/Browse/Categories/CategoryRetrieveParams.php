<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
 *
 * @see Spotted\Browse\Categories->retrieve
 *
 * @phpstan-type category_retrieve_params = array{locale?: string}
 */
final class CategoryRetrieveParams implements BaseModel
{
    /** @use SdkModel<category_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._.
     */
    #[Api(optional: true)]
    public ?string $locale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $locale = null): self
    {
        $obj = new self;

        null !== $locale && $obj->locale = $locale;

        return $obj;
    }

    /**
     * The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }
}
