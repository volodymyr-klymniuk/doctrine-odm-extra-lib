<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait HideableTrait
{
    /**
     * @MongoDB\Field(type="collection")
     *
     * @var string[]
     */
    protected $hideFor = [];

    /**
     * @return string[]
     */
    public function getHideFor(): array
    {
        return $this->hideFor;
    }

    /**
     * @param string[] $hideFor
     *
     * @return static
     */
    public function setHideFor(array $hideFor): self
    {
        $this->hideFor = $hideFor;

        return $this;
    }

    /**
     * @param string $hideFor
     *
     * @return static
     */
    public function addHideFor(string $hideFor): self
    {
        if (!in_array($hideFor, $this->hideFor)) {
            $this->hideFor[] = $hideFor;
        }

        return $this;
    }
}