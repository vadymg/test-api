<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    const FILE_PATH = '/test_data.json';

    public function testRequestWithValidDataReturnsSuccess(): void
    {
        $testData = [
            "source" => "source",
            "payload" => ["email" => "example@example.com"],
        ];

        $request = new \TestApiTest\Request(
            new \TestApiTest\Storage\FileStorage(self::FILE_PATH),
            new \TestApiTest\Validator(),
            new \TestApiTest\SensitiveDataModifier()
        );

        $request->handle($testData);

        $this->expectOutputString('{"status":"ok"}');

        $this->clearFile();
    }

    public function testRequestFailed(): void
    {
        $request = new \TestApiTest\Request(
            new \TestApiTest\Storage\FileStorage(self::FILE_PATH),
            new \TestApiTest\Validator(),
            new \TestApiTest\SensitiveDataModifier(),
        );

        $request->handle();
        $this->expectOutputString('{"status":"error"}');

        $this->clearFile();
    }

    private function clearFile(): void
    {
        if (file_exists(self::FILE_PATH)) {
            unlink(self::FILE_PATH);
        }
    }
}
