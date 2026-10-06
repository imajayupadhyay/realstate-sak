<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function show(string $slug, ProjectRepository $projects): Response
    {
        $project = $projects->find($slug);

        abort_if($project === null, 404);

        return Inertia::render('Projects/Show', [
            'project' => $project,
        ]);
    }
}
