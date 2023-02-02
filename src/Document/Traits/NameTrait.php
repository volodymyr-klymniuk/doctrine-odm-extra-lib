<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait NameTrait
{
    /**
     * @MongoDB\Field(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}