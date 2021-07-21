<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Products;
use Cart;
use Session;


class PosController extends Controller
{
    public function index()
    {
        $listProducts = Products::orderby('id','desc')->get();
        return view('pos_ban_hang.index',compact('listProducts'));
    }
    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
            ->where('pr_name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;background:#f1f1f1;">';
            foreach($data as $row)
            {
               $output .= '
               <li><buttom id="add_cart" type="button" class="btn btn-primary">'. $row->id .' - '.$row->pr_name.'</buttom></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
    
    public function SaveCart(Request $request)
    {
        $productsID = $request->products_id_hidden;
        $productsQty = $request->qty;

        $productsInfo = DB::table('products')->where('id',$productsID)->first();
        
        $data['id'] = $productsID;
        $data['qty'] = $productsQty;
        $data['name'] = $productsInfo->pr_name;
        $data['price'] = $productsInfo->pr_price_ban;
        $data['weight'] = $productsInfo->pr_price_ban;
        // $data['options']['image'] =  $productsInfo->image;
        Cart::add($data); 
        // Cart::destroy();
        if ($data) {
            Session::flash('success', 'Đã thêm vào giỏ hàng!');
        }else {                        
            Session::flash('error', 'Chưa thêm vào giỏ hàng!');
        }
        return redirect('/pos-ban-hang');
    }
    public function datele_to_cart($rowId)
    {
        $deleteCart = Cart::update($rowId,0); 
        return redirect('/pos-ban-hang');
    }
  
}
