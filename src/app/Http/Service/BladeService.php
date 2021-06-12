<?php
declare(strict_types=1);

namespace App\Http\Service;

use Exception;
use Illuminate\Support\Facades\Blade;

class BladeService implements BladeServiceInterface
{
    public function compileWith($value, array $args = [])
    {
        $generated = Blade::compileString($value);

        ob_start() and extract($args, EXTR_SKIP);

        try
        {
            eval('?>'.$generated);
        }
        catch (Exception $e)
        {
            ob_get_clean();
            throw $e;
        }

        return ob_get_clean();
    }
}
