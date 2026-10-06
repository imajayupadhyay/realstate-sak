<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

/**
 * Reads projects from resources/data/projects/*.php (one file per project).
 *
 * When projects move to the database, replace the internals of this class
 * with an Eloquent query — controllers and pages won't need to change.
 */
class ProjectRepository
{
    private ?Collection $projects = null;

    public function all(): Collection
    {
        return $this->projects ??= collect(glob(resource_path('data/projects/*.php')))
            ->map(fn (string $file) => require $file)
            ->sortBy('name')
            ->values();
    }

    public function find(string $slug): ?array
    {
        return $this->all()->firstWhere('slug', $slug);
    }

    /**
     * Lightweight list for menus, cards and form dropdowns.
     */
    public function summaries(): array
    {
        return $this->all()
            ->map(fn (array $p) => collect($p)->only([
                'slug', 'name', 'developer', 'location', 'type', 'status', 'price_from', 'image',
            ])->all())
            ->all();
    }
}
