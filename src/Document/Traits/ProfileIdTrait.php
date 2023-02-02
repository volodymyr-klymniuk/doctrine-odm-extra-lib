<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait ProfileIdTrait
{
    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $profileId;

    /**
     * @return string
     */
    public function getProfileId(): string
    {
        return $this->profileId;
    }

    /**
     * @param string $profileId
     *
     * @return static
     */
    public function setProfileId(string $profileId): self
    {
        $this->profileId = $profileId;

        return $this;
    }
}