<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;
    
class CategoryController extends Controller
{
    public function index()
    {
         $listCategory = Category::all();
        return view('category.index',compact('listCategory'));
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        //Lấy giá trị đã nhập
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $allRequest  = $request->all();
        $cat_name  = $allRequest['cat_name'];

        
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'cat_name'  => $cat_name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        //Insert vào bảng 
        $insertData = DB::table('category')->insert($dataInsertToDatabase);
        if ($insertData) {
            Session::flash('success', 'Thêm mới tên danh mục thành công!');
        }else {                        
            Session::flash('error', 'Thêm thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('san-pham/tao-san-pham');
    }
    public function destroy($id)
    {
        $kiemtra_category = DB::table('products')->where('cat_id','=',$id)->get()->count();

        if($kiemtra_category >= 1)
        {
            Session::flash('error', 'bạn phải xóa hết sản phẩm thuộc danh mục này!');
            return redirect('san-pham/tao-san-pham');
        }else{

        $deleteData = DB::table('category')->where('id', '=', $id)->delete();
            if ($deleteData) {
                Session::flash('success', 'Xóa danh mục thành công!');
            }else {                        
                Session::flash('error', 'Xóa danh mục thất bại!');
            }

        return redirect('san-pham/tao-san-pham');
        }
    }

}
