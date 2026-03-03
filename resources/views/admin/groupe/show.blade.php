<x-app-layout>
        <p>code:{{ $groupe->code}}</p>
        <p>nom:{{  $groupe->filiere->nom }}</p>
        @if ($groupe->filiere->option)
             <p>option:{{  $groupe->filiere->option }}</p>
        @else
           <p>option :  Tron commun</p>
        @endif
        <p>annee:{{ $groupe->annee }}</p>
</x-app-layout>