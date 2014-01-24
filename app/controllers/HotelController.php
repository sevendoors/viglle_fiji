<?php

class HotelController extends BaseController {

    protected $hotel;

    public function __construct(Hotel $hotel)
    {
        parent::__construct();

		$this->hotel=$hotel;
    }
    
	/**
	 * Returns all the blog posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get all the blog posts
		$hotels = $this->hotel->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('fiji/hotel/index', compact('hotels'));
	}

	/**
	 * View a blog post.
	 *
	 * @param  string  $slug
	 * @return View
	 * @throws NotFoundHttpException
	 */
	public function getView($id)
	{
		// Get this blog post data
		$hotel = $this->hotel->where('id', '=', $id)->first();

		// Check if the blog post exists
		if (is_null($hotel))
		{
			// If we ended up in here, it means that
			// a page or a blog post didn't exist.
			// So, this means that it is time for
			// 404 error page.
			return App::abort(404);
		}


		return View::make('fiji/hotel/view_hotel', compact('hotel'));
	}

	/**
	 * View a blog post.
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
}
