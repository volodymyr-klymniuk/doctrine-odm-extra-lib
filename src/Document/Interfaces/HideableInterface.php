<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\Doctrine\Odm\Document\Interfaces;

interface HideableInterface
{
    public function getHideFor(): array;

    /**
     * @param string[] $hideFor
     *
     * @return static
     */
    public function setHideFor(array $hideFor);

    /**
     * @param string $hideFor
     *
     * @return static
     */
    public function addHideFor(string $hideFor);
}