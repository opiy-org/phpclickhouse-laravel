<?php

declare(strict_types=1);

namespace PhpClickHouseLaravel;

use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Support\Facades\DB;
use Tinderbox\Clickhouse\Client;

class Migration extends BaseMigration
{
    /**
     * @param string $sql
     * @return bool
     */
    protected static function write(string $sql): bool
    {
        /** @var Client $client */
        $client = DB::connection('clickhouse')->getClient();

        return $client->writeOne($sql);
    }
}
