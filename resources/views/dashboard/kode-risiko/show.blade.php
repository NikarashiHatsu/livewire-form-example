<x-layouts.app :title="__('Detail Kode Risiko')">
    <div class="flex items-center justify-between mb-6">
        <flux:button :href="route('dashboard.kode-risiko.index')" variant="outline" icon:leading="arrow-left">
            {{ __('Kembali') }}
        </flux:button>

        <flux:heading>
            {{ __('Detail Kode Risiko') }}
        </flux:heading>

        <flux:button :href="route('dashboard.kode-risiko.edit', ['kode_risiko' => $kodeRisiko->id])" variant="outline"
            icon:leading="pencil">
            {{ __('Edit') }}
        </flux:button>
    </div>

    <flux:heading class="mb-4">
        {{ __('Kode Risiko') }}
    </flux:heading>

    <table class="mb-6">
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

    <flux:heading class="mb-4">
        {{ __('ID Risiko') }}
    </flux:heading>

    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr class="*:px-6 *:py-3 *:text-start *:text-xs *:font-medium *:text-gray-500 *:uppercase *:dark:text-slate-500">
                                <th scope="col" >
                                    No
                                </th>
                                <th scope="col">
                                    ID Risiko
                                </th>
                                <th scope="col">
                                    Kategori Risiko
                                </th>
                                <th scope="col">
                                    Area Dampak
                                </th>
                                <th scope="col">
                                    Sasaran Strategi
                                </th>
                                <th scope="col">
                                    Indikator Kinerja
                                </th>
                                <th scope="col">
                                    Proses/Tahapan
                                </th>
                                <th scope="col">
                                    Kriteria Kemungkinan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse ($kodeRisiko->id_risikos as $idRisiko)
                                <tr class="*:px-6 *:py-4 *:whitespace-nowrap *:text-sm *:font-medium *:text-gray-800 *:dark:text-slate-200 align-top">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $idRisiko->id_risiko }}</td>
                                    <td>{{ $idRisiko->kategori_risiko }}</td>
                                    <td>{{ $idRisiko->area_dampak }}</td>
                                    <td>{{ $idRisiko->sasaran_strategi }}</td>
                                    <td>{{ $idRisiko->indikator_kinerja }}</td>
                                    <td>{{ $idRisiko->proses_tahapan }}</td>
                                    <td>{{ $idRisiko->kriteria_kemungkinan }}</td>
                                </tr>
                            @empty
                                <tr class="*:px-6 *:py-4 *:whitespace-nowrap *:text-sm *:font-medium *:text-gray-800 *:dark:text-slate-200 align-top">
                                    <td colspan="8" class="text-center">
                                        {{ __('Tidak ada data') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>