<x-layout>
    <x-slot:heading>Job Offers</x-slot:heading>   
    <x-button href="/jobs/create">Create Job</x-button>

    <div class="mt-10">
    @foreach ($jobs as $job)
        <a href="/job_desc/{{$job['id']}}">
            <li>{{$job['title']}}. Salary {{$job['salary']}}.</li>
        </a>
    @endforeach 
</div>
 {{ $jobs->links() }}
   
</x-layout>