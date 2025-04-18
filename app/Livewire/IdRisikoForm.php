<?php

namespace App\Livewire;

use App\Models\IdRisiko;
use App\Models\KodeRisiko;
use Flux\Flux;
use Livewire\Component;

class IdRisikoForm extends Component
{
    public ?KodeRisiko $kodeRisiko;

    public ?IdRisiko $selectedIdRisiko;

    public ?int $selectedIdRisikoIndex;

    public array $idRisikos = [];

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    // START: Methods to add, set, and remove ID Risiko
    public function addIdRisiko()
    {
        $this->idRisikos[] = [
            'id_risiko' => '',
            'kategori_risiko' => '',
            'area_dampak' => '',
            'sasaran_strategi' => '',
            'indikator_kinerja' => '',
            'proses_tahapan' => '',
            'kriteria_kemungkinan' => '',
        ];
    }

    public function setIdRisiko(IdRisiko $idRisiko, int $index)
    {
        $this->selectedIdRisiko = $idRisiko;

        $this->selectedIdRisikoIndex = $index;
    }

    public function removeIdRisiko(int $index)
    {
        // Remove the ID Risiko from the array
        array_splice($this->idRisikos, $index, 1);
    }

    public function deleteIdRisiko()
    {
        // Delete the ID Risiko from the database
        $this->selectedIdRisiko->delete();

        $this->removeIdRisiko($this->selectedIdRisikoIndex);

        Flux::modal('confirm-delete-id-risiko')->close();
    }
    // END: Methods to add, set, and remove ID Risiko

    public function mount()
    {
        $this->addIdRisiko();

        $this->getKodeRisiko();
    }

    public function render()
    {
        return view('livewire.id-risiko-form');
    }

    private function getKodeRisiko()
    {
        if (! empty($this->kodeRisiko)) {
            $this->idRisikos = $this->kodeRisiko->id_risikos
                ->map(fn (IdRisiko $idRisiko) => [
                    'id' => $idRisiko->id,
                    'id_risiko' => $idRisiko->id_risiko,
                    'kategori_risiko' => $idRisiko->kategori_risiko,
                    'area_dampak' => $idRisiko->area_dampak,
                    'sasaran_strategi' => $idRisiko->sasaran_strategi,
                    'indikator_kinerja' => $idRisiko->indikator_kinerja,
                    'proses_tahapan' => $idRisiko->proses_tahapan,
                    'kriteria_kemungkinan' => $idRisiko->kriteria_kemungkinan,
                ])
                ->toArray();
        }
    }
}
