<x-layouts.app :title="__('Tambah Kode Risiko')">
    <div class="flex items-center justify-between mb-6">
        <flux:button
            :href="route('dashboard.kode-risiko.index')"
            variant="outline"
            icon:leading="arrow-left"
        >
            {{ __('Kembali') }}
        </flux:button>

        <flux:heading>
            {{ __('Tambah Kode Risiko') }}
        </flux:heading>
    </div>

    @if (session()->has('success'))
        <div class="mb-6">
            <flux:callout
                variant="success"
                icon="check-circle"
                heading="{{ session('success') }}"
            />
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6">
            <flux:callout
                variant="error"
                icon="check-circle"
                heading="{{ session('error') }}"
            />
        </div>
    @endif

    <form action="{{ route('dashboard.kode-risiko.store') }}" method="post" class="mt-6">
        @csrf
        @include('dashboard.kode-risiko._form')
    </form>
</x-layouts.app>
