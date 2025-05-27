<x-layout>
    <x-slot:heading>
        <h1>Edit Job : {{$aJobData->title}}</h1> 
    </x-slot:heading>    
<form method="POST" action="/jobs/{{$aJobData->id}}">
    @csrf
    @method('PATCH')
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">workcation.com/</div>
              <input value="{{$aJobData->title}}" type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Developer">
            </div>
          </div>
          <div class="mt-2">
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">workcation.com/</div>
              <input value="{{$aJobData->salary}}" type="text" name="salary" id="salary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="$50, 000">
            </div>
          </div>
          <div class="mt-2">
            @error('salary')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
        </div> 
        <div class="sm:col-span-4">
          <label for="hour" class="block text-sm/6 font-medium text-gray-900">Hour per day</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">workcation.com/</div>
              <input value="{{$aJobData->hour}}" type="text" name="hour" id="hour" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="8">
            </div>
          </div>
          <div class="mt-2">
            @error('hour')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- <div class="mt-2">
        @if ($errors->any())
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="text-red-500">{{ $error }}</li>
              @endforeach
          </ul>
        @endif -->
      </div>
        
    </div> 
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/job_desc/{{$aJobData->id}}" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
    <!-- edit btn -->
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    <!-- delete btn -->
    <button form="delete-form" type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
  </div>
</form>


<form method="POST" action="/jobs/{{$aJobData->id}}" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')
</form>

</x-layout>