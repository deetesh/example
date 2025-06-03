<x-layout>
     <x-slot:heading> Login </x-slot:heading> 
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm"> 
  <img class="mx-auto h-10 w-auto" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST" action="/login">
    @csrf 
      <div>
        <x-label>Username</x-label>
        <div class="mt-2"> 
          <x-input  name="email" id="email" placeholder="example@example.com" :value="old('email')" ></x-input>
          <x-error input_name='email'></x-error>
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
        <x-label>Password</x-label> 
        </div>
        <div class="mt-2">
        <x-input name="password" id="password" type="password" placeholder="XXXXXXXXX"></x-input>
        <x-error input_name='password'></x-error>
         </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>
  </div>
</div>

</x-layout>