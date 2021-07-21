<?php

namespace App\Http\Controllers;
use App\Users;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
         $listUsers = Users::all();
        return view('users.index',compact('listUsers'));
    }

    public function store(Request $request)
    {

        date_default_timezone_set("Asia/Ho_Chi_Minh");
            $user = new Users;
            $user->user_name = $request->user_name; 
            $user->user_adress = $request->user_adress;
            $user->user_email = $request->user_email;
            $user->user_birthdate = $request->user_birthdate;
            $user->user_phone = $request->user_phone;
            $user->save();
            if ($user) {
                Session::flash('success', 'Thêm khách hàng thành công!');
            }else {                        
                Session::flash('error', 'Sửa thất bại!');
            }
        
        //Thực hiện chuyển trang
        return redirect('pos-ban-hang');
    }
    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('users')
            ->where('user_phone', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;background:#f1f1f1;">';
            foreach($data as $row)
            {
               $output .= '
               <p class="btn btn-primary ">'. $row->user_name .' - '.$row->user_phone.'</p>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
    public function destroy($id)
    {
        $deleteData = DB::table('users')->where('id', '=', $id)->delete();

            if ($deleteData) {
                
                Session::flash('success', 'Xóa  thành công!');
            }else {                        
                Session::flash('error', 'Xóa thất bại!');
            }
        return redirect('user/danh-sach-nguoi-dung');
    }
}
