<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- En-tête avec titre et bouton de retour --}}
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Détails de la filière</h2>
                            <p class="text-gray-600 mt-1">Informations complètes de la filière sélectionnée</p>
                        </div>
                        <a href="{{ route('filieres.index') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Retour à la liste
                        </a>
                    </div>

                    {{-- Carte d'information principale --}}
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100 p-8 mb-8">
                        <div class="flex items-center mb-6">
                            <div class="p-3 bg-blue-600 rounded-lg shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 ml-4">{{ $filiere->nom }}</h3>
                        </div>

                        {{-- Grille des informations --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            {{-- Année --}}
                            <div class="bg-white rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 bg-green-100 rounded-lg">
                                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 ml-3">Année d'étude</span>
                                </div>
                                <p class="text-2xl font-bold text-gray-800 ml-12">
                                    @if($filiere->annee == '1')
                                        1ère année
                                    @else
                                        2ème année
                                    @endif
                                </p>
                            </div>

                            {{-- Nom --}}
                            <div class="bg-white rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 bg-purple-100 rounded-lg">
                                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm3 1h6v2H7V5zm6 4H7v2h6V9zm-6 4h6v2H7v-2z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 ml-3">Nom de la filière</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-800 ml-12 break-words">{{ $filiere->nom }}</p>
                            </div>

                            {{-- Option --}}
                            <div class="bg-white rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 bg-orange-100 rounded-lg">
                                        <svg class="w-5 h-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 ml-3">Option</span>
                                </div>
                                <div class="ml-12">
                                    @if($filiere->option)
                                        <p class="text-lg font-semibold text-gray-800">{{ $filiere->option }}</p>
                                    @else
                                        <div class="flex items-center">
                                            <span class="bg-gray-100 text-gray-500 text-sm px-3 py-1 rounded-full">
                                                Aucune option spécifiée
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Informations supplémentaires --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        {{-- Statistiques ou infos complémentaires --}}
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    Métadonnées
                                </span>
                            </h4>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                    <span class="text-sm text-gray-600">Date de création</span>
                                    <span class="text-sm font-medium text-gray-800">
                                        {{ $filiere->created_at ? $filiere->created_at->format('d/m/Y H:i') : 'Non disponible' }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                    <span class="text-sm text-gray-600">Dernière modification</span>
                                    <span class="text-sm font-medium text-gray-800">
                                        {{ $filiere->updated_at ? $filiere->updated_at->format('d/m/Y H:i') : 'Non disponible' }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between py-2">
                                    <span class="text-sm text-gray-600">ID de la filière</span>
                                    <span class="text-sm font-medium text-gray-800">#{{ $filiere->id }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Actions rapides --}}
                        <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg p-6 text-white">
                            <h4 class="text-sm font-semibold opacity-90 uppercase tracking-wider mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                                    </svg>
                                    Actions
                                </span>
                            </h4>
                            <div class="flex flex-col gap-3">
                                <a href="{{ route('filieres.edit', $filiere->id) }}" 
                                   class="inline-flex items-center justify-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition duration-300 ease-in-out font-medium">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                    Modifier cette filière
                                </a>
                                <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-300 ease-in-out font-medium">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>