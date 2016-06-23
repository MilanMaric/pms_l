<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorks_On_ProjectRequest;
use App\Http\Requests\UpdateWorks_On_ProjectRequest;
use App\Repositories\Works_On_ProjectRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Works_On_ProjectController extends InfyOmBaseController
{
    /** @var  Works_On_ProjectRepository */
    private $worksOnProjectRepository;

    public function __construct(Works_On_ProjectRepository $worksOnProjectRepo)
    {
        $this->worksOnProjectRepository = $worksOnProjectRepo;
    }

    /**
     * Display a listing of the Works_On_Project.
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
     * Show the form for creating a new Works_On_Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('worksOnProjects.create');
    }

    /**
     * Store a newly created Works_On_Project in storage.
     *
     * @param CreateWorks_On_ProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateWorks_On_ProjectRequest $request)
    {
        $input = $request->all();

        $worksOnProject = $this->worksOnProjectRepository->create($input);

        Flash::success('Works_On_Project saved successfully.');

        return redirect(route('worksOnProjects.index'));
    }

    /**
     * Display the specified Works_On_Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('Works_On_Project not found');

            return redirect(route('worksOnProjects.index'));
        }

        return view('worksOnProjects.show')->with('worksOnProject', $worksOnProject);
    }

    /**
     * Show the form for editing the specified Works_On_Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('Works_On_Project not found');

            return redirect(route('worksOnProjects.index'));
        }

        return view('worksOnProjects.edit')->with('worksOnProject', $worksOnProject);
    }

    /**
     * Update the specified Works_On_Project in storage.
     *
     * @param  int              $id
     * @param UpdateWorks_On_ProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorks_On_ProjectRequest $request)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('Works_On_Project not found');

            return redirect(route('worksOnProjects.index'));
        }

        $worksOnProject = $this->worksOnProjectRepository->update($request->all(), $id);

        Flash::success('Works_On_Project updated successfully.');

        return redirect(route('worksOnProjects.index'));
    }

    /**
     * Remove the specified Works_On_Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worksOnProject = $this->worksOnProjectRepository->findWithoutFail($id);

        if (empty($worksOnProject)) {
            Flash::error('Works_On_Project not found');

            return redirect(route('worksOnProjects.index'));
        }

        $this->worksOnProjectRepository->delete($id);

        Flash::success('Works_On_Project deleted successfully.');

        return redirect(route('worksOnProjects.index'));
    }
}
