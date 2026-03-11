@props(["filieres"])
@vite( ['resources/css/app.css', 'resources/js/app.js'])

<div class="mx-5 mt-5">
    <div x-data="{selectedId: null, deleteModal: false}" class="relative flex flex-col w-[1100px] mx-auto h-auto overflow-hidden text-gray-700 bg-white shadow-xl rounded-xl bg-clip-border">
        
        {{-- En-tête avec titre et bouton d'ajout --}}
        <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Gestion des Filières</h2>
                <p class="text-sm text-gray-600 mt-1">Liste complète des filières de l'établissement</p>
            </div>
            <a href="{{ route("filieres.create") }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:ring-blue-300 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Nouvelle Filière
            </a>
        </div>

        {{-- Barre de recherche et filtres (optionnel) --}}
        <div class="p-4 bg-gray-50 border-b border-gray-200">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Rechercher une filière...">
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-200">
                        <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                        </svg>
                        Filtres
                    </button>
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-200">
                        <svg class="w-4 h-4 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Exporter
                    </button>
                </div>
            </div>
        </div>

        {{-- Tableau responsive --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-100 to-gray-50">
                        <th class="p-4 border-b border-gray-200">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">
                                ID
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Nom de la Filière
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Option
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Année
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200">
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Actions
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($filieres as $filiere)
                        <tr class="hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 group">
                            <td class="p-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-semibold text-blue-600 bg-blue-50 rounded-full group-hover:bg-blue-100 transition-colors">
                                    {{ $filiere->id }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $filiere->nom }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Code: FIL-{{ str_pad($filiere->id, 3, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </td>
                            <td class="p-4">
                                @if($filiere->option)
                                    <span class="px-3 py-1 text-xs font-medium text-purple-700 bg-purple-50 rounded-full">
                                        {{ $filiere->option }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-full">
                                        Tronc commun
                                    </span>
                                @endif
                            </td>
                            <td class="p-4">
                                @php
                                    $anneeText = $filiere->annee == 1 ? "1ère année" : "2ème année";
                                    $badgeColor = $filiere->annee == 1 ? "bg-green-50 text-green-700" : "bg-orange-50 text-orange-700";
                                @endphp
                                <span class="px-3 py-1 text-xs font-medium {{ $badgeColor }} rounded-full">
                                    {{ $anneeText }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center space-x-2">
                                    {{-- Bouton Voir --}}
                                    <a href="{{ route("filieres.show", $filiere->id) }}" 
                                       class="p-2 text-gray-500 bg-gray-100 rounded-lg hover:bg-gray-200 hover:text-gray-700 transition-all duration-200" 
                                       title="Voir les détails">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>

                                    {{-- Bouton Modifier --}}
                                    <a href="{{ route("filieres.edit", $filiere->id) }}" 
                                       class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 hover:text-blue-700 transition-all duration-200"
                                       title="Modifier">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>

                                    {{-- Bouton Supprimer --}}
                                    <button x-data @click="selectedId = {{ $filiere->id }}; $dispatch('open-modal', 'confirm-filiere-deletion')" 
                                            class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 hover:text-red-700 transition-all duration-200"
                                            title="Supprimer">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Aucune filière trouvée</h3>
                                    <p class="text-gray-500 mb-4">Commencez par ajouter une nouvelle filière</p>
                                    <a href="{{ route("filieres.create") }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Ajouter une filière
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modal de confirmation de suppression --}}
        <x-modal name="confirm-filiere-deletion" focusable>
            <form method="post" x-bind:action="'/filieres/' + selectedId" class="p-6">
                @csrf
                @method('delete')

                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">
                        {{ __('Confirmer la suppression') }}
                    </h2>
                    <p class="text-sm text-gray-500 mb-6">
                        {{ __('Êtes-vous sûr de vouloir supprimer cette filière ? Cette action est irréversible.') }}
                    </p>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <x-secondary-button x-on:click="$dispatch('close')" class="px-4 py-2">
                        {{ __('Annuler') }}
                    </x-secondary-button>

                    <x-danger-button class="px-4 py-2">
                        {{ __('Supprimer définitivement') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>

        {{-- Pagination --}}
        @if($filieres->hasPages())
            <div class="p-4 border-t border-gray-200 bg-gray-50">
                {{ $filieres->links() }}
            </div>
        @endif

        {{-- Statistiques rapides --}}
        <div class="grid grid-cols-4 gap-4 p-4 bg-gray-50 border-t border-gray-200">
            <div class="text-center">
                <span class="text-2xl font-bold text-blue-600">{{ $filieres->total() }}</span>
                <p class="text-xs text-gray-500">Total filières</p>
            </div>
            <div class="text-center">
                <span class="text-2xl font-bold text-green-600">{{ $filieres->where('annee', 1)->count() }}</span>
                <p class="text-xs text-gray-500">1ère année</p>
            </div>
            <div class="text-center">
                <span class="text-2xl font-bold text-orange-600">{{ $filieres->where('annee', 2)->count() }}</span>
                <p class="text-xs text-gray-500">2ème année</p>
            </div>
            <div class="text-center">
                <span class="text-2xl font-bold text-purple-600">{{ $filieres->whereNotNull('option')->count() }}</span>
                <p class="text-xs text-gray-500">Avec option</p>
            </div>
        </div>
    </div>
</div>