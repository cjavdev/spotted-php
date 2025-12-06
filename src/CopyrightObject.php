<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type CopyrightObjectShape = array{
 *   text?: string|null, type?: string|null
 * }
 */
final class CopyrightObject implements BaseModel
{
    /** @use SdkModel<CopyrightObjectShape> */
    use SdkModel;

    /**
     * The copyright text for this content.
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * The type of copyright: `C` = the copyright, `P` = the sound recording (performance) copyright.
     */
    #[Api(optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $text = null, ?string $type = null): self
    {
        $obj = new self;

        null !== $text && $obj['text'] = $text;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * The copyright text for this content.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }

    /**
     * The type of copyright: `C` = the copyright, `P` = the sound recording (performance) copyright.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
