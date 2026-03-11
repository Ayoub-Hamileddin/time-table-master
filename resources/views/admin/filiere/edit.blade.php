<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Header --}}
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800">Modifier la filière</h2>
                        <p class="text-gray-600 mt-1">Modifiez les informations de la filière sélectionnée</p>
                    </div>

                    <form action="{{ route("filieres.update", $filiere->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method("PUT")
                        
                        {{-- Grid layout for form fields --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Annee --}}
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    Année d'étude <span class="text-red-500">*</span>
                                </label>     
                                <div class="relative">
                                    <select
                                        name="annee"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease appearance-none cursor-pointer @error('annee') border-red-500 @enderror"
                                    >
                                        <option disabled value="" selected>Choisir une année</option>
                                        <option value="1" {{ old('annee', $filiere->annee) == '1' ? 'selected' : '' }}>1ère année</option>
                                        <option value="2" {{ old('annee', $filiere->annee) == '2' ? 'selected' : '' }}>2ème année</option>
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
                            </div>

                            {{-- Nom --}}       
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    Nom de la filière <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    name="nom" 
                                    value="{{ old('nom', $filiere->nom) }}" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease @error('nom') border-red-500 @enderror" 
                                    placeholder="Ex: Génie Informatique"
                                >
                                @error('nom')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Option --}}
                            <div class="w-full md:col-span-2">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    Option <span class="text-gray-500 text-xs">(Optionnel)</span>
                                </label>
                                <input 
                                    name="option" 
                                    value="{{ old('option', $filiere->option) }}" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 transition duration-300 ease @error('option') border-red-500 @enderror" 
                                    placeholder="Ex: Développement Web, Réseaux, etc."
                                >
                                @error('option')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Laissez vide si aucune option spécifique</p>
                            </div>
                        </div>

                        {{-- Current values summary --}}
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                            <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Valeurs actuelles
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600">Année:</span>
                                    <span class="font-medium text-gray-900 ml-2">{{ $filiere->annee == '1' ? '1ère année' : '2ème année' }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Nom:</span>
                                    <span class="font-medium text-gray-900 ml-2">{{ $filiere->nom }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Option:</span>
                                    <span class="font-medium text-gray-900 ml-2">{{ $filiere->option ?? 'Aucune' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Action buttons --}}
                        <div class="flex items-center justify-end gap-4 mt-8 pt-4 border-t border-gray-200">
                            <a href="{{ route('filieres.index') }}" 
                               class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                                Annuler
                            </a>
                            <x-primary-button class="px-6 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                                <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293z"></path>
                                </svg>
                                Mettre à jour
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>