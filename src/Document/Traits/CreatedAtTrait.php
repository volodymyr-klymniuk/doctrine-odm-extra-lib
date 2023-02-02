<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Traits;

trait CreatedAtTrait
{
    use \VolodymyrKlymniuk\StdLib\FrequentField\Traits\CreatedAtTrait;

    /**
     * @MongoDB\Field(type="date")
     *
     * @var \DateTime|null
     */
    protected $createdAt;

    /**
     * @MongoDB\PrePersist
     */
    public function prePersistCreatedAt()
    {
        if (null === $this->getCreatedAt()) {
            $this->setCreatedAt(new \DateTime());
        }
    }
}