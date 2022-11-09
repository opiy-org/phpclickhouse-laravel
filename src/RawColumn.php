<?php

declare(strict_types=1);

namespace PhpClickHouseLaravel;

use Tinderbox\ClickhouseBuilder\Query\Expression;
use Tinderbox\ClickhouseBuilder\Query\Identifier;

class RawColumn extends Expression
{
    /**
     * Column alias.
     *
     * @var Identifier|null
     */
    private $alias = null;

    /**
     * Create a new raw query expression.
     *
     * @param mixed $value
     * @param null $alias
     */
    public function __construct($value, $alias = null)
    {
        $this->value = $value;
        if ($alias) {
            $this->value .= " AS `$alias`";
        }

        if ($alias) {
            $this->alias = new Identifier($alias);
        }

        parent::__construct($this->value);
    }

    /**
     * Get column alias.
     *
     * @return Identifier|null
     */
    public function getAlias(): ?Identifier
    {
        return $this->alias;
    }
}
