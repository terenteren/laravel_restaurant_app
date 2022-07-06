<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">Table Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                          <input type="text" id="name" name="name" value="{{ $table->name }}"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            @error('name') border-red-400 @enderror" />
                        </div>
                        @error('name')
                          <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="sm:col-span-6">
                        <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number </label>
                        <div class="mt-1">
                          <input type="number" id="guest_number" name="guest_number" value="{{ $table->guest_number }}"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            @error('guest_number') border-red-400 @enderror" />
                        </div>
                        @error('guest_number')
                          <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="sm:col-span-6 pt-5">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                          <select id="status" name="status" 
                            class="form-multiselect block w-full mt-1 @error('status') border-red-400 @enderror">
                              {{-- @foreach (App\Enums\TableStatus::cases() as $status)
                              <option value="{{ $status->value }}" @selected($table->status->value== $status->value)>{{ $status->name }}</option>
                            @endforeach --}}
                            <option value="pending" @selected($table->status == "pending")>Pending</option>
                            <option value="avaliable" @selected($table->status == "avaliable")>Avalaiable</option>
                            <option value="unavaliable" @selected($table->status == "unavaliable")>Unavaliable</option>
                          </select>      
                        </div>
                        @error('status')
                          <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="sm:col-span-6 pt-5">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <div class="mt-1">
                          <select id="location" name="location" 
                            class="form-multiselect block w-full mt-1 @error('location') border-red-400 @enderror">
                            {{-- @foreach (App\Enums\TableLocation::cases() as $location)
                              <option value="{{ $location->value }}" @selected($table->location->value== $location->value)>{{ $location->name }}</option>
                            @endforeach --}}
                              <option value="front" @selected($table->location == "front")>Front</option>
                              <option value="inside" @selected($table->location == "inside")>Inside</option>
                              <option value="outside" @selected($table->location == "outside")>outside</option>
                          </select>      
                        </div>
                        @error('location')
                          <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mt-6 p-4">
                        <button type="submit" 
                          class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</x-admin-layout>
