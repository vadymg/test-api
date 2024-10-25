<?php

declare(strict_types=1);

namespace TestApiTest;

class SensitiveDataModifier
{
    const MODIFIER = '_SENSITIVE_DATA_REMOVED_';
    const EMAIL = 'email';

    public function modify(array $data): array
    {
        foreach ($this->getSensitiveKeys() as $key) {
            if (isset($data[$key])) {
                $data[$key] = self::MODIFIER;
            }
        }

        return $data;
    }

    private function getSensitiveKeys(): array
    {
        return [
            self::EMAIL
        ];
    }

}