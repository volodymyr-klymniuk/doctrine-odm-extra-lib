<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\LazyResult;

use Doctrine\ODM\MongoDB\Query\Builder;
use VolodymyrKlymniuk\LazyResultLib\AbstractLazyResult;
use VolodymyrKlymniuk\LazyResultLib\ResultTransformer\ResultTransformerInterface;

class LazyResult extends AbstractLazyResult
{
    /**
     * @var Builder
     */
    private $qb;

    /**
     * @param Builder                    $qb
     * @param ResultTransformerInterface $resultTransformer
     */
    public function __construct(Builder $qb, ResultTransformerInterface $resultTransformer)
    {
        $this->qb = $qb;
        parent::__construct($resultTransformer);
    }

    /**
     * @return Builder
     */
    public function getQb(): Builder
    {
        return $this->qb;
    }

    /**
     * @param Builder $qb
     *
     * @return self
     */
    public function setQb(Builder $qb): self
    {
        $this->qb = $qb;

        return $this;
    }

    /**
     * @return mixed
     *
     * @throws \Doctrine\ODM\MongoDB\MongoDBException
     */
    protected function getResponse()
    {
        return $this
            ->qb
            ->getQuery()
            ->execute();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        if ($this->initialized) {
            return parent::count();
        } else {
            return $this
                ->qb
                ->getQuery()
                ->count();
        }
    }
}
