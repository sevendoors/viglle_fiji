<?php

class AdminHotelsController extends AdminController {


    /**
     * Post Model
     * @var Post
     */
    protected $hotel;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Hotel $hotel)
    {
        parent::__construct();
        $this->hotel = $hotel;
    }

    /**
     * Show a list of all the blog posts.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        //$title = Lang::get('admin/hotels/title.hotel_management');

			$title = "酒店管理";
        // Grab all the blog posts
        $hotels = $this->hotel;

        // Show the page
        return View::make('admin/hotels/index', compact('hotels', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        //$title = Lang::get('admin/hotels/title.create_a_new_hotel');

	$title = "新增酒店";
        // Show the page
        return View::make('admin/hotels/create_edit', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required|min:3',
            'content' => 'required|min:3',
			'price'   => 'required|numeric',
			'pic1_url' => 'required|image|max:1000',
			'pic2_url' => 'required|image|max:1000',
			'pic3_url' => 'required|image|max:1000',
			'pic4_url' => 'required|image|max:1000'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $user = Auth::user();

            // Update the blog post data
            $this->hotel->name            = Input::get('name');
            $this->hotel->price            = Input::get('price');
            $this->hotel->content          = Input::get('content');
	    //图片处理
	    $imgDir1 = $this->iArtMkPicDir($this->hotel->name,0);
	    $imgDir2 = $this->iArtMkPicDir($this->hotel->name,1);
	    $imgDir3 = $this->iArtMkPicDir($this->hotel->name,2);
	    $imgDir4 = $this->iArtMkPicDir($this->hotel->name,3);
		$this->hotel->pic1_url  =	$imgDir1;//保存图片目录到数据库
		$this->hotel->pic2_url  =	$imgDir2;//保存图片目录到数据库
		$this->hotel->pic3_url  =	$imgDir3;//保存图片目录到数据库
		$this->hotel->pic4_url  =	$imgDir4;//保存图片目录到数据库
	    $image1	=	Input::file('pic1_url');
	    $image2	=	Input::file('pic2_url');
	    $image3	=	Input::file('pic3_url');
	    $image4	=	Input::file('pic4_url');
		$this->iArtSavePic($imgDir1,$image1);
		$this->iArtSavePic($imgDir2,$image2);
		$this->iArtSavePic($imgDir3,$image3);
		$this->iArtSavePic($imgDir4,$image4);
	    

            if($this->hotel->save())
            {
                return Redirect::to('admin/hotels/' . $this->hotel->id . '/edit')->with('success', Lang::get('admin/hotels/messages.create.success'));
            }
            return Redirect::to('admin/hotels/create')->with('error', Lang::get('admin/hotels/messages.create.error'));
        }
		return Redirect::to('/');
	}

	private function iArtMkPicDir($name,$int){
			$imgDir = 'site/hotels/'.$name.time().'/'.$int;
			if(!is_dir($imgDir)){
					$this->mkdirs($imgDir);
			}

			return $imgDir;
	}

	private function mkdirs($dir){
			if(!is_dir($dir))  
			{  
					if(!$this->mkdirs(dirname($dir))){  
							return false;  
					}  
					if(!mkdir($dir,0777)){  
							return false;  
					}  
			}  
			return true;  
	}

	private function iArtSavePic($imgDir,$image){
	    $origin_url	=	$imgDir."/origin.jpg";
		$thumb_url	=	$imgDir."/thumb.jpg";
		$origin	= Image::make($image->getRealPath());
		$thumb	= Image::make($image->getRealPath())->resize(30,60);
		$origin->save($origin_url);
		$thumb->save($thumb_url);
	}


    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($hotel)
	{
        // redirect to the frontend
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($hotel)
	{
        // Title
        $title = Lang::get('admin/hotels/title.hotel_update');

        // Show the page
        return View::make('admin/hotels/create_edit', compact('hotel', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($hotel)
	{

        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the blog post data
            $hotel->title            = Input::get('title');
			$hotel->link			 = Input::get('link');
			$hotel->price			 = Input::get('price');
            $hotel->content          = Input::get('hotel');

            // Was the blog post updated?
            if($hotel->save())
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/hotels/' . $hotel->id . '/edit')->with('success', Lang::get('admin/hotels/messages.update.success'));
            }

            // Redirect to the blogs post management page
            return Redirect::to('admin/hotels/' . $hotel->id . '/edit')->with('error', Lang::get('admin/hotels/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/hotels/' . $hotel->id . '/edit')->withInput()->withErrors($validator);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function getDelete($hotel)
    {
        // Title
        $title = Lang::get('admin/hotels/title.blog_delete');

        // Show the page
        return View::make('admin/hotels/delete', compact('hotel', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete($hotel)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $hotel->id;
            $hotel->delete();

            // Was the blog post deleted?
            $hotel = Hotel::find($id);
            if(empty($hotel))
            {
                // Redirect to the blog posts management page
                return Redirect::to('admin/hotels')->with('success', Lang::get('admin/hotels/messages.delete.success'));
            }
        }
        // There was a problem deleting the blog post
        return Redirect::to('admin/hotels')->with('error', Lang::get('admin/hotels/messages.delete.error'));
    }

    /**
     * Show a list of all the blog posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $hotels = Hotel::select(array('hotels.id', 'hotels.name', 'hotels.pic1_url', 'hotels.pic2_url', 'hotels.pic3_url','hotels.pic4_url',  'hotels.content','hotels.created_at'));

        return Datatables::of($hotels)

		->add_column('图片','<img class="iframe" src="{{{ URL::to(  $pic1_url  )}}}/thumb.jpg" /><img class="iframe" src="{{{ URL::to(  $pic2_url  )}}}/thumb.jpg" /><img class="iframe" src="{{{ URL::to(  $pic3_url  )}}}/thumb.jpg" /><img class="iframe" src="{{{ URL::to(  $pic4_url  )}}}/thumb.jpg" />')
        ->add_column('actions', '<a href="{{{ URL::to(\'admin/hotels/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/hotels/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')
	->remove_column('pic1_url')
	->remove_column('pic2_url')
	->remove_column('pic3_url')
	->remove_column('pic4_url')


        ->remove_column('id')

        ->make();
    }

}
