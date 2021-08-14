<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{

    public function blogView(Request $request)
    {

        $value = $request->value;
        if (is_numeric($value)) {
            $blogs = Blogs::where('id', '=', $value)->first();
        } else {
            $blogs = Blogs::where('title', '=', $value)->first();
        }

        // dd($blogs->private);

        if ($blogs !== null) {



            if ($blogs->private == 0) {
                $page = Page::where('user', '=', 1)->first();
                $usuario = User::select('contactos')
                    ->where('id', '=', 1)->first();
                $contactos = json_decode($usuario->contactos);

                return view('/layouts/blog', compact('blogs', 'page', 'contactos'));
            } else {
                try {

                    if (Auth::user()->tipo_usuario == 1) {
                        $page = Page::where('user', '=', 1)->first();
                        $usuario = User::select('contactos')
                            ->where('id', '=', 1)->first();
                        $contactos = json_decode($usuario->contactos);

                        return view('/layouts/blog', compact('blogs', 'page', 'contactos'));
                    } else {
                        return 404;
                        // return response()->view('errors.404', [], 404);
                    }
                } catch (Exception $e) {
                    return 404;
                    // return response()->view('errors.404', [], 404);
                }
            }
        } else {
            return 404;
        }
    }

    public function blogSearch(Request $request)
    {
        $value = $request->value;


        if ($value != "") {
            if (Auth::check()) {
                $blogs = Blogs::where('title', 'like', "%" . $value . "%")
                    ->orwhere('related', 'like', "%" . $value . "%")->get();
            } else {
                $blogs = Blogs::where('title', 'like', "%" . $value . "%")
                    ->where('private', '=', 0)
                    ->orwhere('related', 'like', "%" . $value . "%")
                    ->where('private', '=', 0)->get();
            }
        } else {
            $blogs = null;
        }

        $page = Page::where('user', '=', 1)->first();
        $usuario = User::select('contactos')
            ->where('id', '=', 1)->first();
        $contactos = json_decode($usuario->contactos);

        return view('/layouts/search', compact('blogs', 'page', 'contactos'));
    }

    public function blogsView(Request $request)
    {
        $blogs = Blogs::all();
        $page = Page::where('user', '=', 1)->first();

        return view('admin/blogsConfig', compact('blogs', 'page'));
    }

    public function getBlog(Request $request)
    {
        $blog = Blogs::where('id', '=', $request->id)->first();
        return $blog;
    }

    public function getAllBlogs()
    {
        return Blogs::all();
    }


    public function addBlog(Request $request)
    {

        // dd($request->all());
        if ($archivo = $request->file('header_img')) {
            $nameLogo = "blogs_" . $request->title . $archivo->getClientOriginalName();
            $archivo->move('blogs/', $nameLogo);
        } else {
            $nameLogo = "";
        }
        if ($request->input('url_header') != "") {
            $nameLogo = $request->input('url_header');
        }

        if (isset($request->private)) {
            $private = true;
        } else {
            $private = false;
        }


        // dd($request, $nameLogo);
        DB::table('blogs')->insert([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "html_content" => $request->input('html_content'),
            "header_img" => $nameLogo,
            "private" => $private,
            "related" => '[' . $request->input('related') . ']',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function deleteBlog(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('blogs')
            ->select('blogs.*')
            ->Where('blogs.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            return "eliminado";
        }
        return "error al eliminar";
        // return view('vendedor', compact('resp'));
    }

    public function updateBlog(Request $request)
    {

        if ($archivo = $request->file('header_img') || $request->input('url_header') != "") {
            if ($archivo = $request->file('header_img')) {
                $nameLogo = "blogs/blog_" . $request->title . $archivo->getClientOriginalName();
                $archivo->move('blogs/', $nameLogo);
            } else {
                $nameLogo = "";
            }
            if ($request->input('url_header') != "") {
                $nameLogo = $request->input('url_header');
            }
        } else {
            $nameLogo = $request->input('url_hidden');
        }


        if (isset($request->private)) {
            $private = true;
        } else {
            $private = false;
        }

        $id = $request->input('idInput');
        DB::table('blogs')
            ->where('id', '=', $id)
            ->update([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "html_content" => $request->html_content,
                "header_img" => $nameLogo,
                "private" => $private,
                "related" => '[' . $request->input('related') . ']',
                "updated_at" => Carbon::now(),
            ]);


        // dd($resp);
        return redirect()->back();
    }
    public function privateBlog(Request $request)
    {
        $id = $request->id;

        $toCheck = $request->private;
        if ($toCheck == 1) {
            $toCheck = 0;
        } else {
            if ($toCheck == 0)
                $toCheck = 1;
        }
        $resp = DB::table('blogs')
            ->where('id', '=', $id)
            ->update([
                "private" => $toCheck,
                "updated_at" => Carbon::now(),
            ]);
        // dd($resp);
        if ($resp == 1) {
            return $toCheck;
        } else {
            return -1;
        }
    }
}
