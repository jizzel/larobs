<x-layout>
    <x-slot:heading>
        Job Listing
    </x-slot:heading>
    Jobs
    <br>
    <ul>
    @foreach($jobs as $job)
            <li>
                <a href="/job/{{ $job['id'] }}" class="text-blue hover:underline">
                    <strong>{{ $job['title'] }}: </strong>Pays {{ $job['salary'] }} per year.
                </a>
            </li>
    @endforeach
    </ul>
</x-layout>
