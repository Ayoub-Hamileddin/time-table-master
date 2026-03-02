<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\filiere\StoreFiliereRequest;
use App\Http\Requests\Filiere\UpdateFiliereRequest;
use App\Models\Filiere;
use App\Services\FiliereService;



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
       $filieres = Filiere::all();
       return view("admin.filiere.create",compact("filieres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFiliereRequest $request)
    {   
        $this->authorize("create",Filiere::class);

        $data = $request->validated();
        $data["annee"] = $request->annee ;
        $newFiliere = $this->filiereService->createFiliere($data);

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
    public function edit(Filiere $filiere)
    {   
       return view("admin.filiere.edit",compact("filiere"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFiliereRequest $request, Filiere $filiere)
    {
        $this->authorize("update",$filiere);

        $data = $request->validated();
        $this->filiereService->updateFiliere($data,$filiere);
        return redirect()->route("filieres.index")
            ->with("message","filiere updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $this->authorize("delete",$filiere);
        $filiere->delete();
        return redirect()->route("filieres.index")
            ->with("message","filiere deleted successfuly");
    }

    public function getOptionAnnee(int $annee){
        return $this->filiereService->getOptions($annee);
    }
}
