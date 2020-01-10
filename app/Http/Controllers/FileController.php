<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Response;
class FileController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUser()
    {


        $user=User::all();
       return $user;
    }

    public function List()
    {

        $products=Product::with('productImages','productPrices')->get();


       return view('index',compact('products'));
    }


    public function edit($id)
    {

        $user=User::find($id);

       return view('edit',compact('user',$user));
    }

    public function show($id)
    {
      $products=Product::with('productImages','productPrices')->find($id);

        return view('show',compact('products',$products));
    }

    public function update(Request $request)
    {
        $product=Product::find($request->id);
        if(is_object($product)){
            $product->update(['name'=>$request->name]);
            return array('status'=>true,'data'=>$product);
        }
        return array('status'=>false,'data'=>'');
    }
       public function formSubmit(Request $request)
        {


            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move("upload/", $fileName);
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'image'=>"upload/".$fileName

            ]);
            return response()->json(['success'=>'You have successfully upload file.']);
        }




        public function search(Request $request, $keyword)
        {
            if($keyword=='')
            {
                $products=Product::with('productImages','productPrices')->get();
            }
            else{
                $products = Product::where('name', 'LIKE', "%$keyword%")->with('productImages','productPrices')->get();

            }


            return response()->json( $products);
        }

public function destroy($id)
{

    $user=User::find($id);
    $user->delete();
    return redirect()->back()->with(['success'=>'You have successfully Deleted User.']);
}



}
