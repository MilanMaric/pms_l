<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Income;
use App\Models\Person;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\WorksOnProject;
use App\Repositories\ProjectRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Response;

class ProjectController extends InfyOmBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $projects = HomeController::projectSessionHelper();

        return view('projects.index')
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);
//        TODO insert into works_on_project authentificated user and this project
//        $wop;
//        dd($project);
        $wop = new WorksOnProject();
        $wop->project_id = $project->Id;
        $wop->person_id = HomeController::getPerson()->Id;
        $wop->role_id = 1;
        $wop->save();
        Flash::success('Project saved successfully.');
        HomeController::projectSessionHelper();
        return redirect(route('projects.show', $project->Id));

    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $project = $this->projectRepository->findWithoutFail($id);
        $person = HomeController::getPerson();
        $worksOnProject = WorksOnProject::where(['project_id' => $project->Id])->get();
        $wopRole = WorksOnProject::where(['project_id' => $project->Id, 'person_id' => $person->Id])->get();
//        dd($wopRole[0]->role_id);
        $role = Role::find($wopRole[0]->role_id);
        $persons = [];
        foreach ($worksOnProject as $wop) {
            $wop->person = Person::find($wop->person_id);
            $persons[] = $wop->person;
        }
        $personsA = Person::toSelectValues(Person::where([])->get());
        $rolesA = Role::toSelectValues(Role::where([])->get());
        if (Project::checkUser($project)) {
            if (empty($project)) {
                Flash::error('Project not found');
                return redirect(route('projects.index'));
            }

            return view('projects.show')->with('project', $project)->with('persons', Person::toSelectValues($persons))
                ->with('role', $role)->with('personsA', $personsA)->with('rolesA', $rolesA);
        } else {
            return redirect('projects');
        }
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);
        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }
        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }

    public function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $project=Project::getFullProject($id);

        
        $pdf->loadView('projects.pdf', ["project" => $project]);
        return $pdf->stream();
    }
}
