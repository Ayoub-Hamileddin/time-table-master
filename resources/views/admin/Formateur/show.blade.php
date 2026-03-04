<x-app-layout>
    <p class="block text-sm text-slate-800">{{ $formateur->id }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->matricule }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->nom }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->prenom }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->email }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->telephone }}</p>
    <p class="block text-sm text-slate-800">{{ $formateur->specialite }}</p>
</x-app-layout>