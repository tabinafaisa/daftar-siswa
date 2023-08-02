<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Home extends Controller
{
    public function index() {

        // $data = [
        //     'nama' => 'Tabina',
        //     'kelas' => '11,',
        //     'jurusan' => 'rpl'
        // ];
        $data = DB::table('siswa')->get();
        // dd($data);

        // compact untuk mengirim data ke view
        return view('content', compact('data'));
        // dd('berhasil masuk ke controller home');
    }

    public function detail($id) {
        $select = DB::select('select * from siswa where id=' . $id . '');
        // $data = Siswa::where('id', $id)->get();
        return $select;
    }

    public function delete($id) {
        // DB::raw('delete from siswa where id=' . $id .'');
        $deleted = DB::table('siswa')->where('id', $id)->delete();
        return redirect()->back();
    }
}
