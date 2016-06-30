<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWorksOnTaskAPIRequest;
use App\Http\Requests\API\UpdateWorksOnTaskAPIRequest;
use App\Models\Person;
use App\Models\WorksOnTask;
use App\Repositories\WorksOnTaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WorksOnTaskController
 * @package App\Http\Controllers\API
 */

class WorksOnTaskAPIController extends InfyOmBaseController
{
    /** @var  WorksOnTaskRepository */
    private $worksOnTaskRepository;

    public function __construct(WorksOnTaskRepository $worksOnTaskRepo)
    {
        $this->worksOnTaskRepository = $worksOnTaskRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/worksOnTasks",
     *      summary="Get a listing of the WorksOnTasks.",
     *      tags={"WorksOnTask"},
     *      description="Get all WorksOnTasks",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/WorksOnTask")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->worksOnTaskRepository->pushCriteria(new RequestCriteria($request));
        $this->worksOnTaskRepository->pushCriteria(new LimitOffsetCriteria($request));
        $worksOnTasks = $this->worksOnTaskRepository->all();

        return $this->sendResponse($worksOnTasks->toArray(), 'WorksOnTasks retrieved successfully');
    }

    /**
     * @param CreateWorksOnTaskAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/worksOnTasks",
     *      summary="Store a newly created WorksOnTask in storage",
     *      tags={"WorksOnTask"},
     *      description="Store WorksOnTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorksOnTask that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorksOnTask")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorksOnTask"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorksOnTaskAPIRequest $request)
    {
        $input = $request->all();

        $worksOnTasks = $this->worksOnTaskRepository->create($input);

        return $this->sendResponse($worksOnTasks->toArray(), 'WorksOnTask saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/worksOnTasks/{id}",
     *      summary="Display the specified WorksOnTask",
     *      tags={"WorksOnTask"},
     *      description="Get WorksOnTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnTask",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorksOnTask"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var WorksOnTask $worksOnTask */
        $worksOnTask = WorksOnTask::where(['task_id'=>$id])->get();
        foreach ($worksOnTask as $item) {
            $item->person=Person::find($item->person_id);
        }

        if (empty($worksOnTask)) {
            return Response::json(ResponseUtil::makeError('WorksOnTask not found'), 404);
        }

        return $this->sendResponse($worksOnTask->toArray(), 'WorksOnTask retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWorksOnTaskAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/worksOnTasks/{id}",
     *      summary="Update the specified WorksOnTask in storage",
     *      tags={"WorksOnTask"},
     *      description="Update WorksOnTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnTask",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorksOnTask that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorksOnTask")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorksOnTask"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorksOnTaskAPIRequest $request)
    {
        $input = $request->all();

        /** @var WorksOnTask $worksOnTask */
        $worksOnTask = $this->worksOnTaskRepository->find($id);

        if (empty($worksOnTask)) {
            return Response::json(ResponseUtil::makeError('WorksOnTask not found'), 404);
        }

        $worksOnTask = $this->worksOnTaskRepository->update($input, $id);

        return $this->sendResponse($worksOnTask->toArray(), 'WorksOnTask updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/worksOnTasks/{id}",
     *      summary="Remove the specified WorksOnTask from storage",
     *      tags={"WorksOnTask"},
     *      description="Delete WorksOnTask",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnTask",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var WorksOnTask $worksOnTask */
        $worksOnTask = $this->worksOnTaskRepository->find($id);

        if (empty($worksOnTask)) {
            return Response::json(ResponseUtil::makeError('WorksOnTask not found'), 404);
        }

        $worksOnTask->delete();

        return $this->sendResponse($id, 'WorksOnTask deleted successfully');
    }
}
