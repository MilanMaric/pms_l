<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActivityAPIRequest;
use App\Http\Requests\API\UpdateActivityAPIRequest;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityController
 * @package App\Http\Controllers\API
 */

class ActivityAPIController extends InfyOmBaseController
{
    /** @var  ActivityRepository */
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepo)
    {
        $this->activityRepository = $activityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/activities",
     *      summary="Get a listing of the Activities.",
     *      tags={"Activity"},
     *      description="Get all Activities",
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
     *                  @SWG\Items(ref="#/definitions/Activity")
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
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $this->activityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activities = $this->activityRepository->all();

        return $this->sendResponse($activities->toArray(), 'Activities retrieved successfully');
    }

    /**
     * @param CreateActivityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/activities",
     *      summary="Store a newly created Activity in storage",
     *      tags={"Activity"},
     *      description="Store Activity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Activity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Activity")
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
     *                  ref="#/definitions/Activity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateActivityAPIRequest $request)
    {
        $input = $request->all();

        $activities = $this->activityRepository->create($input);

        return $this->sendResponse($activities->toArray(), 'Activity saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/activities/{id}",
     *      summary="Display the specified Activity",
     *      tags={"Activity"},
     *      description="Get Activity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Activity",
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
     *                  ref="#/definitions/Activity"
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
        /** @var Activity $activity */
        $activity = $this->activityRepository->find($id);

        if (empty($activity)) {
            return Response::json(ResponseUtil::makeError('Activity not found'), 404);
        }

        return $this->sendResponse($activity->toArray(), 'Activity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateActivityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/activities/{id}",
     *      summary="Update the specified Activity in storage",
     *      tags={"Activity"},
     *      description="Update Activity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Activity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Activity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Activity")
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
     *                  ref="#/definitions/Activity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateActivityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Activity $activity */
        $activity = $this->activityRepository->find($id);

        if (empty($activity)) {
            return Response::json(ResponseUtil::makeError('Activity not found'), 404);
        }

        $activity = $this->activityRepository->update($input, $id);

        return $this->sendResponse($activity->toArray(), 'Activity updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/activities/{id}",
     *      summary="Remove the specified Activity from storage",
     *      tags={"Activity"},
     *      description="Delete Activity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Activity",
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
        /** @var Activity $activity */
        $activity = $this->activityRepository->find($id);

        if (empty($activity)) {
            return Response::json(ResponseUtil::makeError('Activity not found'), 404);
        }

        $activity->delete();

        return $this->sendResponse($id, 'Activity deleted successfully');
    }
}
