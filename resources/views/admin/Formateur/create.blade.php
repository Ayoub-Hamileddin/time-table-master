<x-app-layout>
<form method="POST" action="{{ route("formateurs.store") }}">
    @csrf
        <div>
            <x-input-label for="matricule" :value="__('Matricule')" />
            <x-text-input id="matricule" name="matricule" type="text"
                class="mt-1 block w-full"
                :value="old('matricule')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('matricule')" />
        </div>
    
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text"
                class="mt-1 block w-full"
                :value="old('nom')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
        </div>
    
        <div>
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" name="prenom" type="text"
                class="mt-1 block w-full"
                :value="old('prenom')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>
    
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full"
                :value="old('email')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    
        <div>
            <x-input-label for="telephone" :value="__('Téléphone')" />
            <x-text-input id="telephone" name="telephone" type="text"
                class="mt-1 block w-full"
                :value="old('telephone')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>
    
        <div>
            <x-input-label for="specialite" :value="__('Spécialité')" />
            <x-text-input id="specialite" name="specialite" type="text"
                class="mt-1 block w-full"
                :value="old('specialite')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('specialite')" />
        </div>
        <x-primary-button class="mt-3" >Submit</x-primary-button>
</form>
</x-app-layout>