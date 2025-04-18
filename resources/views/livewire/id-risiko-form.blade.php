<div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
    <div class="p-4 md:p-5">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                            <thead>
                                <tr class="*:px-6 *:py-3 *:text-start *:text-xs *:font-medium *:text-gray-500 *:uppercase *:dark:text-slate-500">
                                    <th scope="col" >
                                        No
                                    </th>
                                    <th scope="col">
                                        Opsi
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
                            <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                                @foreach ($idRisikos as $index => $idRisiko)
                                    <tr
                                        wire:key="id-risiko-{{ $index }}"
                                        class="*:px-6 *:py-4 *:whitespace-nowrap *:text-sm *:font-medium *:text-gray-800 *:dark:text-slate-200 align-top"
                                    >
                                        <td>
                                            <input
                                                type="hidden"
                                                wire:model="idRisikos.{{ $index }}.id"
                                                name="id_risiko_id[]"
                                                value="{{ $idRisiko['id'] ?? '' }}"
                                            />
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            @if (count($idRisikos) > 1)
                                                @if (! empty($idRisiko['id']))
                                                    <flux:modal.trigger name="confirm-delete-id-risiko">
                                                        <flux:button
                                                            variant="danger"
                                                            type="button"
                                                            wire:click="setIdRisiko({{ $idRisiko['id'] }}, {{ $index }})"
                                                            class="cursor-pointer"
                                                        >
                                                            <svg class="shrink-0 fill-current size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M164.2 39.5L148.9 64l150.3 0L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5l-92.5 0c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64 384 64l32 0 16 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0 0 336c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80L32 96 16 96C7.2 96 0 88.8 0 80s7.2-16 16-16l16 0 32 0 47.1 0L137 22.6C145.8 8.5 161.2 0 177.7 0l92.5 0c16.6 0 31.9 8.5 40.7 22.6zM64 96l0 336c0 26.5 21.5 48 48 48l224 0c26.5 0 48-21.5 48-48l0-336L64 96zm80 80l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                        </flux:button>
                                                    </flux:modal.trigger>
                                                @else
                                                    <flux:button
                                                        variant="danger"
                                                        type="button"
                                                        wire:click="removeIdRisiko({{ $index }})"
                                                        class="cursor-pointer"
                                                    >
                                                        <svg class="shrink-0 fill-current size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M164.2 39.5L148.9 64l150.3 0L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5l-92.5 0c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64 384 64l32 0 16 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0 0 336c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80L32 96 16 96C7.2 96 0 88.8 0 80s7.2-16 16-16l16 0 32 0 47.1 0L137 22.6C145.8 8.5 161.2 0 177.7 0l92.5 0c16.6 0 31.9 8.5 40.7 22.6zM64 96l0 336c0 26.5 21.5 48 48 48l224 0c26.5 0 48-21.5 48-48l0-336L64 96zm80 80l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0l0 224c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-224c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                    </flux:button>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <flux:input
                                                name="id_risiko[]"
                                                wire:model="idRisikos.{{ $index }}.id_risiko"
                                                placeholder="ID Risiko"
                                            />

                                            <flux:error name="id_risiko.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:select
                                                name="kategori_risiko[]"
                                                wire:model="idRisikos.{{ $index }}.kategori_risiko"
                                                placeholder="Pilih Kategori Risiko"
                                            >
                                                <flux:select.option>Risiko Strategis</flux:select.option>
                                                <flux:select.option>Risiko Keuangan</flux:select.option>
                                                <flux:select.option>Risiko Operasional</flux:select.option>
                                                <flux:select.option>Risiko IT</flux:select.option>
                                                <flux:select.option>Risiko Hukum/Kepatuhan</flux:select.option>
                                                <flux:select.option>Risiko Reputasi</flux:select.option>
                                                <flux:select.option>Risiko Kebijakan</flux:select.option>
                                                <flux:select.option>Risiko Fraud</flux:select.option>
                                            </flux:select>

                                            <flux:error name="kategori_risiko.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:select
                                                name="area_dampak[]"
                                                wire:model="idRisikos.{{ $index }}.area_dampak"
                                                placeholder="Pilih Area Dampak"
                                            >
                                                <flux:select.option>Anggaran & Keuangan</flux:select.option>
                                                <flux:select.option>Reputasi/Kepercayaan Publik</flux:select.option>
                                                <flux:select.option>SDM (Keselamatan Personel)</flux:select.option>
                                                <flux:select.option>Kinerja</flux:select.option>
                                                <flux:select.option>Pelayanan Masyarakat</flux:select.option>
                                                <flux:select.option>Operasional/TIK/Logistik</flux:select.option>
                                                <flux:select.option>Hukum & Regulasi</flux:select.option>
                                            </flux:select>

                                            <flux:error name="area_dampak.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:textarea
                                                name="sasaran_strategi[]"
                                                wire:model="idRisikos.{{ $index }}.sasaran_strategi"
                                                placeholder="Sasaran Strategi"
                                            ></flux:textarea>

                                            <flux:error name="sasaran_strategi.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:textarea
                                                name="indikator_kinerja[]"
                                                wire:model="idRisikos.{{ $index }}.indikator_kinerja"
                                                placeholder="Indikator Kinerja"
                                            ></flux:textarea>

                                            <flux:error name="indikator_kinerja.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:textarea
                                                name="proses_tahapan[]"
                                                wire:model="idRisikos.{{ $index }}.proses_tahapan"
                                                placeholder="Proses/Tahapan"
                                            ></flux:textarea>

                                            <flux:error name="proses_tahapan.{{ $index }}" />
                                        </td>
                                        <td>
                                            <flux:select
                                                name="kriteria_kemungkinan[]"
                                                wire:model="idRisikos.{{ $index }}.kriteria_kemungkinan"
                                                placeholder="Pilih Kriteria Kemungkinan"
                                            >
                                                <flux:select.option>Tidak Berarti</flux:select.option>
                                                <flux:select.option>Jarang</flux:select.option>
                                                <flux:select.option>Sedang</flux:select.option>
                                                <flux:select.option>Sering</flux:select.option>
                                                <flux:select.option>Pasti Terjadi</flux:select.option>
                                            </flux:select>

                                            <flux:error name="kriteria_kemungkinan.{{ $index }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-slate-200" colspan="8"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-slate-200">
                                        <flux:button
                                            variant="outline"
                                            type="button"
                                            class="cursor-pointer"
                                            wire:click="addIdRisiko"
                                        >
                                            Tambah ID Risiko
                                        </flux:button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <flux:modal
        name="confirm-delete-id-risiko"
        class="md:w-96"
    >
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">
                    Hapus ID Risiko
                </flux:heading>
                <flux:text class="mt-2">
                    Apakah anda yakin ingin menghapus ID Risiko ini? ID Risiko ini akan dihapus permanen dari database.
                </flux:text>
                <flux:text class="mt-2">
                    Seluruh pekerjaan yang belum selesai akan dihapus.
                </flux:text>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button
                    type="button"
                    variant="danger"
                    class="cursor-pointer"
                    wire:click="deleteIdRisiko"
                >Hapus</flux:button>
            </div>
        </div>
    </flux:modal>
</div>