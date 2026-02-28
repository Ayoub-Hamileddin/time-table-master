<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\filiere\createFiliereRequest;
use App\Http\Requests\filiere\StoreFiliereRequest;
use App\Models\Filiere;
use App\Services\FiliereService;

use Illuminate\Http\Request;

class FiliereController extends Controller
{

    public function __construct(
        private FiliereService $filiereService
    ){

    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = $this->filiereService->listFiliers();
        return view("admin.filiere.index",compact("filieres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $this->authorize("create",Filiere::class);
       $filieres = Filiere::all();
       return view("admin.filiere.create",compact("filieres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFiliereRequest $request)
    {   
        $data = $request->validated();
        $data["annee"] = $request->annee ;
        $newFiliere = $this->filiereService->createFilieres($data);

        if (!$newFiliere) {
            return redirect()->back()->with("message","something went wrong");
        }
        return redirect()->route("filieres.index")
            ->with("message","filiere created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view("admin.filiere.show",compact("filiere"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
