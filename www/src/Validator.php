<?php

declare(strict_types=1);

namespace TestApiTest;

class Validator
{
    const SOURCE = 'source';
    const PAYLOAD = 'payload';

    public function validate(array $data): bool
    {
        $source = $data[self::SOURCE] ?? null;
        $payload = $data[self::PAYLOAD] ?? null;

        return $source && $payload;
    }

}