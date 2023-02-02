<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\LazyResult;

use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use VolodymyrKlymniuk\LazyResultLib\Dto\FilterableInterface;
use VolodymyrKlymniuk\LazyResultLib\Dto\PaginatableInterface;
use VolodymyrKlymniuk\LazyResultLib\Dto\SortableInterface;
use VolodymyrKlymniuk\LazyResultLib\LazyResultBuilder\AbstractLazyResultBuilder;
use VolodymyrKlymniuk\LazyResultLib\ResultTransformer\PlainResultTransformer;
use VolodymyrKlymniuk\LazyResultLib\ResultTransformer\ResultTransformerInterface;

class LazyResultBuilder extends AbstractLazyResultBuilder
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * @param DocumentRepository              $repository
     * @param ResultTransformerInterface|null $rt
     */
    public function __construct(DocumentRepository $repository, ResultTransformerInterface $rt = null)
    {
        $this->repository = $repository;
        $rt = null === $rt ? new PlainResultTransformer() : $rt;
        $this->createLazyResult($repository, $rt);
    }

    /**
     * @param FilterableInterface $dto
     *
     * @return self
     */
    public function filter(FilterableInterface $dto)
    {
        // TODO: Implement filter() method.
        throw new \Exception('not implemented yet');
    }

    /**
     * @param SortableInterface $dto
     *
     * @return self
     */
    public function sort(SortableInterface $dto)
    {
        $this
            ->lazyResult
            ->getQb()
            ->sort($dto->getSort());

        return $this;
    }

    /**
     * @param PaginatableInterface $dto
     *
     * @return self
     */
    public function paginate(PaginatableInterface $dto)
    {
        $this
            ->lazyResult
            ->getQb()
            ->skip($dto->getOffset())
            ->limit($dto->getLimit());

        return $this;
    }

    /**
     * @param DocumentRepository         $repository
     * @param ResultTransformerInterface $rt
     */
    protected function createLazyResult(DocumentRepository $repository, ResultTransformerInterface $rt): void
    {
        $this->lazyResult = new LazyResult($repository->createQueryBuilder(), $rt);
    }
}
