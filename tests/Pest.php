<?php

declare(strict_types=1);

uses(Tests\TestCase::class)->in('Feature');

function fixture (string $filename): array
{
    $file = file_get_contents(base_path("tests/Fixtures/$filename.json"));

    return json_decode(
        json: $file,
        associative: true,
    );
}
