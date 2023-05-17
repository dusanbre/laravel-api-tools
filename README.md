# Laravel API tools

## Provide useful tools for Laravel API development

### Installation

```bash
composer require envoo/laravel-api-tools
```

### Configuration

```
php artisan vendor:publish --provider="Envoo\LaravelApiTools\LaravelApiToolsServiceProvider" --tag=config
```

### Artisan commands

```
php artisan envoo:make:filter
php artisan envoo:make:resource
php artisan envoo:make:enum
```

### Traits for models

`use Filterable;` -> add `filter` scope to model. Use filter command to generate filter class. \
`use HasSlug` -> add `slug` attribute to model. Generating slug from model name property. \
`use HasUsername` -> add `username` attribute to model. Generating username from model name property. \
`use InteractWithPagination` -> add `paginateUnderCondition` and `paginateAnyway` scopes to model.

If your model extending `Envoo\LaravelApiTools\Models\Model` you can use pagination and filter scopes by default.

### Dependencies

- [Laravel json response](https://github.com/timacdonald/json-api)
- [Laravel Validated DTO](https://github.com/WendellAdriel/laravel-validated-dto/tree/main)

### Useful links

- [JSON:API](https://jsonapi.org/)