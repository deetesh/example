<x-layout>
     <x-slot:heading>
       Create Account
    </x-slot:heading>

    
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST">
      @csrf
      <div>
        <x-label>Username</x-label>
        <div class="mt-2"> 
          <x-input name="name" id="name" placeholder="John"></x-input>
          <x-error input_name='name'/>
        </div>
      </div>
      <div>
        <x-label>Email</x-label>
        <div class="mt-2"> 
          <x-input  name="email" id="email" placeholder="example@example.com"></x-input>
          <x-error input_name='email'/>
        </div>
      </div>
      <div>
        <x-label>Confirm Email</x-label>
        <div class="mt-2"> 
          <x-input  name="email_confirmation" id="email_confirmation" placeholder="example@example.com"></x-input>
          <x-error input_name='email_confirmation'/>
        </div>
      </div>
      <div>
        <x-label>Password</x-label>
        <div class="mt-2"> 
          <x-input  type="password" name="password" id="password" placeholder="XXXXXXXXX"></x-input>
           <x-error input_name='password'/>
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Account</button>
      </div>
    </form>
  </div>
</div>
</x-layout>