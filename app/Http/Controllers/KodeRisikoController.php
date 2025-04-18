<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKodeRisikoRequest;
use App\Http\Requests\UpdateKodeRisikoRequest;
use App\Models\KodeRisiko;

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
        try {
            KodeRisiko::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan kode risiko: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Kode risiko berhasil ditambahkan.');
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
        try {
            $kodeRisiko->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah kode risiko: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Kode risiko berhasil diubah.');
    }
}
