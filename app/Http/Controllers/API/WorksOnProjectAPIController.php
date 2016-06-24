<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWorksOnProjectAPIRequest;
use App\Http\Requests\API\UpdateWorksOnProjectAPIRequest;
use App\Models\WorksOnProject;
use App\Repositories\WorksOnProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WorksOnProjectController
 * @package App\Http\Controllers\API
 */

class WorksOnProjectAPIController extends InfyOmBaseController
{
    /** @var  WorksOnProjectRepository */
    private $worksOnProjectRepository;

    public function __construct(WorksOnProjectRepository $worksOnProjectRepo)
    {
        $this->worksOnProjectRepository = $worksOnProjectRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/worksOnProjects",
     *      summary="Get a listing of the WorksOnProjects.",
     *      tags={"WorksOnProject"},
     *      description="Get all WorksOnProjects",
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
     *                  @SWG\Items(ref="#/definitions/WorksOnProject")
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
        $this->worksOnProjectRepository->pushCriteria(new RequestCriteria($request));
        $this->worksOnProjectRepository->pushCriteria(new LimitOffsetCriteria($request));
        $worksOnProjects = $this->worksOnProjectRepository->all();

        return $this->sendResponse($worksOnProjects->toArray(), 'WorksOnProjects retrieved successfully');
    }

    /**
     * @param CreateWorksOnProjectAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/worksOnProjects",
     *      summary="Store a newly created WorksOnProject in storage",
     *      tags={"WorksOnProject"},
     *      description="Store WorksOnProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorksOnProject that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorksOnProject")
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
     *                  ref="#/definitions/WorksOnProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorksOnProjectAPIRequest $request)
    {
        $input = $request->all();

        $worksOnProjects = $this->worksOnProjectRepository->create($input);

        return $this->sendResponse($worksOnProjects->toArray(), 'WorksOnProject saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/worksOnProjects/{id}",
     *      summary="Display the specified WorksOnProject",
     *      tags={"WorksOnProject"},
     *      description="Get WorksOnProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnProject",
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
     *                  ref="#/definitions/WorksOnProject"
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
        /** @var WorksOnProject $worksOnProject */
        $worksOnProject = $this->worksOnProjectRepository->find($id);

        if (empty($worksOnProject)) {
            return Response::json(ResponseUtil::makeError('WorksOnProject not found'), 404);
        }

        return $this->sendResponse($worksOnProject->toArray(), 'WorksOnProject retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWorksOnProjectAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/worksOnProjects/{id}",
     *      summary="Update the specified WorksOnProject in storage",
     *      tags={"WorksOnProject"},
     *      description="Update WorksOnProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnProject",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorksOnProject that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorksOnProject")
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
     *                  ref="#/definitions/WorksOnProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorksOnProjectAPIRequest $request)
    {
        $input = $request->all();

        /** @var WorksOnProject $worksOnProject */
        $worksOnProject = $this->worksOnProjectRepository->find($id);

        if (empty($worksOnProject)) {
            return Response::json(ResponseUtil::makeError('WorksOnProject not found'), 404);
        }

        $worksOnProject = $this->worksOnProjectRepository->update($input, $id);

        return $this->sendResponse($worksOnProject->toArray(), 'WorksOnProject updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/worksOnProjects/{id}",
     *      summary="Remove the specified WorksOnProject from storage",
     *      tags={"WorksOnProject"},
     *      description="Delete WorksOnProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorksOnProject",
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
        /** @var WorksOnProject $worksOnProject */
        $worksOnProject = $this->worksOnProjectRepository->find($id);

        if (empty($worksOnProject)) {
            return Response::json(ResponseUtil::makeError('WorksOnProject not found'), 404);
        }

        $worksOnProject->delete();

        return $this->sendResponse($id, 'WorksOnProject deleted successfully');
    }
}
