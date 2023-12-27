<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Quản lý workspace
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!$issetworkspace)
                <form action="{{ route('createWorkspace') }}" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="workspace_name">
                    <button>Gửi</button>
                </form>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                @foreach ($workspace as $item)
                    <a href="{{ route('welcome', $item->workspace_name) }}">{{ $item->workspace_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
