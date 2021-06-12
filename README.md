# test

Set a template document in WYSIWYG and render to pdf.
User can update this template and it will be saved in database.
Template can have dynamic values for parameters like name, audience, etc.

## Usage

To get started, make sure you have [Docker installed] on your system.

Run:
- `docker-compose build`
- `docker-compose up -d`
- `docker-compose run --rm composer install`
- `copy src\.env.example src\.env`
- `docker-compose run --rm artisan migrate`
- `docker-compose run --rm artisan db:seed --class TemplateSeeder`

If everything goes smoothly, you should now be able access the laravel app locally in localhost:8080

