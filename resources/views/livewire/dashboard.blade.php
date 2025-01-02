<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-8">Dashboard</h1>

    <!-- Events Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4">Events</h2>
        <ul class="list-disc pl-5 space-y-2">
            {{-- @dd($events) --}}
            @foreach ($events as $event)
                <li class="text-gray-700">
                    <strong>{{ $event->event_name }}</strong> - {{ $event->date }} ({{ $event->start_time }} - {{ $event->end_time }})
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Buttons -->
    <div class="flex justify-center space-x-4">
        <a href="{{ route('registerEvents') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
            Registered Events
        </a>
        <a href="{{ route('profile') }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
            Profile
        </a>
    </div>
</div>
