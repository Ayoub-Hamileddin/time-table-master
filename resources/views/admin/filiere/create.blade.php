<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- En-tête --}}
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Créer une nouvelle filière</h2>
                            <p class="text-gray-600 mt-1">Ajoutez une nouvelle filière à votre établissement</p>
                        </div>
                        <a href="{{ route('filieres.index') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Retour à la liste
                        </a>
                    </div>

                    {{-- Formulaire --}}
                    <form action="{{ route("filieres.store") }}" method="POST" class="space-y-8">
                        @csrf
                        
                        {{-- Carte du formulaire --}}
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 p-8 shadow-sm">
                            {{-- En-tête de la carte --}}
                            <div class="flex items-center mb-6 pb-4 border-b border-gray-200">
                                <div class="p-2 bg-blue-600 rounded-lg shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 ml-3">Informations de la filière</h3>
                            </div>

                            {{-- Grille des champs --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Année --}}
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                                        Année d'étude <span class="text-red-500">*</span>
                                    </label>     
                                    <div class="relative">
                                        <select
                                            name="annee"
                                            class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease appearance-none cursor-pointer @error('annee') border-red-500 @enderror"
                                        >
                                            <option disabled value="" selected>Choisir une année</option>
                                            <option value="1" {{ old('annee') == '1' ? 'selected' : '' }}>1ère année</option>
                                            <option value="2" {{ old('annee') == '2' ? 'selected' : '' }}>2ème année</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('annee')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Sélectionnez l'année d'étude de la filière</p>
                                </div>

                                {{-- Nom --}}
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                                        Nom de la filière <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="nom" 
                                        value="{{ old('nom') }}"
                                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease @error('nom') border-red-500 @enderror" 
                                        placeholder="Ex: Génie Informatique"
                                    >
                                    @error('nom')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Entrez le nom complet de la filière</p>
                                </div>

                                {{-- Option (pleine largeur) --}}
                                <div class="w-full md:col-span-2">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                                        Option <span class="text-gray-500 text-xs">(Optionnel)</span>
                                    </label>
                                    <input 
                                        name="option" 
                                        value="{{ old('option') }}"
                                        class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease @error('option') border-red-500 @enderror" 
                                        placeholder="Ex: Développement Web, Réseaux, Systèmes embarqués, etc."
                                    >
                                    @error('option')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Laissez vide si aucune option spécifique</p>
                                </div>
                            </div>
                        </div>

                        {{-- Aperçu en direct --}}
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                            <h4 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Conseils de saisie
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                <div class="flex items-start space-x-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-600">Le nom doit être unique et descriptif</span>
                                </div>
                                <div class="flex items-start space-x-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-600">L'option permet de préciser la spécialité</span>
                                </div>
                                <div class="flex items-start space-x-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-600">Tous les champs marqués * sont obligatoires</span>
                                </div>
                            </div>
                        </div>

                        {{-- Boutons d'action --}}
                        <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200">
                            <button type="reset" 
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                                Réinitialiser
                            </button>
                            <x-primary-button class="px-6 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                                <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Créer la filière
                            </x-primary-button>
                        </div>
                    </form>

                    {{-- Messages de validation --}}
                    @if($errors->any())
                        <div class="mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <h5 class="text-sm font-semibold text-red-800">Veuillez corriger les erreurs suivantes :</h5>
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>