@props([
    'kodeRisiko' => null,
])

<div class="grid grid-cols-12 grid-flow-row gap-4">
    <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-3">
        <flux:field>
            <flux:input
                label="Nama Kasatker"
                name="nama_kasatker"
                value="{{ old('nama_kasatker', $kodeRisiko?->nama_kasatker) }}"
                required
            />
            <flux:error name="nama_kasatker" />
        </flux:field>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-3">
        <flux:field>
            <flux:input
                label="Kode Risiko"
                name="kode_risiko"
                value="{{ old('kode_risiko', $kodeRisiko?->kode_risiko) }}"
                required
            />
            <flux:error name="kode_risiko" />
        </flux:field>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-3">
        <flux:field>
            <flux:input
                type="date"
                label="Tanggal"
                name="tanggal"
                value="{{ old('tanggal', $kodeRisiko?->tanggal) }}"
                required
            />
            <flux:error name="tanggal" />
        </flux:field>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-3">
        <flux:field>
            <flux:input
                label="Satker"
                name="satker"
                value="{{ old('satker', $kodeRisiko?->satker) }}"
                required
            />
            <flux:error name="satker" />
        </flux:field>
    </div>

    <div class="col-span-12 flex justify-end">
        <flux:button type="submit">
            {{ __('Simpan') }}
        </flux:button>
    </div>
</div>