<x-layouts.app :title="__('Kode Risiko')">
    <div class="flex items-center justify-between mb-6">
        <flux:heading>
            {{ __('Kode Risiko') }}
        </flux:heading>

        <flux:button
            :href="route('dashboard.kode-risiko.create')"
            icon:trailing="plus"
        >
            {{ __('Tambah Kode Risiko') }}
        </flux:button>
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

    <livewire:kode-risiko-table />
</x-layouts.app>
