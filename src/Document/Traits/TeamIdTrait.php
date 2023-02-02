<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait TeamIdTrait
{
    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    protected $teamId;

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->teamId;
    }

    /**
     * @param string $teamId
     *
     * @return static
     */
    public function setTeamId(string $teamId): self
    {
        $this->teamId = $teamId;

        return $this;
    }
}