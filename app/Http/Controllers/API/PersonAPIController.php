<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests\API\CreatePersonAPIRequest;
use App\Http\Requests\API\UpdatePersonAPIRequest;
use App\Models\Person;
use App\Models\Project;
use App\Models\WorksOnProject;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PersonController
 * @package App\Http\Controllers\API
 */
class PersonAPIController extends InfyOmBaseController
{
    /** @var  PersonRepository */
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/people",
     *      summary="Get a listing of the People.",
     *      tags={"Person"},
     *      description="Get all People",
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
     *                  @SWG\Items(ref="#/definitions/Person")
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
        $this->personRepository->pushCriteria(new RequestCriteria($request));
        $this->personRepository->pushCriteria(new LimitOffsetCriteria($request));
        $people = $this->personRepository->all();

        return $this->sendResponse($people->toArray(), 'People retrieved successfully');
    }

    /**
     * @param CreatePersonAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/people",
     *      summary="Store a newly created Person in storage",
     *      tags={"Person"},
     *      description="Store Person",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Person that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Person")
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
     *                  ref="#/definitions/Person"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePersonAPIRequest $request)
    {
        $input = $request->all();

        $people = $this->personRepository->create($input);

        return $this->sendResponse($people->toArray(), 'Person saved successfully');
    }

    public function project(Request $request, $projectId)
    {
        $project=Project::find($projectId);
        $worksOnProject=WorksOnProject::where(['project_id'=>$projectId])->get();
        foreach ($worksOnProject as $wop){
            $wop->person=Person::find($wop->person_id);
        }
        return $this->sendResponse($worksOnProject->toArray(), 'Persons get success');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/people/{id}",
     *      summary="Display the specified Person",
     *      tags={"Person"},
     *      description="Get Person",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Person",
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
     *                  ref="#/definitions/Person"
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
        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return Response::json(ResponseUtil::makeError('Person not found'), 404);
        }

        return $this->sendResponse($person->toArray(), 'Person retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePersonAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/people/{id}",
     *      summary="Update the specified Person in storage",
     *      tags={"Person"},
     *      description="Update Person",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Person",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Person that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Person")
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
     *                  ref="#/definitions/Person"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePersonAPIRequest $request)
    {
        $input = $request->all();

        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return Response::json(ResponseUtil::makeError('Person not found'), 404);
        }

        $person = $this->personRepository->update($input, $id);

        return $this->sendResponse($person->toArray(), 'Person updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/people/{id}",
     *      summary="Remove the specified Person from storage",
     *      tags={"Person"},
     *      description="Delete Person",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Person",
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
        /** @var Person $person */
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            return Response::json(ResponseUtil::makeError('Person not found'), 404);
        }

        $person->delete();

        return $this->sendResponse($id, 'Person deleted successfully');
    }
}
