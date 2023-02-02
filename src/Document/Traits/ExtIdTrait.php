<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait ExtIdTrait
{
    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    private $extId;

    /**
     * @return string
     */
    public function getExtId(): ?string
    {
        return $this->extId;
    }

    /**
     * @param string $extId
     *
     * @return $this
     */
    public function setExtId(string $extId)
    {
        $this->extId = $extId;

        return $this;
    }
}