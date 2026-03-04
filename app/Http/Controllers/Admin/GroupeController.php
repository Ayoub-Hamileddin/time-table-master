<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groupe\GroupeStoreRequest;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Services\GroupeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class GroupeController extends Controller
{

    public function __construct(
        private GroupeService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("view",Groupe::class);
        $groupes = $this->service->getAllGroupes();
        return view("admin.groupe.index",compact("groupes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , Groupe::class);
        return view("admin.groupe.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupeStoreRequest $request)
    {
         $data = $request->validated();
         $newGroupe = $this->service->createGroupe($data);
         if (!$newGroupe) {
             return redirect()->back()->with("message","something went wrong");
         }
         return Redirect()->route("groupes.index")  
                 ->with("message","groupe created successfuly");


    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $this->authorize("view",Groupe::class);
        $groupe = $this->service->getGroupeById($id);
        return view("admin.groupe.show",compact("groupe"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize("update",Groupe::class);
        $groupe = $this->service->getGroupeById($id);
        return view("admin.groupe.edit",compact("groupe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupeStoreRequest $request, int $id)
    {
        $data = $request->validated();
        $updatedGroupe=$this->service->updateGroupe( $id,$data );
       if (!$updatedGroupe) {
             return redirect()->back()->with("message","something went wrong");
         }
        return Redirect()->route("groupes.index")  
                 ->with("message","groupe updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $groupe)
    {
        $this->authorize("delete",Groupe::class);
        $this->service->deleteGroupe($groupe); 
        return redirect()->route("groupes.index")  
                 ->with("message","groupe deleted successfuly");
    }
}