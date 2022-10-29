<?php

declare(strict_types=1);

namespace Uganda;

use Uganda\Exceptions\SubCountyNotFoundException;

final class County
{
    private int $id;

    private string $name;

    /** @var array<int, SubCounty */
    private array $subCounties;

    public function __construct(int $id, string $name, array $subCounties = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->subCounties = $subCounties;
    }

    /**
     * @throws SubCountyNotFoundException
     */
    public function subCounty(string $name): SubCounty
    {
        if (!in_array($name, $this->subCounties, true)) {
            throw new SubCountyNotFoundException(sprintf('unable to locate sub county called %s', $name));
        }

        return $this->subCounties[$name];
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function subCounties(): array
    {
        return $this->subCounties;
    }
}