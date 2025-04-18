<?php

namespace App\Livewire;

use App\Models\KodeRisiko;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class KodeRisikoTable extends PowerGridComponent
{
    public string $tableName = 'kode-risiko-table-asaov6-table';

    public string $sortField = 'created_at';

    public string $sortDirection = 'desc';

    #[On('delete-kode-risiko')]
    public function deleteKodeRisiko(int $kodeRisiko)
    {
        try {
            KodeRisiko::query()
                ->where('id', $kodeRisiko)
                ->delete();
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.kode-risiko.index')->with('error', 'Gagal menghapus kode risiko: ' . $th->getMessage());
        }

        return redirect()->route('dashboard.kode-risiko.index')->with('success', 'Kode risiko berhasil dihapus.');
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return KodeRisiko::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nama_kasatker')
            ->add('kode_risiko')
            ->add('tanggal_formatted', fn (KodeRisiko $model) => Carbon::parse($model->tanggal)->isoFormat('LL'))
            ->add('satker')
            ->add('created_at_formatted', fn (KodeRisiko $model) => Carbon::parse($model->created_at)->isoFormat('LLL'));
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id')
                ->index()
                ->sortable(),

            Column::action('Opsi'),

            Column::make('Nama Kasatker', 'nama_kasatker')
                ->sortable()
                ->searchable(),

            Column::make('Kode Risiko', 'kode_risiko')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal', 'tanggal_formatted', 'tanggal')
                ->sortable(),

            Column::make('Satker', 'satker')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Input', 'created_at_formatted', 'created_at')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(KodeRisiko $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 shadow-xs [[data-flux-button-group]_&]:border-s-0 [:is([data-flux-button-group]>&:first-child,_[data-flux-button-group]_:first-child>&)]:border-s-[1px]')
                ->route('dashboard.kode-risiko.edit', ['kode_risiko' => $row->id]),

            Button::add('detail')
                ->slot('Detail')
                ->id()
                ->class('relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 shadow-xs [[data-flux-button-group]_&]:border-s-0 [:is([data-flux-button-group]>&:first-child,_[data-flux-button-group]_:first-child>&)]:border-s-[1px]')
                ->route('dashboard.kode-risiko.show', ['kode_risiko' => $row->id]),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->class('relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500 text-white  shadow-[inset_0px_1px_var(--color-red-500),inset_0px_2px_--theme(--color-white/.15)] dark:shadow-none [[data-flux-button-group]_&]:border-e [:is([data-flux-button-group]>&:last-child,_[data-flux-button-group]_:last-child>&)]:border-e-0 [[data-flux-button-group]_&]:border-red-600 dark:[[data-flux-button-group]_&]:border-red-900/25')
                ->dispatch('delete-kode-risiko', ['kodeRisiko' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
