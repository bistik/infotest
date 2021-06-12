<?php
declare(strict_types=1);

namespace App\Http\Service;

use Illuminate\Http\Request;

class RequestToObjectService implements RequestToObjectServiceInterface
{
    public function createObject(Request $request, array $keys, string $prefix)
    {
        return (object)$this->makeArrayFromRequest($request, $keys, $prefix);
    }

    private function makeArrayFromRequest(Request $request, array $keys, string $prefix)
    {
        $data = [];

        foreach ($keys as $key) {
            $data[$key] = $request->input($prefix . '_' . $key, '');
        }

        return $data;
    }
}
