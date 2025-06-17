<x-filament::card>
    <div class="text-xl font-bold">Total Users: {{ \App\Models\User::count() }}</div>
    <div class="text-gray-600 mb-4">All registered users</div>

    @if (session()->has('success'))
        <div class="text-green-600 font-semibold mb-2">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="saveToBlockchain">
        <x-filament::button type="submit" color="success" icon="heroicon-o-cloud-upload">
            SAVE IN BLOCKCHAIN
        </x-filament::button>
    </form>
</x-filament::card>
