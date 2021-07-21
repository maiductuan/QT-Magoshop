<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Products;
use App\Category;
use App\Workshop;
// Use Alert;

class ProductController extends Controller
{
    public function index()
    {
        // $listProducts = Products::orderby('id','desc')->get();
        $listProducts = DB::table('products as p')
            ->leftJoin('category as cat', 'p.cat_id', '=', 'cat.id')
            ->leftJoin('workshop as work', 'p.work_id', '=', 'work.id')
            ->select('p.id','cat.cat_name','work.work_name','p.pr_name','p.pr_contents','p.pr_price_nhap','p.pr_contents','p.pr_soluong','p.pr_price_ban','p.pr_image','p.created_at')
            ->orderby('id','desc')->get();
        return view('products.index',compact('listProducts'));
    }

    public function create()
    {
        $category = Category::all();
        $workshop = Workshop::all();
        return view('products.create',compact('category','workshop'));
    }

    public function store(Request $request)
    { //Lưu hình thẻ khi có file hình
        $getimage = '';
        if($request->hasFile('pr_image')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'pr_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],          
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'pr_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'pr_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            
            //Lưu hình ảnh vào thư mục public/upload/image
            $pr_image = $request->file('pr_image');
            $getimage = time().'_'.$pr_image->getClientOriginalName();
            $destinationPath = public_path('upload/images');
            $pr_image->move($destinationPath, $getimage);
            }
            
            //Lấy giá trị đã nhập
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $products = new Products;
            $products->pr_name = $request->pr_name; 
            $products->pr_price_nhap = $request->pr_price_nhap;
            $products->pr_price_ban = $request->pr_price_ban;
            $products->pr_soluong = $request->pr_soluong;
            $products->user_id = 1;
            $products->cat_id = $request->cat_id;
            $products->work_id = $request->work_id;
            $products->pr_contents = $request->pr_contents;
            $products->pr_image = $getimage;
            $products->save();
            

            if ($products) {
                Session::flash('success', 'Thêm mới sản phẩm thành công!');
            }else {                        
                Session::flash('error', 'Thêm thất bại!');
            }
            
            //Thực hiện chuyển trang
            return redirect('san-pham/danh-sach-san-pham');
    }

    public function edit($id)
    {
        $category = Category::all();
        $listProducts = Products::all();
        return view('products.edit',compact('category','listProducts'));
    }
    public function update(Request $request)
    {
       //Cap nhat sua hoc sinh
    date_default_timezone_set("Asia/Ho_Chi_Minh");  

    //Thực hiện lưu thay đổi hình thẻ khi có file
    if($request->hasFile('pr_image')){
        $this->validate($request, 
            [
                'pr_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],          
            [
                'pr_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'pr_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );
        
        //Xóa file hình thẻ cũ
        $getHT = DB::table('products')->select('pr_image')->where('id',$request->id)->get();
        if($getHT[0]->pr_image != '' && file_exists(public_path('upload/images/'.$getHT[0]->pr_image)))
        {
            unlink(public_path('upload/pr_image/'.$getHT[0]->pr_image));
        }
        
        //Lưu file hình thẻ mới
        $pr_image = $request->file('pr_image');
        $getimage = time().'_'.$impr_imageage->getClientOriginalName();
        $destinationPath = public_path('upload/images');
        $pr_image->move($destinationPath, $getimage);
        $updateimage = DB::table('products')->where('id', $request->id)->update([
            'pr_image' => $getimage
        ]);
    }
    
    
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('products')->where('id', $request->id)->update([
            'pr_name' => $request->pr_name,
            'pr_price_nhap' => $request->pr_price_nhap,
            'pr_price_ban' => $request->pr_price_ban,
            'pr_name' => $request->pr_name,
            'pr_soluong' => $request->pr_soluong,
            'pr_contents' => $request->pr_contents,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData) {
            Session::flash('success', 'Sửa danh mục thành công!');
        }else {                        
            Session::flash('error', 'Sửa thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('products/edit/'.$request->id);
    }

    public function destroy($id)
    {
        $deleteData = DB::table('products')->where('id', '=', $id)->delete();

            if ($deleteData) {
                
                Session::flash('success', 'Xóa  thành công!');
            }else {                        
                Session::flash('error', 'Xóa thất bại!');
            }
        return redirect('products/list');
    }
}
