<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Blog;

class BlogController extends Controller
{
    public function data_table_server_side()
    {

        $data = Blog::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $funsi_delete="deleteData($data->id,'$data->name')";
                $button = [
                    '<button data-original-title="Edit" onClick="editFormModal('.$data->id.')"
                        class="btn btn-sm btn-warning m-1" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-edit"></i>
                    </button>',
                    '<button data-original-title="Hapus" onClick="'.$funsi_delete.'"
                        class="btn btn-sm btn-danger m-1" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-trash"></i>
                    </button>'
                ];
                return implode("",$button);
            })
            ->rawColumns(['id','action'])
            ->make(true);
    }

    public function index()
    {
        return view('app.dashboard.blog.index');
    }

    public function show($id)
    {
        return response()->json(
            Blog::findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $package = Blog::create([
            'name'          => $request->name,
            'price'         => (int)str_replace('.','',$request->price),
            'discount'      => ($request->discount==null) ? 0 : (int)str_replace('.','',$request->discount),
            'type_discount' => $request->type_discount
        ]);
        if($package){
            return redirect(route('dashboard.blog'))->with('message', [
                'status'    => 'success',
                'message'   => 'Paket Harga baru berhasil ditambahkan!!'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $package                = Blog::findOrFail($id);
        $package->name          = $request->name;
        $package->price         = (int)str_replace('.','',$request->price);
        $package->discount      = ($request->discount==null) ? 0 : (int)str_replace('.','',$request->discount);
        $package->type_discount = $request->type_discount;

        if($package->save()){
            return redirect(route('dashboard.blog'))->with('message', [
                'status'    => 'success',
                'message'   => 'Paket Harga '.$request->name.' berhasil diperbarui!!'
            ]);
        }
    }

    public function delete(Request $request){
        if(Blog::findOrFail($request->id)->delete()){
            return response()->json([
                'message'   => "berhasil"
            ],200);
        }else{
            return response()->json([
                'message'   => "berhasil"
            ],400);
        }
    }
}
