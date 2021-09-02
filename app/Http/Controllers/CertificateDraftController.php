<?php

namespace App\Http\Controllers;

use App\CertificateDraft;
use Illuminate\Http\Request;

class CertificateDraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = CertificateDraft::all();
        return view('admin.certificate-draft.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CertificateDraft  $certificateDraft
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateDraft $certificateDraft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertificateDraft  $certificateDraft
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateDraft $certificateDraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertificateDraft  $certificateDraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateDraft $certificateDraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertificateDraft  $certificateDraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateDraft $certificateDraft)
    {
        //
    }
}
