<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::updateOrCreate(
            ['id' => 1],
            ['template' => file_get_contents(__DIR__ . '/Task-2-Template.html')]
        );
    }
}
