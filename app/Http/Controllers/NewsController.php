<?php namespace App\Http\Controllers;
use Input;
use App\news;
use App\Http\Requests;
//use App\Http\Requests\CheckNewsRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Validator;
use HTML;
use Route;
use Cache;

class NewsController extends Controller {


	// public function __construct()
 //    {
 //        $this->filter('before', 'auth');
 //    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$news = news::all();
		//$news = news::orderBy('created_at','desc')->get();
		
		//$news = news::paginate(5);
		//$news = news::latest('created_at')->where('created_at', '<=', Carbon::now())->get();
		//
		//
		//
		$new='';
		if (Cache::has('data'))
			{
			    echo 'có';
			    $news = Cache::get('data');
			}
		else
			{
				$news = news::latest('created_at')->where('created_at', '<=', Carbon::now())->paginate(5);
				$expiresAt = Carbon::now()->addMinutes(10);
				Cache::put('data', $news, $expiresAt);
			}

		
		return view('pages.news')->with('data',$news);



		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pages.news_create');
	
}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$dulieu_tu_input = $request->all();
		$validator = Validator::make($dulieu_tu_input,
										[
										'title' => 'required|unique:news|min:6',
										'created_at' =>'required|date'
										]
		);

		//var_dump($dulieu_tu_input);


		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}
		else
		{
			if (Input::hasFile('image'))
			{
			   
			     $destinationPath = 'uploads'; //  publics/uploads
			     $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			      Input::file('image')->getFilename();//getting temp image filename.tmp
			      Input::file('image')->getClientSize(); //get size in byte
			      $type = Input::file('image')->getClientMimeType(); //get minetype
			      Input::file('image')->getRealPath();//temp foler in local
			      $minetype  = array('image/jpg','image/jpeg','image/png');
			      if (in_array($type, $minetype))
			      {
				      $filename =  Input::file('image')->getClientOriginalName();//get real filename.extension
				      $mixed_filename= str_slug((pathinfo($filename, PATHINFO_FILENAME))).'_'.time().'.'.$extension;
				      $mixed_filename = strtolower($mixed_filename);
				      Input::file('image')->move($destinationPath, $mixed_filename); // uploading file to given path
				      //news::create($dulieu_tu_input);
						
						$new = new news;
						$new->title=$dulieu_tu_input['title'];
						$new->description=$dulieu_tu_input['description'];
						$new->content=$dulieu_tu_input['content'];
						$new->created_at=$dulieu_tu_input['created_at'];
						$new->image=$mixed_filename;
						$new->save();
						Session::flash('success', 'Upload successfully'); 
						return redirect('news');
			     }
			      else
			     {
			      	return redirect()->back()->withErrors(['Your file is not supported. Your record not saved']);
			      }
			   
			}
			
			
		}



		// $new = new news;
		// $new->title=$dulieu_tu_input['title'];
		// $new->description=$dulieu_tu_input['description'];
		// $new->content=$dulieu_tu_input['content'];
		// $new->image=$dulieu_tu_input['image'];
		// $new->save();
		//
		//


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = news::findOrFail($id);

			// echo '<pre>';
			// print_r($news);//give me a array
			// echo '</pre>';

		return view('pages.news_edit')->with('news',$news);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$news = news::findOrFail($id);
		$news->update($request->all());
		return redirect('news');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = news::findOrFail($id);
		$news->delete();
		Session::flash('success','Successfully deleted the news');
		return redirect('news');
	}

}
