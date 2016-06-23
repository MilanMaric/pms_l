<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateWorks_On_TaskRequest;
use App\Http\Requests\UpdateWorks_On_TaskRequest;
use App\Repositories\Works_On_TaskRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Works_On_TaskController extends InfyOmBaseController
{
    /** @var  Works_On_TaskRepository */
    private $worksOnTaskRepository;

    public function __construct(Works_On_TaskRepository $worksOnTaskRepo)
    {
        $this->worksOnTaskRepository = $worksOnTaskRepo;
    }

    /**
     * Display a listing of the Works_On_Task.
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
     * Show the form for creating a new Works_On_Task.
     *
     * @return Response
     */
    public function create()
    {
        return view('worksOnTasks.create');
    }

    /**
     * Store a newly created Works_On_Task in storage.
     *
     * @param CreateWorks_On_TaskRequest $request
     *
     * @return Response
     */
    public function store(CreateWorks_On_TaskRequest $request)
    {
        $input = $request->all();

        $worksOnTask = $this->worksOnTaskRepository->create($input);

        Flash::success('Works_On_Task saved successfully.');

        return redirect(route('worksOnTasks.index'));
    }

    /**
     * Display the specified Works_On_Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('Works_On_Task not found');

            return redirect(route('worksOnTasks.index'));
        }

        return view('worksOnTasks.show')->with('worksOnTask', $worksOnTask);
    }

    /**
     * Show the form for editing the specified Works_On_Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('Works_On_Task not found');

            return redirect(route('worksOnTasks.index'));
        }

        return view('worksOnTasks.edit')->with('worksOnTask', $worksOnTask);
    }

    /**
     * Update the specified Works_On_Task in storage.
     *
     * @param  int              $id
     * @param UpdateWorks_On_TaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorks_On_TaskRequest $request)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('Works_On_Task not found');

            return redirect(route('worksOnTasks.index'));
        }

        $worksOnTask = $this->worksOnTaskRepository->update($request->all(), $id);

        Flash::success('Works_On_Task updated successfully.');

        return redirect(route('worksOnTasks.index'));
    }

    /**
     * Remove the specified Works_On_Task from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $worksOnTask = $this->worksOnTaskRepository->findWithoutFail($id);

        if (empty($worksOnTask)) {
            Flash::error('Works_On_Task not found');

            return redirect(route('worksOnTasks.index'));
        }

        $this->worksOnTaskRepository->delete($id);

        Flash::success('Works_On_Task deleted successfully.');

        return redirect(route('worksOnTasks.index'));
    }
}
