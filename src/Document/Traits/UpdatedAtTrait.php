<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait UpdatedAtTrait
{
    use \VolodymyrKlymniuk\StdLib\FrequentField\Traits\UpdatedAtTrait;

    /**
     * @MongoDB\Field(type="date")
     *
     * @var \DateTime|null
     */
    protected $updatedAt;

    /**
     * @MongoDB\PrePersist()
     */
    public function prePersistUpdateAt()
    {
        if(null === $this->getUpdatedAt()) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @MongoDB\PreUpdate()
     */
    public function preUpdateUpdateAt()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}