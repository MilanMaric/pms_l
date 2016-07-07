<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Repositories\TaskRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TaskController extends InfyOmBaseController
{
    /** @var  TaskRepository */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = HomeController::tasksSessionHelper();
        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new Task.
     *
     * @return Response
     */
    public function create()
    {
        $projects = HomeController::projectSessionHelper();
        $pp = Project::getWritableProjects($projects);
        $p = Project::getProjectSelectArray($pp);
        return view('tasks.create', ['projects' => $p]);
    }

    /**
     * Store a newly created Task in storage.
     *
     * @param CreateTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();
        $projectID = $input['project_id'];
        if (Project::checkWritable($projectID)) {
            $task = $this->taskRepository->create($input);

            Flash::success('Task saved successfully.');

            return redirect(route('projects.show', $projectID));
        } else {
            Flash::error("You don't have access to do that");
            return redirect('back');
        }

    }

    /**
     * Display the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);
        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified Task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }
        $projects = HomeController::projectSessionHelper();
        $p = Project::getProjectSelectArray($projects);

        return view('tasks.edit')->with('task', $task)->with('projects', $p);
    }

    /**
     * Update the specified Task in storage.
     *
     * @param  int $id
     * @param UpdateTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskRequest $request)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $task = $this->taskRepository->update($request->all(), $id);

        Flash::success('Task updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified Task from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $this->taskRepository->delete($id);

        Flash::success('Task deleted successfully.');

        return redirect(route('tasks.index'));
    }
}
