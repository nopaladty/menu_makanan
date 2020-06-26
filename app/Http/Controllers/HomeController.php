<?php

namespace App\Http\Controllers;
use App\Masakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\User;
use App\Users;
use App\Transaksi;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $masakan = Masakan::all();
        return view('user/home',  ['list' => $masakan]);
    }

    public function produkuser(){
        $masakan = Masakan::all();
        return view('user/produk',  ['list' => $masakan]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function produk()
    {
    	$masakan = Masakan::all();
    	return view('admin.makanan.produk', ['list' => $masakan]);
    }

    public function tambah()
    {
        return view('admin.makanan.tambahmakanan');
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg|max:5000',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|string'
        ]);
        
        if($request->gambar)
        {
            $file = $request->file('gambar');
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.'.'.$acak; 
            $request->file('gambar')->move("image/", $fileName);
            $gambar = $fileName;
        } else {
            $gambar = NULL;
        }
        // dd($gambar);

        Masakan::create([
            'nama' => $request->get('nama'),
            'deskripsi' => $request->get('deskripsi'),
            'harga' => $request->get('harga'),
            'gambar' => $gambar
        ]);
        return redirect('admin/produk');

    }

    public function edit($id){
        $masakan = Masakan::find($id);
        return view('admin.makanan.editmasakan', ['masakan' => $masakan]);
    }

    public function updategambar($id, Request $request)
    {
        if($request->file('gambar')) {
            $file = $request->file('gambar');
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.'.'.$acak; 
            $request->file('gambar')->move("image/", $fileName);
            $gambar = $fileName;
        } else {
            $gambar = NULL;
        }

        // dd($gambar);

        Masakan::find($id)->update([
            'nama' => $request->get('nama'),
            'deskripsi' => $request->get('deskripsi'),
            'harga' => $request->get('harga'),
            'gambar' => $gambar
        ]);

        return redirect('/admin/produk');
    }


    Public function hapus($id)
    {
        $masakan = Masakan::find($id);
        $masakan->delete();
        return redirect('/admin/produk');
    }

    public function cari(Request $request, $sort = 'desc'){

        $cari = $request->cari;

        $masakan = DB::table('Masakan')
        ->where('nama', 'like', "%".$cari."%")
        ->orwhere('deskripsi', 'like', "%".$cari."%")
        ->orwhere('harga', 'like', "%".$cari."%")

        ->get();
        return view('user/cari', ['list' => $masakan]);
        
    }

    public function pengaturan(){
        return view('pengaturan');
    }

    public function change(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/admin/pengaturan');

    }

    public function katasandi(){
        return view('user/gantisandi');
    }

    public function sandiproses(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/ganti-katasandi');

    }   

    public function cart(){
        return view('user.cart');
    }

    public function cartproses($id)
    {
        $product = Masakan::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "nama" => $product->nama,
                    "quantity" => 1,
                    "harga" => $product->harga,
                    "gambar" => $product->gambar
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "nama" => $product->nama,
            "quantity" => 1,
            "harga" => $product->harga,
            "gambar" => $product->gambar
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function confirm(Request $request)
    {
       $request->session()->forget('cart');
       return redirect('/home'); 
       
    }

    public function checkout(){
        return view('user.checkout');
    }

    public function berhasil(Request $request)
    {
        $this->validate($request,[
            'nama_rekening' => 'required|string',
            'nomor_rekening' => 'required|string',
            'bank' => 'required|string',
            'alamat' => 'required|string',
            'total' => 'required|string'
        ]);
        
        Transaksi::create([
            'nama_rekening' => $request->get('nama_rekening'),
            'nomor_rekening' => $request->get('nomor_rekening'),
            'bank' => $request->get('bank'),
            'alamat' => $request->get('alamat'),
            'total' => $request->get('total'),

        ]);
        return redirect('pembayaran/berhasil');

    }

    public function sukses(){
        return view('user.sukses');
    }

     public function pengaturanuser($id)
    {
        $pengaturan = Users::find($id);
        return view('user.pengaturan', compact('pengaturan'));
    }

    public function pengaturanupdate(Request $request, $id)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min' => ':attribute membutuhkan setidaknya :min karakter',
            'max' => ':attribute tidak boleh lebih dari :max karakter',
        ];

        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ],$message);


        Users::find($id)->update([
            'name' => $request->get('name'),
            'alamat' => $request->get('alamat'),
            'no_hp' => $request->get('no_hp'),
            'email' => $request->get('email'),
        ]);

        return redirect()->back()->with('simpan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="fa fa-info"></span> &nbsp; Akunmu berhasil di update!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        


        return redirect('pengaturan/{id}');
    }
}
