<div class="mt-8">
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Users</h1>
      <input wire:model.debounce.300ms="search" id="search" name="search" class="block w-75 rounded-md border border-gray-300 bg-white ml-96 py-2 pl-2  leading-2 placeholder-gray-500 focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search" type="search">
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      Active
      <input wire:model="status" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                    <div class="flex items-center">
                        <button wire:click="sortBy('name')">Name</button>
                        <x-sort-icon
                            field="name"
                            :sortField="$sortField"
                            :sortAsc="$sortAsc"
                        />
                    </div>
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    <div class="flex items-center">
                        <button wire:click="sortBy('email')">Email</button>
                        <x-sort-icon
                            field="email"
                            :sortField="$sortField"
                            :sortAsc="$sortAsc"
                        />
                    </div>
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
              </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($users as $user)
              <tr>
                <td class="w-4/12 whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                  <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="font-medium text-gray-900">{{ $user->name }}</div>
                    </div>
                  </div>
                </td>
                <td class="w-4/12 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  <div class="text-gray-900">{{ $user->email  }}</div>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($user->status)
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                        Inactive
                    </span>
                @endif
                </td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $user->name }}</span></a>
                </td>
                
              </tr>
              @endforeach 
              <!-- More people... -->
            </tbody>
          </table>
        </div>
        <div class="mt-8">
                {{ $users->links() }}
            </div>
      </div>
    </div>
  </div>
</div>

</div>
