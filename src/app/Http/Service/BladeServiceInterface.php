<?php
declare(strict_types=1);

namespace App\Http\Service;

interface BladeServiceInterface
{
    public function compileWith($value, array $args = []);
}
