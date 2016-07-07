<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Repositories\PersonRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PersonController extends InfyOmBaseController
{
    /** @var  PersonRepository */
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Person.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->email=="admin@admin.admin") {
            $this->personRepository->pushCriteria(new RequestCriteria($request));
            $people = $this->personRepository->all();

            return view('people.index')
                ->with('people', $people);
        }else{
            Flash::error("You don't have access to that");
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function create()
    {
        $users = \App\User::where([])->get();
        $u = Person::usersToSelectValues($users);
        return view('people.create', ['users' => $u]);
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePersonRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonRequest $request)
    {
        $input = $request->all();

        $person = $this->personRepository->create($input);

        Flash::success('Person saved successfully.');

        return redirect(route('people.index'));
    }

    /**
     * Display the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.edit')->with('person', $person);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param  int $id
     * @param UpdatePersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonRequest $request)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success('Person updated successfully.');

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $this->personRepository->delete($id);

        Flash::success('Person deleted successfully.');

        return redirect(route('people.index'));
    }
}
