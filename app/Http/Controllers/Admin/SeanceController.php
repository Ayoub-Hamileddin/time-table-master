<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seance\StoreSeanceRequest;
use App\Models\Seance;
use App\Services\FormateurService;
use App\Services\GroupeService;
use App\Services\SalleService;
use App\Services\SeanceService;
use Illuminate\Http\Request;

class SeanceController extends Controller
{

    public function __construct(
        private SeanceService $seanceService,
        private FormateurService $formateurService,
        private GroupeService $groupeService,
        private SalleService $salleService,
    ){

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize("view",Seance::class);
        $formateurs = $this->formateurService->getAllWithoutPagination();
        $groupes = $this->groupeService->getAllWithoutPagination();
        $salles = $this->salleService->getAllWithoutPagination();

        $seanceByGroupe = collect();
        if ($request->groupeId) {
            $seanceByGroupe = $this->seanceService
                    ->getSeanceByGroupe($request->groupeId);
        }
        
        return view("admin.Seance.index",compact("formateurs","groupes","salles","seanceByGroupe"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeanceRequest $request)
    {
        $data = $request->validated();

        $message = $this->seanceService->createOrUpdateSeance($data);
        return redirect()->back()
                ->with("message",$message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
