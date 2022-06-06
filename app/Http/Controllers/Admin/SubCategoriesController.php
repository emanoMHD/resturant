<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoriesRequest;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use DB;
use Illuminate\Support\Str;
class SubCategoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $subcategoryies = SubCategory::selection()->paginate(PAGINATION_COUNT);
        return view('admin.subcategory.index', compact('subcategoryies'));
    }

    public function create()
    {
        $categories = MainCategory::where('translation_of', 1)->active()->get();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(SubCategoriesRequest $request)
    {
        try {
           
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else

            $request->request->add(['active' => 1]);

            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('maincategories', $request->photo);
               
            }

            $subcategoryies = SubCategory::create([
              
                'name_sub' => $request->name,
                'active' => $request->active,
                'photo' => $filePath,
                'category_id' => $request->category_id,
              
            ]);

          
            return redirect()->route('admin.subcategories')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.subcategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function edit($id)
    {
        try {

            $subcategory = SubCategory::Selection()->find($id);
            if (!$subcategory)
                return redirect()->route('admin.subcategories')->with(['error' => 'هذا المنتج غير موجود او ربما يكون محذوفا ']);

            $categories =   MainCategory::where('translation_of', 1)->active()->get();

            return view('admin.subcategory.edite', compact('subcategory', 'categories'));

        } catch (\Exception $exception) {
return $exception;
            return redirect()->route('admin.subcategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

 


    }

    public function update($id, SubCategoriesRequest $request)
    {

        try {

            $subcategory = SubCategory::Selection()->find($id);
            if (!$subcategory)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المنتج غير موجود او ربما يكون محذوفا ']);


            DB::beginTransaction();
            //photo
            if ($request->has('photo') ) {
                 $filePath = uploadImage('maincategories', $request->photo);
                 SubCategory::where('id', $id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

             $data = $request->except('_token', 'id', 'photo');


           

             SubCategory::where('id', $id)
                ->update(
                    $data
                );

            DB::commit();
            return redirect()->route('admin.subcategories')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('admin.subcategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            $subcategory = SubCategory::find($id);
            if (!$subcategory)
                return redirect()->route('admin.subcategories')->with(['error' => 'هذا المنتج غير موجود ']);

          

            $image = Str::after($subcategory->photo, 'assets/');
            $image = base_path('assets/' . $image);
         // unlink($image); //delete from folder

         

            $subcategory->delete();
            return redirect()->route('admin.subcategories')->with(['success' => 'تم حذف المنتج بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.subcategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    public function changeStatus($id)
    {
        try {
            $subcategory = SubCategory::find($id);
            if (!$subcategory)
                return redirect()->route('admin.subcategories')->with(['error' => 'هذا القسم غير موجود ']);

           $status =   $subcategory -> active  == 0 ? 1 : 0;

           $subcategory -> update(['active' =>$status ]);

            return redirect()->route('admin.subcategories')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



}
