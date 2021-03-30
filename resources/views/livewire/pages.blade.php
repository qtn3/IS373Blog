<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-7 pt-4 pb-7">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if($isOpen)
                @include('livewire.create')
            @endif
            <h2 class="text-4xl text-blue-200 mb-3">{{ $pages[0]->title }}</h2>
            <hr /><br />
            <br />
            <p class="text-1xl">{{ $pages[0]->body }}</p>
        </div>
    </div>
</div>
