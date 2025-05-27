<x-layout>
    <x-slot:heading>
        <h1>Job Description</h1> 
    </x-slot:heading>    
         <strong>{{$aJobData['title']}}</strong></br>
         <p>Salary : {{$aJobData['salary']}}.</p>
         <p>Hours : {{$aJobData['hour']}}.</p>
          

         <x-button href='/jobs/{{$aJobData->id}}/edit'>Edit Job</x-button>
</x-layout>