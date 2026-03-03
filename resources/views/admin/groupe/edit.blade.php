@vite(["resources/js/groupes/create.js"])
<x-app-layout>
    <form action="{{ route("groupes.update",$groupe->id) }}" method="POST">
        @csrf
        @method("PUT")
        {{-- code --}}
        <div>
            <x-input-label for="code" :value="__('Code')" />
            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full" :value="old('code')??$groupe->code" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        {{-- Annee --}}
        <div class="w-full max-w-sm min-w-[200px]"> 
            <label class="block mb-1 text-sm text-slate-800">
                Annee
             </label>     
            <div class="relative">
                <select
                    id="annee"
                    name="annee"
                    value=""
                    class="w-full  bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none bg-none cursor-pointer">
                    <option disabled value="" selected>choisir une annee</option>
                    <option  {{ old('annee', $groupe->annee ?? '') == 1 ? 'selected' : '' }} value="1">1er annee</option>
                    <option {{ old('annee', $groupe->annee ?? '') == 2 ? 'selected' : '' }} value="2">2eme annee</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>
            </div>
        </div>
        {{-- filiere id --}}
        <div class="w-full max-w-sm min-w-[200px]"> 
            <label class="block mb-1 text-sm text-slate-800">
                Filiere
             </label>     
            <div class="relative">
                <select
                    id="filiere_id"
                    name="filiere_id"
                    class="w-full  bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none bg-none cursor-pointer">
                    <option disabled {{ old('filiere_id', $groupe->filiere->nom ?? '')}} value="" selected>{{ $groupe->filiere->nom ."option :". $groupe->filiere->option??"Tron commun" ?? "choisir une filiers" }}</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>
            </div>
        </div>
        
        {{-- Nom --}}       
        {{-- <div class="w-full max-w-sm min-w-[200px] mt-3">
            <input name="nom" value="{{ old("nom")??$groupe->filiere->nom }}" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Enter option filiere">
        </div> --}}

        {{-- Option --}}
        {{-- <div class="w-full max-w-sm min-w-[200px] mt-3">
            <input name="option" value="{{ old("option")??$groupe->filiere->option}}" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Enter option filiere">
        </div> --}}
        <x-primary-button class="mt-3" >Submit</x-primary-button>
    </form>
</x-app-layout>