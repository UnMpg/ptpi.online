<?php

namespace App\Http\Controllers;

use App\DataCenter;
use Illuminate\Http\Request;

class DataCenterController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin')->except(['validasiSurat', 'validasiCertificate']);
        // $this->middleware('auth')->except(['validasiSurat', 'validasiCertificate']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacenters = DataCenter::all()->where('file_type', 'certificate');
        return view('admin.data-center.index', compact('datacenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.data-center.create');
    }

    public function createSurat(Request $request)
    {
        return view('admin.data-center.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = time();
        DataCenter::create([
            'unique_id' => $time . rand(100, 999),
            'filename' => $request->filename,
            'file_type' => 'certificate',
            'description' => $request->description
        ]);

        return redirect(action('DataCenterController@index'))->with('save', '"File" Berhasil Ditambahkan');
    }

    public function downloadFile(DataCenter $datacenter)
    {
        return response()->download(public_path('assets/datacenter/' . $datacenter->filename));
    }

    public function edit(DataCenter $dataCenter)
    {
        return view('admin.data-center.edit', compact('dataCenter'));
    }

    public function update(DataCenter $dataCenter, Request $request)
    {
        $dataCenter->update(['description' => $request->description]);
        return redirect(action('DataCenterController@index'))->with('update', '"File" Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataCenter  $datacenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataCenter $dataCenter)
    {
        $dataCenter->delete();
        return redirect(action('DataCenterController@index'))->with('delete', '"File" Berhasil Dihapus');
    }

    public function destroySurat($dataCenterId)
    {
        $dataCenter = DataCenter::find($dataCenterId);
        if ($dataCenter->document) {
            unlink(public_path('assets/surat-document/' . $dataCenter->document));
        }
        $dataCenter->delete();
        return redirect(action('DataCenterController@indexSurat'))->with('delete', '"File" Berhasil Dihapus');
    }

    public function indexSurat()
    {
        if (auth('admin')->check()) {
            $datacenters = DataCenter::all()->where('file_type', 'surat');
        } else {
            $userId = auth('web')->id();
            $datacenters = DataCenter::all()->where('file_type', 'surat')->where('user_id', $userId);
        }
        return view('admin.data-center.surat.index', compact('datacenters'));
    }

    public function storeSurat(Request $request)
    {
        $time = time();
        $image = $request->file('image');
        $input['image'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('assets/surat');
        $image->move($destinationPath, $input['image']);

        $imageDocument = $request->file('document');
        $input['document'] = time() . '.' . $imageDocument->getClientOriginalExtension();
        $destinationPathDocument = public_path('assets/surat-document');
        $imageDocument->move($destinationPathDocument, $input['document']);


        if (auth('admin')->check()) {
            DataCenter::create([
                'unique_id' => $time . rand(100, 999),
                'filename' => $request->filename,
                'file_type' => 'surat',
                'image' => $input['image'],
                'document' => $input['document'],
                'description' => $request->description
            ]);
        } else {
            $userId = auth('web')->id();
            DataCenter::create([
                'unique_id' => $time . rand(100, 999),
                'filename' => $request->filename,
                'file_type' => 'surat',
                'image' => $input['image'],
                'document' => $input['document'],
                'user_id' => $userId,
                'description' => $request->description
            ]);
        }

        return redirect(action('DataCenterController@indexSurat'))->with('save', '"No.Surat" Berhasil Ditambahkan');
    }

    public function validasiSurat($unique_id)
    {
        $status = false;
        $datacenter = DataCenter::where('unique_id', $unique_id)->first();
        if ($datacenter) {
            $status = true;
            return view('home.sertifikat.status-scan-surat', compact('status', 'datacenter'));
        }
    }

    public function validasiCertificate($unique_id)
    {
        $status = false;
        $datacenter = DataCenter::where('unique_id', $unique_id)->first();
        if ($datacenter) {
            $status = true;
        }
        return view('home.sertifikat.status-scan-certificate', compact('status', 'datacenter'));
    }
}
