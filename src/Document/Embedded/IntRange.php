<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Embedded;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 */
class IntRange extends \VolodymyrKlymniuk\StdLib\Range\IntRange
{
    /**
     * @MongoDB\Field(type="integer")
     *
     * @var int|null
     */
    protected $from;

    /**
     * @MongoDB\Field(type="integer")
     *
     * @var int|null
     */
    protected $to;
}