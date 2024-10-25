<?php

declare(strict_types=1);

namespace TestApiTest\Storage;

class FileStorage implements IStorage
{

    public function __construct(private readonly string $path)
    {
    }

    public function store(array $data): void
    {
        file_put_contents($this->path, json_encode($data), FILE_APPEND );
    }

}