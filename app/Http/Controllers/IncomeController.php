<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Project;
use App\Repositories\IncomeRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Session;

class IncomeController extends InfyOmBaseController
{
    /** @var  IncomeRepository */
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Income.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->incomeRepository->pushCriteria(new RequestCriteria($request));
        $incomes = $this->incomeRepository->all();

        return view('incomes.index')
            ->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        $project = Project::getProjectSelectArray(Session::get('projects'));
        return view('incomes.create', ['projects' => $project]);
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = $request->all();

        $income = $this->incomeRepository->create($input);

        Flash::success('Income saved successfully.');

        return redirect(route('projects.show', $income->project_id));
    }

    /**
     * Display the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);
        $project = Project::getProjectSelectArray(Session::get('projects'));

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.edit')->with('income', $income)->with('projects', $project);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param  int $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income = $this->incomeRepository->update($request->all(), $id);

        Flash::success('Income updated successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $income = $this->incomeRepository->findWithoutFail($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $this->incomeRepository->delete($id);

        Flash::success('Income deleted successfully.');

        return redirect(route('incomes.index'));
    }
}
