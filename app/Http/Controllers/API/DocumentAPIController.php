<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocumentAPIRequest;
use App\Http\Requests\API\UpdateDocumentAPIRequest;
use App\Models\Document;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocumentController
 * @package App\Http\Controllers\API
 */

class DocumentAPIController extends InfyOmBaseController
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/documents",
     *      summary="Get a listing of the Documents.",
     *      tags={"Document"},
     *      description="Get all Documents",
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
     *                  @SWG\Items(ref="#/definitions/Document")
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
        $this->documentRepository->pushCriteria(new RequestCriteria($request));
        $this->documentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $documents = $this->documentRepository->all();

        return $this->sendResponse($documents->toArray(), 'Documents retrieved successfully');
    }

    /**
     * @param CreateDocumentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/documents",
     *      summary="Store a newly created Document in storage",
     *      tags={"Document"},
     *      description="Store Document",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Document that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Document")
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
     *                  ref="#/definitions/Document"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDocumentAPIRequest $request)
    {
        $input = $request->all();

        $documents = $this->documentRepository->create($input);

        return $this->sendResponse($documents->toArray(), 'Document saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/documents/{id}",
     *      summary="Display the specified Document",
     *      tags={"Document"},
     *      description="Get Document",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Document",
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
     *                  ref="#/definitions/Document"
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
        /** @var Document $document */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            return Response::json(ResponseUtil::makeError('Document not found'), 404);
        }

        return $this->sendResponse($document->toArray(), 'Document retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDocumentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/documents/{id}",
     *      summary="Update the specified Document in storage",
     *      tags={"Document"},
     *      description="Update Document",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Document",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Document that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Document")
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
     *                  ref="#/definitions/Document"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDocumentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Document $document */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            return Response::json(ResponseUtil::makeError('Document not found'), 404);
        }

        $document = $this->documentRepository->update($input, $id);

        return $this->sendResponse($document->toArray(), 'Document updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/documents/{id}",
     *      summary="Remove the specified Document from storage",
     *      tags={"Document"},
     *      description="Delete Document",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Document",
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
        /** @var Document $document */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            return Response::json(ResponseUtil::makeError('Document not found'), 404);
        }

        $document->delete();

        return $this->sendResponse($id, 'Document deleted successfully');
    }
}
