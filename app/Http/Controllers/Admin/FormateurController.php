<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formateur\StoreFormateurRequest;
use App\Models\Formateur;
use App\Services\FormateurService;
use Illuminate\Http\Request;

class FormateurController extends Controller
{

    public function __construct(
        private FormateurService $service 
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("view",Formateur::class);
        $formateurs = $this->service->getAllFormateur();
        return view("admin.Formateur.index",compact("formateurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create",Formateur::class);
        return view("admin.Formateur.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurRequest $request)
    {
        $data = $request->validated();
        $newFormateur = $this->service->createFormateur($data);
        if (!$newFormateur) {
            return redirect()->back()
                ->with("message","something went wrong");
        }
        return redirect()->route("formateurs.index")
            ->with("message","formateur created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        $this->authorize("view",Formateur::class);
        return view("admin.Formateur.show",compact("formateur"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        $this->authorize("update",Formateur::class);
        return view("admin.Formateur.edit",compact("formateur"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFormateurRequest  $request, Formateur $formateur)
    {   
        $data = $request->validated();
        $formateur = $this->service->updateFormateur($data,$formateur);
         if (!$formateur) {
            return redirect()->back()
                ->with("message","something went wrong");
        }
        return redirect()->route("formateurs.index")
            ->with("message","formateur updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        $this->authorize("delete",Formateur::class );
        $formateur->delete();
         return redirect()->route("formateurs.index")
            ->with("message","formateur deleted successfuly");
    }
}
