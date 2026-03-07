<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\salles\StoreSalleRequest;
use App\Models\Salle;
use App\Services\SalleService;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function __construct(
        private SalleService $service
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("view",Salle::class);
        $salles = $this->service->getAllSalles();
        return view("admin.salle.index",compact("salles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $this->authorize("create",Salle::class);
       return view("admin.salle.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalleRequest $request)
    {
        $data = $request->validated();
        $salle = $this->service->createSalle($data);
        if (!$salle) {
            return redirect()->back()
            ->with("message","something went wrong");
        }
        return redirect()->route("salles.index")
            ->with("message","salle created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        $this->authorize("view",Salle::class);
        return view("admin.salle.show",compact("salle"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salle $salle)
    {
        $this->authorize("update",Salle::class);
        return view("admin.salle.edit",compact("salle"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSalleRequest $request, Salle $salle)
    {
        $data = $request->validated();
        $salleUpdate = $this->service->updateSalle($data,$salle);
        if (!$salleUpdate) {
            return redirect()->back()
            ->with("message","something went wrong");
        }
        return redirect()->route("salles.index")
            ->with("message","salle updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    { 
        $this->authorize("delete",Salle::class);
        $salle = $this->service->deleteSalle($salle);
        if (!$salle) {
            return redirect()->back()
            ->with("message","something went wrong");
        }
        return redirect()->route("salles.index")
            ->with("message","salle deleted successfuly");
    }
}
