<x-layouts.app :title="__('Detail Kode Risiko')">
    <div class="flex items-center justify-between mb-6">
        <flux:button
            :href="route('dashboard.kode-risiko.index')"
            variant="outline"
            icon:leading="arrow-left"
        >
            {{ __('Kembali') }}
        </flux:button>

        <flux:heading>
            {{ __('Detail Kode Risiko') }}
        </flux:heading>

        <flux:button
            :href="route('dashboard.kode-risiko.edit', ['kode_risiko' => $kodeRisiko->id])"
            variant="outline"
            icon:leading="pencil"
        >
            {{ __('Edit') }}
        </flux:button>
    </div>

    <table>
        <tbody>
            <tr class="*:px-4 *:py-1">
                <td class="w-40">Nama Kasatker</td>
                <td class="w-4">:</td>
                <td>{{ $kodeRisiko->nama_kasatker }}</td>
            </tr>
            <tr class="*:px-4 *:py-1">
                <td>Kode Risiko</td>
                <td>:</td>
                <td>{{ $kodeRisiko->kode_risiko }}</td>
            </tr>
            <tr class="*:px-4 *:py-1">
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($kodeRisiko->tanggal)->isoFormat('LL') }}</td>
            </tr>
            <tr class="*:px-4 *:py-1">
                <td>Satker</td>
                <td>:</td>
                <td>{{ $kodeRisiko->satker }}</td>
            </tr>
        </tbody>
    </table>
</x-layouts.app>
