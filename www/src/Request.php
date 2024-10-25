<?php

declare(strict_types=1);

namespace TestApiTest;

use TestApiTest\Storage\IStorage;

class Request
{

    public function __construct(
        private readonly IStorage              $storage,
        private readonly Validator             $validator,
        private readonly SensitiveDataModifier $sensitiveDataModifier
    )
    {
    }

    public function handle(?array $data = null): void
    {
        $data ??= json_decode(file_get_contents('php://input'), true) ?: [];

        if (!$this->validator->validate($data)) {
            http_response_code(400);
            echo json_encode(['status' => 'error']);

            return;
        }

        $data[Validator::PAYLOAD] = $this->sensitiveDataModifier->modify($data[Validator::PAYLOAD]);

        $this->storage->store($data);

        http_response_code(200);

        echo json_encode(['status' => 'ok']);
    }

}