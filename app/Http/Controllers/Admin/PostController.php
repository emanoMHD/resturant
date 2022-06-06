<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function blogCatList()
    {
        $blogcat = DB::table('post_category')->get();
        return view('admin.blog.category.index', compact('blogcat'));
    }


    public function blogCatStore(Request $request)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_ar' => 'required|max:255',

        ]);
           $userId =  Auth::user()->id;

        $data = array();
        $data['category_name_en'] = $request->category_name_en; 
        $data['category_name_ar'] = $request->category_name_ar; 
 $data['user_id'] =  $userId; 

        DB::table('post_category')->insert($data);

        $notification = array(
            'message' => 'blog category inserted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);


    }


    public function deleteBlogCat($id)
    {
        DB::table('post_category')->where('id',$id)->delete();
        
        $notification = array(
            'message' => 'blog category deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }   

    public function editBlogCat($id)
    {
        $blogcatedit = DB::table('post_category')->where('id', $id)->first();
        return view('admin.blog.category.edit', compact('blogcatedit'));
    }

    public function updateBlogCat(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_ar' => 'required|max:255',

        ]);

        $data = array();
        $data['category_name_en'] = $request->category_name_en; 
        $data['category_name_ar'] = $request->category_name_ar; 

        DB::table('post_category')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'blog category updated successfully.',
            'alert-type' => 'success',
        );
        return redirect()->route('add.blog.categorylist')->with($notification);
    }

    public function create()
    {
        $blogcategory = DB::table('post_category')->get();

        return view('admin.blog.create', compact('blogcategory'));

    }

    public function store(REquest $request)
    {
           $userId =  Auth::user()->id;
        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_ar'] = $request->post_title_ar;
        $data['category_id'] = $request->category_id;
        $data['post_details_en'] = $request->post_details_en;
        $data['post_details_ar'] = $request->post_details_ar;
         $data['user_id'] = $userId;
        
        $post_image = $request->file('post_image');
        
        if ($post_image) {
           
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('public/media/post/' . $post_image_name);
            $data['post_image'] = 'public/media/post/'.$post_image_name;
        
            DB::table('posts')->insert($data);
            $notification = array(
            'message' => 'post inserted successfully.',
            'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } else{

            $data['post_image'] = '';
            
            DB::table('posts')->insert($data);
            $notification = array(
            'message' => 'post inserted without image.',
            'alert-type' => 'success',
            );
            
            return redirect()->back()->with($notification);
        }   

    }


    public function index()
    {
        $post = DB::table('posts')
                    ->join('post_category', 'posts.category_id', 'post_category.id')
                    ->select('posts.*','post_category.category_name_en')
                    ->get();

                    
        return view('admin.blog.index', compact('post'));
    }   

    public function deletePost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        $image = $post->post_image;

        if ($image) {
            unlink($image);
        }

        DB::table('posts')->where('id', $id)->delete();
        
        $notification = array(
            'message' => 'post deleted successfully.',
            'alert-type' => 'success',
            );
            
        return redirect()->back()->with($notification);

    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('admin.blog.edit', compact('post'));

    }

    public function updatePost(Request $request, $id)
    {

        $old_image = $request->old_image;

        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_ar'] = $request->post_title_ar;
        $data['category_id'] = $request->category_id;
        $data['post_details_en'] = $request->post_details_en;
        $data['post_details_ar'] = $request->post_details_ar;
        
        $post_image = $request->file('post_image');
        
        if ($post_image) {
            
            if ($old_image) {
                unlink($old_image);
            }

            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('public/media/post/' . $post_image_name);
            $data['post_image'] = 'public/media/post/'.$post_image_name;
        
            DB::table('posts')->where('id', $id)->update($data);
            $notification = array(
            'message' => 'post updated successfully.',
            'alert-type' => 'success',
            );

            return redirect()->route('all.blogpost')->with($notification);

        } else{

            if ($old_image) {
                $data['post_image'] = $old_image;

                DB::table('posts')->where('id', $id)->update($data);
                
                $notification = array(
                'message' => 'post updated without image.',
                'alert-type' => 'success',
                );
                
                return redirect()->route('all.blogpost')->with($notification);
            }
            
           
        }   
    }








}
