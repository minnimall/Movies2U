<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Movie_type;
use App\Models\Critical_rate;
use App\Models\watchlist;
use Illuminate\Support\Facades\Auth;
class MoviesController extends Controller
{
    public function home(){
        $action = Movie_type::where('type_id',"MT01")->get();
        $comedy = Movie_type::where('type_id',"MT03")->get();
        $movie = Movie::all();
        $emp = Employee::all();
        $mtype = Movie_type::all();
        $ctr = Critical_rate::all();
        return view('movie2u.Home',compact('movie','mtype','emp','mtype','ctr','action','comedy'));
    }

    public function manage(){
        $movie = Movie::all();
        $emp = Employee::all();
        $mtype = Movie_type::all();
        $ctr = Critical_rate::all();
        return view('movie2u.MovieManagement',compact('movie','emp','mtype','ctr'));
    }


    public function showMovieDetails($movieId)
    {
        $movie = Movie::where('movie_id',$movieId)->get();
        if (!$movie) {
            return abort(404);
        }
        $emp = Employee::all();
        $mtype = Movie_type::all();
        $ctr = Critical_rate::all();
        return view('movie2u.MovieDetail', compact('movie', 'emp', 'mtype', 'ctr'));
    }

    public function insertMovie(Request $request){
        $new_movie = new Movie;
        $new_employee = new Employee;
        if ($request->score < 0 || $request->score > 10) {
            return redirect()->back()->with('error', 'คะแนนต้องอยู่ระหว่าง 0 ถึง 10')->withInput();
        }

        if ($request->hasFile('img')) {
            $imgFile = $request->file('img');
            $imgFileName = $request->id . '.png'; // กำหนดนามสกุลเป็น .png
            if ($imgFile->getClientOriginalExtension() !== 'png') {
                return redirect()->back()->with('error', 'รูปภาพต้องเป็นไฟล์ .png เท่านั้น')->withInput();
            }
            $imgFile->move(public_path('Materials/Movies'), $imgFileName);
        }

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoFileName = $request->id . '.mp4'; // กำหนดนามสกุลเป็น .mp4
            if ($videoFile->getClientOriginalExtension() !== 'mp4') {
                return redirect()->back()->with('error', 'วิดีโอต้องเป็นไฟล์ .mp4 เท่านั้น')->withInput();
            }
            $videoFile->move(public_path('Materials/Movies'), $videoFileName);
        }
        $new_movie->movie_id = $request->id;
        $new_movie->movie_name = $request->name;
        $new_movie->movie_time = $request->time;
        $new_movie->movie_year_on_air = $request->year;
        $new_movie->critical_rate = $request->rate;
        $new_movie->movie_score = $request->score;
        $new_movie->movie_type_id = $request->type;
        $new_movie->movie_info = $request->info;
        $new_movie->save();
        $new_employee->emp_id = $request->emp_id;
        $new_employee->emp_name = $request->emp_name;
        $new_employee->save();
        return redirect('/moviemanagement');
    }
    public function movieform(){
        $movie = Movie::all();
        $emp = Employee::all();
        $mtype = Movie_type::all();
        $ctr = Critical_rate::all();
        return view('movie2u.insertMovieForm',compact('movie','emp','mtype','ctr'));
    }

    public function edit($id){
        $edit_movie = Movie::where('movie_id',$id)->get();
        $movie = Movie::all();
        $emp = Employee::all();
        $mtype = Movie_type::all();
        $ctr = Critical_rate::all();
        return view('movie2u.editMovieForm', compact('movie', 'emp', 'mtype', 'ctr','edit_movie'));
    }

    public function update(Request $request)
    {
        Movie::where('movie_id', $request->id)->update([
            'movie_name' => $request->name,
            'movie_time' => $request->time,
            'movie_year_on_air' => $request->year,
            'critical_rate' => $request->rate,
            'movie_score' => $request->score,
            'movie_type_id' => $request->type,
            'movie_info' => $request->info
        ]);
        return redirect('/moviemanagement');
    }

    public function deleteMovie($id) {
        $movie = Movie::where('movie_id',$id);
        $material = Movie::where('movie_id',$id)->first();

        if ($movie) {
            $imagePath = public_path('Materials/Movies/' . $material->movie_id . '.png');
            $videoPath = public_path('Materials/Movies/' . $material->movie_id . '.mp4');
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }

            $movie->delete(); // Soft delete
            return redirect('/moviemanagement')->with('success', 'Movie deleted successfully.');
        } else {
            return redirect('/moviemanagement')->with('error', 'Movie not found.');
        }
    }

    public function showType($Id){
        $mtype = Movie_type::where('type_id',$Id)->get();
        $type = Movie_type::all();
        $movie = Movie::all();
        $ctr = Critical_rate::all();
        return view('movie2u.TypeList',compact('movie','mtype','ctr','type'));
    }

    public function category(){
        $mtype = Movie_type::all();
        $type = Movie_type::all();
        $movie = Movie::all();
        $ctr = Critical_rate::all();
        return view('movie2u.Category',compact('movie','mtype','ctr','type'));
    }

    public function addwatchlist($movieId)
    {
        $user_id = Auth::id();
        
        // ตรวจสอบว่ามีการล็อกอินหรือไม่
        if (Auth::check()) {
            // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
            $user = Auth::user();

            // ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
            if ($user) {
                // สร้าง Watchlist object และกำหนดค่า 'user_id' และ 'movie_id'
                $add_watchlist = new Watchlist();
                $add_watchlist->user_id = $user->id;
                $add_watchlist->movie_id = $movieId;

                // บันทึกลงใน watchlist
                $add_watchlist->save(); 
            
        }
        return redirect()->back();
    }
}

public function show_allwatchlist(){
    $user_id = Auth::id();

    // ดึง movie_id ที่เกี่ยวข้องกับ user_id นี้จาก watchlist
    $watchlistMovies = Watchlist::where('user_id', $user_id)->pluck('movie_id');

    // ดึงข้อมูลหนังที่มี movie_id ใน watchlist
    $moviesInWatchlist = Movie::whereIn('movie_id', $watchlistMovies)->get();

    return view('movie2u.Watchlist', compact('user_id', 'moviesInWatchlist'));
}

public function deletewatchlist($id) {
    $watchlistItem = watchlist::where('movie_id', $id)->first();

    if ($watchlistItem) {
            $watchlistItem->delete();
            
        return redirect('/MyWatchlist')->with('success', 'Movie deleted successfully.');
    } else {
        return redirect('/MyWatchlist')->with('error', 'Movie not found.');
    }
}

}