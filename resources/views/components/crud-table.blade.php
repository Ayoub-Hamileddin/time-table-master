@props(["filieres"])
@vite( ['resources/css/app.css', 'resources/js/app.js'])

<div class="mx-5 mt-5">
    <div x-data="{selectedId:null}" class="relative flex flex-col w-[1100px] mx-auto h-auto overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
       <div class="w-[100%] flex justify-end my-2">
         <a href="{{ route("filieres.create") }}"  class="mr-3 py-2 px-4 text-white  shadow-md bg-blue-600 hover:bg-blue-700 rounded-lg hover:shadow-lg ">
             Add Filiere
         </a>
       </div>
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Id
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Group Name
                        </p>
                    </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50">
                <p class="block text-sm font-normal leading-none text-slate-500">
                  Option
                </p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50">
                <p class="block text-sm font-normal leading-none text-slate-500">
                  Years
                </p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 ">
                Actions
              </th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($filieres as $filiere )
            <tr class="hover:bg-slate-50 border-b border-slate-200">
              <td class="p-4 py-5">
                <p class="block text-sm text-slate-800">{{ $filiere->id }}</p>
              </td>
              <td class="p-4 py-5">
                <p class="block text-sm text-slate-800">{{ $filiere->nom }}</p>
              </td>
              <td class="p-4 py-5">
                  <p class="block text-sm text-slate-800">
                      @if (!$filiere->option)
                      Tron commun
                      @endif
                      {{ $filiere->option }}
                    </p>
                </td>
                <td class="p-4 py-5">
                  <p class="block text-sm text-slate-800">
                    @php
                       echo $filiere->annee === 1 ? "1er annee" : "2eme annee" ;
                    @endphp
                  </p>
                </td>
              <td class="p-4 py-5 font-medium text-gray-900 whitespace-nowrap ">
                <div class="flex items-center space-x-4">
                    <a  href="{{ route("filieres.edit" , $filiere->id) }}" type="button" data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300   ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route("filieres.show",$filiere->id) }}" type="button" data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                        </svg>
                        Preview
                    </a>
                    <a  x-data x-on:click.prevent="
                    selectedId = {{ $filiere->id }};
                    $dispatch('open-modal', 'confirm-user-deletion')  "  type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="flex items-center text-red-700 hover:text-white border cursor-pointer border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center  ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Delete
                    </a>
                </div>
            </td>
         </tr>
        @endforeach
          </tbody>
        </table>
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
          <form method="post"  x-bind:action="'/filieres/' + selectedId" class="p-6">
              @csrf
              @method('delete')

              <h2 class="text-lg font-medium text-gray-900">
                  {{ __('Are you sure you want to delete this Filiere?') }}
              </h2>

              <div class="mt-6 flex justify-end">
                  <x-secondary-button x-on:click="$dispatch('close')">
                      {{ __('Cancel') }}
                  </x-secondary-button>

                  <x-danger-button class="ms-3">
                      {{ __('Delete Filiere') }}
                  </x-danger-button>
              </div>
          </form>
        </x-modal>
        <div class="m-6">
            {{ $filieres->links() }}
        </div>
      </div>
</div>