<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue\QueueGetResponse;

use Spotted\Core\Concerns\SdkUnion;
use Spotted\Core\Conversion\Contracts\Converter;
use Spotted\Core\Conversion\Contracts\ConverterSource;
use Spotted\EpisodeObject;
use Spotted\TrackObject;

final class Queue implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['track' => TrackObject::class, 'episode' => EpisodeObject::class];
    }
}
