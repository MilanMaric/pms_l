<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorksOnTaskRequest;
use App\Http\Requests\UpdateWorksOnTaskRequest;
use App\Repositories\WorksOnTaskRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorksOnTaskController extends InfyOmBaseController
{
    /** @var  WorksOnTaskRepository */
    private $worksOnTaskRepository;

    public function __construct(WorksOnTaskRepository $worksOnTaskRepo)
    {
        $this->worksOnTaskRepository = $worksOnTaskRepo;
    }

    /**
     * Display a listing of the WorksOnTask.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->worksOnTaskRepository->pushCriteria(new RequestCriteria($request));
        $worksOnTasks = $this->worksOnTaskRepository->all();

        return view('worksOnTasks.index')
            ->with('worksOnTasks', $worksOnTasks);
    }

    /**
     * Show the form for creating a new WorksOnTask.
     *
     * @return Response
     */
    public function create()
    {
        return view('worksOnTasks.create');
    }

    /**
     * Store a newly created WorksOnTask in storage.
     *
     * @param CreateWorksOnTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateWorksOnTaskRequest $request)
    {
        $input = $request->all();

        $worksOnTask = $this->worksOnTaskRepository->create($input);

        Flash::success('WorksOnTask saved successfully.');

        return redirect(route('worksOnTasks.index'));
    }

    /**
     * Display the specified WorksOnTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('WorksOnTask not found');

            return redirect(route('worksOnTasks.index'));
        }

        return view('worksOnTasks.show')->with('worksOnTask', $worksOnTask);
    }

    /**
     * Show the form for editing the specified WorksOnTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('WorksOnTask not found');

            return redirect(route('worksOnTasks.index'));
        }

        return view('worksOnTasks.edit')->with('worksOnTask', $worksOnTask);
    }

    /**
     * Update the specified WorksOnTask in storage.
     *
     * @param  int              $id
     * @param UpdateWorksOnTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorksOnTaskRequest $request)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('WorksOnTask not found');

            return redirect(route('worksOnTasks.index'));
        }

        $worksOnTask = $this->worksOnTaskRepository->update($request->all(), $id);

        Flash::success('WorksOnTask updated successfully.');

        return redirect(route('worksOnTasks.index'));
    }

    /**
     * Remove the specified WorksOnTask from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('WorksOnTask not found');

            return redirect(route('worksOnTasks.index'));
        }

        $this->worksOnTaskRepository->delete($id);

        Flash::success('WorksOnTask deleted successfully.');

        return redirect(route('worksOnTasks.index'));
    }
}
