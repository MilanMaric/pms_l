<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorksOnProjectRequest;
use App\Http\Requests\UpdateWorksOnProjectRequest;
use App\Repositories\WorksOnProjectRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorksOnProjectController extends InfyOmBaseController
{
    /** @var  WorksOnProjectRepository */
    private $worksOnProjectRepository;

    public function __construct(WorksOnProjectRepository $worksOnProjectRepo)
    {
        $this->worksOnProjectRepository = $worksOnProjectRepo;
        $this->middleware('auth');
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
        return view('worksOnProjects.create');
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

        $worksOnProject = $this->worksOnProjectRepository->create($input);

        Flash::success('WorksOnProject saved successfully.');

        return redirect(route('worksOnProjects.index'));
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

        return view('worksOnProjects.edit')->with('worksOnProject', $worksOnProject);
    }

    /**
     * Update the specified WorksOnProject in storage.
     *
     * @param  int              $id
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

        return redirect(route('worksOnProjects.index'));
    }
}
