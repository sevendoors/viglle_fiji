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
        $title = Lang::get('admin/hotels/title.hotel_management');

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
        $title = Lang::get('admin/hotels/title.create_a_new_hotel');

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
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $user = Auth::user();

            // Update the blog post data
            $this->hotel->title            = Input::get('title');
            $this->hotel->price            = Input::get('price');
            $this->hotel->link             = Input::get('link');
            $this->hotel->content          = Input::get('content');
            $this->hotel->user_id          = $user->id;

			//保存hotel相关图片
            // Was the blog post created?
            if($this->hotel->save())
            {
			$hotelpic	=	new HotelPic;
			$hotelpic->hotel_id =	$this->hotel->id;
			$hotelpic->user_id	=	Auth::user()->id;
			$hotelpic->pic_url	=	Input::get('pic_url');
			$this->hotel->hotelpics()->save($hotelpic);
                // Redirect to the new blog post page
                return Redirect::to('admin/hotels/' . $this->hotel->id . '/edit')->with('success', Lang::get('admin/hotels/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/hotels/create')->with('error', Lang::get('admin/hotels/messages.create.error'));
        }

        // Form validation failed
        //return Redirect::to('admin/hotels/create')->withInput()->withErrors($validator);
		return Redirect::to('/');
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
        $hotels = Hotel::select(array('hotels.id', 'hotels.title', 'hotels.id as comments', 'hotels.created_at'));

        return Datatables::of($hotels)

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/hotels/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/hotels/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')


        ->remove_column('id')

        ->make();
    }

}
