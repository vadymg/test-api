<?php

declare(strict_types=1);

namespace TestApiTest\Storage;

interface IStorage
{
    public function store(array $data): void;
}