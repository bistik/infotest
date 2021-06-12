<?php
declare(strict_types=1);

namespace App\Http\Service;

use Illuminate\Http\Request;

interface RequestToObjectServiceInterface
{
    public function createObject(Request $request, array $keys, string $prefix);
}
