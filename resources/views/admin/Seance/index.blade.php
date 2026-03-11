<x-app-layout>
        @vite( ['resources/js/seances/create.js'])
    @php
        $jours = [
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
            "Samedi"
        ];
        $creneaux = [
            "08:30"=>"11:00",
            "11:00"=>"13:30",
            "13:30"=>"16:00",
            "16:00"=>"18:30",
        ];

    @endphp
  <div class="bg-gray-50 p-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Emploi du Temps</h1>
                <div class="relative">
                    <select
                        id="seance_groupe"
                        class="w-[300px] mb-5 bg-transparent placeholder:text-slate-400  text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md   cursor-pointer">
                        <option disabled value="" selected>choisir une groupe</option>
                        @foreach ($groupes as $groupe )
                            <option value="{{ $groupe->id }}">{{ $groupe->code }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <button class="border border-slate-600 px-4 py-2 bg-white  hover:bg-slate-700 transition-colors rounded-lg hover:text-white  " id="exportPdf">Export PDF</button>
        </div>
        
        <div id="planning" class="overflow-x-auto shadow-lg rounded-lg ">
            <table class="w-full border-collapse bg-white">
                <!-- Header -->
                <thead>
                    <tr class="bg-gradient-to-r from-cyan-500 to-cyan-600">
                        <th class="border border-cyan-600 px-4 py-3 text-left text-white font-semibold">Jour / Horaire</th>
                        @foreach ($creneaux as $key => $creneau )
                            <th class="border border-cyan-600 px-4 py-3 text-center text-white font-semibold">
                                <div class="flex justify-between items-center">
                                    <span>{{ $key }}</span>
                                    <span>{{ $creneau }}</span>
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                
                <!-- Body -->
                <tbody>
                    @foreach ($jours as $jour )
                        <tr class="hover:bg-gray-50 transition-colors">
                        <td class="border border-gray-300 px-4 py-3 font-semibold bg-gray-100">{{ $jour }}</td>
                         @foreach ($creneaux as $creneau )
                            @php
                                $seance = ($seanceByGroupe ??collect())
                                            ->where("jour",$jour)
                                            ->where("creneau",$loop->index + 1)
                                            ->first();
                            @endphp
                            <td 
                           x-data x-on:click.prevent="
                            $dispatch('open-modal', 'seance-modal')"  data-modal-target="seance"
                            data-jour="{{ $jour }}" data-creneau="{{ $loop->index + 1 }}"   class="border w-[265px] h-[75px]  border-gray-300 px-4 py-3 text-center text-gray-400 schedule-cell cursor-pointer <?php echo $seance ?  "bg-[#567cba]" : ""  ; ?>  ">
                               @if ($seance)
                                    <div class="text-white">
                                        <p class="capitalize">Formateur : {{ $seance->formateur->nom ." ".$seance->formateur->prenom  }}</p>
                                        <p>Salle : {{ $seance->salle->code }}</p>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <x-modal name="seance-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="POST" action="{{ route("seances.store") }}"  class="p-6">
                    @csrf
                    
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Fill Form of seance!') }}
                    </h2>
                    <input type="hidden" name="jour" id="jourInput" >
                    <input type="hidden" name="creneau" id="creneauInput" >

                    <div class="flex gap-3 flex-wrap mt-5">
                        <input type="hidden" name="groupe_id" id="groupe_id" >
                            <div class="w-full"> 
                                <label class="block mb-1 text-sm text-slate-800">
                                    Salle
                                </label>     
                                <div class="relative">
                                    <select
                                        id="salle"
                                        name="salle_id"
                                        class="w-full  bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none bg-none cursor-pointer">
                                        <option disabled value="" selected>choisir une salle</option>
                                        @foreach ($salles as $salle )
                                            <option value="{{ $salle->id }}">{{ $salle->code }}</option>
                                        @endforeach
                                    </select>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full"> 
                                <label class="block mb-1 text-sm text-slate-800">
                                    Formateur
                                </label>     
                                <div class="relative">
                                    <select
                                        id="formateur"
                                        name="formateur_id"
                                        class="w-full  bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none bg-none cursor-pointer">
                                        <option disabled value="" selected>choisir un formateur</option>
                                        @foreach ($formateurs as $formateur )
                                            <option value="{{ $formateur->id }}">{{ $formateur->nom." ".$formateur->prenom }}</option>
                                        @endforeach
                                    </select>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </div>
                            </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class="ms-3">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-modal>
        </div>
        

    </div>
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</x-app-layout>