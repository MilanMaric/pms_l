<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRevisionAPIRequest;
use App\Http\Requests\API\UpdateRevisionAPIRequest;
use App\Models\Revision;
use App\Repositories\RevisionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RevisionController
 * @package App\Http\Controllers\API
 */

class RevisionAPIController extends InfyOmBaseController
{
    /** @var  RevisionRepository */
    private $revisionRepository;

    public function __construct(RevisionRepository $revisionRepo)
    {
        $this->revisionRepository = $revisionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/revisions",
     *      summary="Get a listing of the Revisions.",
     *      tags={"Revision"},
     *      description="Get all Revisions",
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
     *                  @SWG\Items(ref="#/definitions/Revision")
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
        $this->revisionRepository->pushCriteria(new RequestCriteria($request));
        $this->revisionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $revisions = $this->revisionRepository->all();

        return $this->sendResponse($revisions->toArray(), 'Revisions retrieved successfully');
    }

    /**
     * @param CreateRevisionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/revisions",
     *      summary="Store a newly created Revision in storage",
     *      tags={"Revision"},
     *      description="Store Revision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Revision that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Revision")
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
     *                  ref="#/definitions/Revision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRevisionAPIRequest $request)
    {
        $input = $request->all();

        $revisions = $this->revisionRepository->create($input);

        return $this->sendResponse($revisions->toArray(), 'Revision saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/revisions/{id}",
     *      summary="Display the specified Revision",
     *      tags={"Revision"},
     *      description="Get Revision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Revision",
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
     *                  ref="#/definitions/Revision"
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
        /** @var Revision $revision */
        $revision = $this->revisionRepository->find($id);

        if (empty($revision)) {
            return Response::json(ResponseUtil::makeError('Revision not found'), 404);
        }

        return $this->sendResponse($revision->toArray(), 'Revision retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRevisionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/revisions/{id}",
     *      summary="Update the specified Revision in storage",
     *      tags={"Revision"},
     *      description="Update Revision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Revision",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Revision that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Revision")
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
     *                  ref="#/definitions/Revision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRevisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Revision $revision */
        $revision = $this->revisionRepository->find($id);

        if (empty($revision)) {
            return Response::json(ResponseUtil::makeError('Revision not found'), 404);
        }

        $revision = $this->revisionRepository->update($input, $id);

        return $this->sendResponse($revision->toArray(), 'Revision updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/revisions/{id}",
     *      summary="Remove the specified Revision from storage",
     *      tags={"Revision"},
     *      description="Delete Revision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Revision",
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
        /** @var Revision $revision */
        $revision = $this->revisionRepository->find($id);

        if (empty($revision)) {
            return Response::json(ResponseUtil::makeError('Revision not found'), 404);
        }

        $revision->delete();

        return $this->sendResponse($id, 'Revision deleted successfully');
    }
}
