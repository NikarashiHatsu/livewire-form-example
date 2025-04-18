<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKodeRisikoRequest;
use App\Http\Requests\UpdateKodeRisikoRequest;
use App\Models\IdRisiko;
use App\Models\KodeRisiko;
use Illuminate\Support\Facades\DB;

class KodeRisikoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kode-risiko.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kode-risiko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKodeRisikoRequest $request)
    {
        DB::beginTransaction();

        try {
            $kodeRisiko = KodeRisiko::create($request->validated());

            $dataIdRisiko = collect($request->id_risiko)
                ->map(fn ($item, $index) => [
                    'kode_risiko_id' => $kodeRisiko->id,
                    'id_risiko' => $item,
                    'kategori_risiko' => $request->kategori_risiko[$index],
                    'area_dampak' => $request->area_dampak[$index],
                    'sasaran_strategi' => $request->sasaran_strategi[$index],
                    'indikator_kinerja' => $request->indikator_kinerja[$index],
                    'proses_tahapan' => $request->proses_tahapan[$index],
                    'kriteria_kemungkinan' => $request->kriteria_kemungkinan[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            IdRisiko::insert($dataIdRisiko->toArray());
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kode risiko: ' . $th->getMessage());
        }

        DB::commit();

        return redirect()
            ->back()
            ->with('success', 'Kode risiko berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KodeRisiko $kodeRisiko)
    {
        return view('dashboard.kode-risiko.show', [
            'kodeRisiko' => $kodeRisiko
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KodeRisiko $kodeRisiko)
    {
        return view('dashboard.kode-risiko.edit', [
            'kodeRisiko' => $kodeRisiko
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKodeRisikoRequest $request, KodeRisiko $kodeRisiko)
    {
        DB::beginTransaction();

        try {
            $kodeRisiko->update($request->validated());

            $dataIdRisiko = collect($request->id_risiko)
                ->map(fn ($item, $index) => [
                    'id' => $request->id_risiko_id[$index],
                    'kode_risiko_id' => $kodeRisiko->id,
                    'id_risiko' => $item,
                    'kategori_risiko' => $request->kategori_risiko[$index],
                    'area_dampak' => $request->area_dampak[$index],
                    'sasaran_strategi' => $request->sasaran_strategi[$index],
                    'indikator_kinerja' => $request->indikator_kinerja[$index],
                    'proses_tahapan' => $request->proses_tahapan[$index],
                    'kriteria_kemungkinan' => $request->kriteria_kemungkinan[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            $addedIdRisiko = $dataIdRisiko->whereNull('id');

            $existingIdRisiko = $dataIdRisiko->whereNotNull('id');

            IdRisiko::insert($addedIdRisiko->toArray());

            foreach ($existingIdRisiko as $idRisiko) {
                IdRisiko::where('id', $idRisiko['id'])->update($idRisiko);
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal mengubah kode risiko: ' . $th->getMessage());
        }

        DB::commit();

        return redirect()->back()->with('success', 'Kode risiko berhasil diubah.');
    }
}
