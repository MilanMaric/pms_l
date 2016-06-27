<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateWorksOnProjectRequest;
use App\Http\Requests\UpdateWorksOnProjectRequest;
use App\Models\Person;
use App\Models\Project;
use App\Models\Role;
use App\Repositories\WorksOnProjectRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorksOnProjectController extends InfyOmBaseController
{
    /** @var  WorksOnProjectRepository */
    private $worksOnProjectRepository;

    public function __construct(WorksOnProjectRepository $worksOnProjectRepo)
    {
        $this->worksOnProjectRepository = $worksOnProjectRepo;
    }

    /**
     * Display a listing of the WorksOnProject.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->worksOnProjectRepository->pushCriteria(new RequestCriteria($request));
        $worksOnProjects = $this->worksOnProjectRepository->all();

        return view('worksOnProjects.index')
            ->with('worksOnProjects', $worksOnProjects);
    }

    /**
     * Show the form for creating a new WorksOnProject.
     *
     * @return Response
     */
    public function create()
    {
        $persons = Person::toSelectValues(Person::where([])->get());
        $projects = Project::getProjectSelectArray(Session::get('projects'));
        $roles = Role::toSelectValues(Role::where([])->get());
//        dd($persons);
        return view('worksOnProjects.create')->with(['persons' => $persons, 'projects' => $projects, 'roles' => $roles]);
    }

    /**
     * Store a newly created WorksOnProject in storage.
     *
     * @param CreateWorksOnProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateWorksOnProjectRequest $request)
    {
        $input = $request->all();
//        dd($input);
        $project_id = $input['project_id'];
        $worksOnProject = $this->worksOnProjectRepository->create($input);

        Flash::success('WorksOnProject saved successfully.');
        HomeController::projectSessionHelper();
        return redirect(route('projects.show', $project_id));
    }

    /**
     * Display the specified WorksOnProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('WorksOnProject not found');

            return redirect(route('worksOnProjects.index'));
        }

        return view('worksOnProjects.show')->with('worksOnProject', $worksOnProject);
    }

    /**
     * Show the form for editing the specified WorksOnProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('WorksOnProject not found');

            return redirect(route('worksOnProjects.index'));
        }
        $persons = Person::where([])->select(['id', 'name', 'lastname'])->get();
        $projects = Project::where([])->select(['id', 'title'])->get();

        return view('worksOnProjects.edit')->with(['worksOnProject', $worksOnProject, 'persons' => $persons, 'projects' => $projects]);
    }

    /**
     * Update the specified WorksOnProject in storage.
     *
     * @param  int $id
     * @param UpdateWorksOnProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorksOnProjectRequest $request)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('WorksOnProject not found');

            return redirect(route('worksOnProjects.index'));
        }

        $worksOnProject = $this->worksOnProjectRepository->update($request->all(), $id);

        Flash::success('WorksOnProject updated successfully.');
        return redirect(route('worksOnProjects.index'));
    }

    /**
     * Remove the specified WorksOnProject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('WorksOnProject not found');

            return redirect(route('worksOnProjects.index'));
        }

        $this->worksOnProjectRepository->delete($id);

        Flash::success('WorksOnProject deleted successfully.');
        HomeController::projectSessionHelper();
        return redirect(route('worksOnProjects.index'));
    }
}
