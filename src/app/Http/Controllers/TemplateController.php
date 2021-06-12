<?php


namespace App\Http\Controllers;


use App\Models\Template;

class TemplateController
{
    public function __invoke()
    {
        return view(
            'select_template',
            ['template' => Template::first()]
        );
    }
}
