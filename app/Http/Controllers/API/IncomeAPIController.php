<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests\API\CreateIncomeAPIRequest;
use App\Http\Requests\API\UpdateIncomeAPIRequest;
use App\Models\Income;
use App\Repositories\IncomeRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IncomeController
 * @package App\Http\Controllers\API
 */
class IncomeAPIController extends InfyOmBaseController
{
    /** @var  IncomeRepository */
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
        
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/incomes",
     *      summary="Get a listing of the Incomes.",
     *      tags={"Income"},
     *      description="Get all Incomes",
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
     *                  @SWG\Items(ref="#/definitions/Income")
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
        $this->incomeRepository->pushCriteria(new RequestCriteria($request));
        $this->incomeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $incomes = $this->incomeRepository->all();

        return $this->sendResponse($incomes->toArray(), 'Incomes retrieved successfully');
    }

    public function project(Request $request, $projectId)
    {
        $incomes = Income::where(['project_id' => $projectId])->get();
        return $this->sendResponse($incomes->toArray(), 'Incomes retrieved successfully');
    }

    /**
     * @param CreateIncomeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/incomes",
     *      summary="Store a newly created Income in storage",
     *      tags={"Income"},
     *      description="Store Income",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Income that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Income")
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
     *                  ref="#/definitions/Income"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIncomeAPIRequest $request)
    {
        $input = $request->all();

        $incomes = $this->incomeRepository->create($input);

        return $this->sendResponse($incomes->toArray(), 'Income saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/incomes/{id}",
     *      summary="Display the specified Income",
     *      tags={"Income"},
     *      description="Get Income",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Income",
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
     *                  ref="#/definitions/Income"
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
        /** @var Income $income */
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            return Response::json(ResponseUtil::makeError('Income not found'), 404);
        }

        return $this->sendResponse($income->toArray(), 'Income retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIncomeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/incomes/{id}",
     *      summary="Update the specified Income in storage",
     *      tags={"Income"},
     *      description="Update Income",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Income",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Income that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Income")
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
     *                  ref="#/definitions/Income"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIncomeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Income $income */
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            return Response::json(ResponseUtil::makeError('Income not found'), 404);
        }

        $income = $this->incomeRepository->update($input, $id);

        return $this->sendResponse($income->toArray(), 'Income updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/incomes/{id}",
     *      summary="Remove the specified Income from storage",
     *      tags={"Income"},
     *      description="Delete Income",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Income",
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
        /** @var Income $income */
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            return Response::json(ResponseUtil::makeError('Income not found'), 404);
        }

        $income->delete();

        return $this->sendResponse($id, 'Income deleted successfully');
    }
}
