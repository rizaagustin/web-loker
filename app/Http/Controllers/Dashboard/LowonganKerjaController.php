<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LowonganKerja;
// use App\Models\Lamaran;
use App\Models\User;
use App\Traits\HasFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LowonganKerjaController extends Controller
{
    use HasFile;

    public $path = 'public/persyaratan/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LowonganKerja::all();
        return view('pages.dashboard.lowongan_kerja.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.dashboard.lowongan_kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'nama' => 'required|min:2',
            'bagian' => 'required|min:2',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'persyaratan' => 'required|mimes:pdf',
            'status' => 'required'
        ]);
        
        $file = $this->uploadFile($request, $this->path);

        $loker = LowonganKerja::create([
            'nama' => $request->nama,
            'bagian' => $request->bagian,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'persyaratan' => $file->hashName(),
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);

        if($loker){
            //redirect dengan pesan sukses
            return redirect()->route('dashboard.infoloker.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dashboard.infoloker.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit(LowonganKerja $infoloker)
    {        
        // infoloker harus sesuaikan dengan route list {}
        $loker = $infoloker;
        return view('pages.dashboard.lowongan_kerja.edit',compact('loker'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LowonganKerja $infoloker)
    {
        $file = $this->uploadFile($request, $this->path);

        $this->validate($request,[
            'nama' => 'required|min:2',
            'bagian' => 'required|min:2',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'persyaratan' => 'mimes:pdf',
            'status' => 'required'
        ]);

        // dd($infoloker);

        $infoloker->update([
            'nama' => $request->nama,
            'bagian' => $request->bagian,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);

        // $infoloker->save();


        if ($request->file('file')) {
            $this->updateImage($this->path, $infoloker, $name = $file->hashName());
        }

        if($infoloker){
            //redirect dengan pesan sukses
            return redirect()->route('dashboard.infoloker.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dashboard.infoloker.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowonganKerja $infoloker)
    {
        Storage::disk('local')->delete($this->path. basename($infoloker->persyaratan));
        $infoloker->delete();


        if($infoloker){
            return response()->json([
                'status' => 'success'
            ]);
        }else{  
            return response()->json([
                'status' => 'error'
            ]);
        }

    }
}
