<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel; 
use Illuminate\Http\Request;
use Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $kelas= Kelas::all();
        $mapel = Mapel::all();
        return view('siswa.index', compact('siswa', 'kelas', 'mapel'));
    }

    public function data()
    {
        $siswa = Siswa::orderBy('id', 'desc')->get();

        return datatables()
        ->of($siswa)
        ->addIndexColumn()
        ->editColumn('kelas_id', function($siswa){
            return !empty($siswa->kelas->nama) ? $siswa->kelas->nama : 'Kelas Belum di isi';
        })
        ->editColumn('mapel_id', function($siswa){
            return !empty($siswa->mapel->nama) ? $siswa->mapel->nama : 'Mapel Belum di isi';
        })
        ->editColumn('aksi', function($siswa){
            return '
            
            <div class="btn-group">
              <button onclick="editData(`'.route('siswa.update', $siswa->id).'`)" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
              <button onclick="hapusData(`'.route('siswa.destroy', $siswa->id).'`)" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </div>
            
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::create([
            'nama' => $request->nama, 
            'jenis_kelamin' => $request->jenis_kelamin, 
            'alamat' => $request->alamat, 
            'kelas_id' => $request->kelas_id, 
            'mapel_id' => $request->mapel_id, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $siswa,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->mapel_id = $request->mapel_id;
        $siswa->update();

        return response()->json('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return response()->json(null, 204);
    }
}
