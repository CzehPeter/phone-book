<?php

namespace App\Http\Controllers;

use App\Models\Phonebook;
use App\Services\PhonebookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\PhonebookCreateRequest;
use App\Http\Requests\PhonebookUpdateRequest;



class PhonebookController extends Controller
{
    /**
     * @var PhonebookService
     */
    private $phonebook;

    /**
     *
     */
    public function __construct()
    {
        $this->phonebook = new PhonebookService();
    }

    /**
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render(
            'Phonebook',

        );
    }

    /**
     * @param  int     $page
     * @param  string  $search
     * @param  string  $orderBy
     * @param  string  $orderDirection
     * @return JsonResponse
     */
    public function load(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $this->phonebook->getPhonebook(
                $request->search ?? '',
                $request->orderBy ?? 'phonebook.name',
                $request->orderDirection ?? 'asc',
                $request->page ?? 1,
                $request->perPage ?? 20,
                true
            )
        );
    }

    /**
     * @return view
     */
    public function create()
    {
        dd('CREATE');
        return view('phonebook.create');
    }

    /**
     * @param  PhonebookCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhonebookCreateRequest $request)
    {
        dd('STORE');
        $this->phonebook->create($request->all());
        return redirect()->route('phonebook.index')->with('success', 'Phonebook created successfully.');
    }

    /**
     * @param  Phonebook  $phonebook
     * @return view
     */
    public function edit(Phonebook $phonebook)
    {
        dd('EDIT');
        return view('phonebook.edit', compact('phonebook'));
    }

    /**
     * @param  PhonebookUpdateRequest  $request
     * @param  Phonebook               $phonebook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PhonebookUpdateRequest $request, Phonebook $phonebook)
    {
        dd('UPDATE');
        $this->phonebook->update($request->all());
        return redirect()->route('phonebook.index')->with('success', 'Phonebook updated successfully.');
    }

    /**
     * @param  Phonebook  $phonebook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Phonebook $phonebook)
    {
        dd('DESTROY');
        $this->phonebook->delete($phonebook);
        return back();
    }
}
