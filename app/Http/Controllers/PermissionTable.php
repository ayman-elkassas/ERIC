<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use \LaravelEnso\Tables\Contracts\Table;

class PermissionTable implements Table
{
    protected const TemplatePath = __DIR__.'/Templates/permissions.json';

    public function query(): Builder
    {
        // TODO: Implement query() method.
        return User::selectRaw('
            permissions.id, permissions.name, permissions.email,
            permissions.avatar, permissions.created_at,
        ');
    }

    public function templatePath(): string
    {
        // TODO: Implement templatePath() method.
        return static::TemplatePath;
    }
}
