<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Http\Requests\admin\ArticleRequest;
use App\Contracts\ArticleInterface;
use App\Contracts\UserInterface;
use App\Contracts\YoutubeInerface;
use App\Contracts\GalleryInterface;
use App\Contracts\LanguageInterface;
use App\Contracts\NewsInterface;
use App\Contracts\PageGalleryServiceInterface;
use View;
use Session;
use Validator;
use Auth;
use File;
use Cookie;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends BaseController
{

    /**
     * AdminController constructor.
     * @param LanguageInterface $langRepo
     */
	public function __construct(LanguageInterface $langRepo)
    {
        parent::__construct($langRepo);
        $this->middleware('authadmin', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }

    /**
     * Admin Login
     * get /ab-admin
     *
     * @param
     * @return view
     */
    public function getLogin()
    {//dd(1);
    	//$remember = Cookie::get('remember');

    	// if(isset($remember)){

    	// 	//$user_cookie = Cookie::get('remember');

    	// 	$data = [
	    // 		'cookie_user' => $user_cookie,
	    // 	];
	    // 	return view('admin.admin-login.admin-login',$data);
    	// }else{
			return view('admin.admin-login.admin-login');
    	//}
		//return view('admin.admin-login.admin-login');
    }

    /**
      * Admin Logout
      * GET /admin/login-out
      *
      * @param 
      * @return redirect
     */
    public function getLogout()
    {   
        Auth::logout();
        return redirect()->action('AdminController@getLogin');
    }

    /**
     * Admin Login
     * post /ab-admin/login
     *
     * @param AdminLoginRequest $request
     * @return redirect
     */
    public function postLogin(AdminLoginRequest $request)
    {
    	$email = $request->get('email');
    	$password  = $request->get('password');
    	
    	// if ($request->input('remember_me')) {
    	// 	$response = Cookie::forever('remember',Auth::user());
    	// }

    	if(Auth::attempt ([
            'email'=>$email,
            'password'=>$password,
            'role' => 'main-admin',
            ]))
        {
            if($request->input('remember_me')) {
        		$response = Cookie::forever('remember',Auth::user());
        		$cookie =  \Response::make('www')->withCookie($response);
        		return redirect()->action('AdminController@getDashboard')->withCookie($response);
        	}else{
        		return redirect()->action('AdminController@getDashboard');
        	}        	
        }else{
        	return redirect()->back()->with('error_danger', 'Invalid login or password');
        }
    }

    /**
     * @param UserInterface $userRepo
     * @return View
     */
    public function getDashboard(UserInterface $userRepo)
    {
        $all_user = $userRepo->getAllUser();
        $all_user_reg = $userRepo->getUserReg();
        $all_user_facebook = $userRepo->getAllUserFacebook();
        $all_user_google = $userRepo->getAllUserGoogle();
        $all_user_tweeter = $userRepo->getAllUserTweeter();
        $data = [
            'all_user' => $all_user,
            'all_user_reg' => $all_user_reg,
            'face_user' => $all_user_facebook,
            'google_user' => $all_user_google,
            'tweeter_user' => $all_user_tweeter,
        ];
    	return view('admin.dashboard',$data);
    }

    /**
     * Get Add Article
     * Get ab-admin/article
     *
     * @param 
     * @return view
     */
    public function getAddArticle()
    {
    	return view('admin.article.article');
    }

    /**
     * @param ArticleRequest $request
     * @param ArticleInterface $articleRepo
     * @return mixed
     */
    public function postAddArticle(ArticleRequest $request,ArticleInterface $articleRepo)
    {
    	$result = $request->all();
    	$logoFile = $result['image']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/article_uploade';
        $result_move = $result['image']->move($path, $name.'.'.$logoFile); 
        $article_images = $name.'.'.$logoFile;

    	$data = [
    		'description' => $result['description'],
    		'title' => $result['title'],
    		'image' => $article_images
    	];
    	$articleRepo->createArticle($data);
    	return redirect()->action('AdminController@getArticleList');
    }

    /**
     * POST Add article image
     * POST ab-admin/article-uploade
     *
     * @param request $request
     * @return response
     */
    public function postUploadeArticleAjax(request $request)
    {
    	$result = $request->all();
    	$logoFile = $result['file']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/article_uploade';
        $result_move = $result['file']->move($path, $name.'.'.$logoFile);
        $article_images = $name.'.'.$logoFile;
        return response()->json($article_images);
    }

    /**
     * GET Article List
     * GET ab-admin/article-list
     * 
     * @param ArticleInterface $articleRepo
     * @return view
     */
    public function getArticleList(ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getAllPaginate();
        $data = [
            'articles' => $result,
        ];
        return view('admin.article.article-list',$data);
    }
    
    /**
     * GET delete article
     * GET ab-admin/article-delete/{id}
     *
     * @param $id
     * @param ArticleInterface $articleRepo
     * @return redirect
     */
    public function getDeleteArticle($id,ArticleInterface $articleRepo)
    {
        $file = $articleRepo->getOne($id);
        $filename = public_path() . '/assets/admin/images/article_uploade/' . $file['image'];
        $status = File::delete($filename);
        $articleRepo->deleteArticle($id);
        return redirect()->back()->with('error','Your file was delete succesfully');
    }

    /**
     * GET edit article
     * GET ab-admin/article-edit/{id}
     * 
     * @param $id
     * @param ArticleInterface $articleRepo
     * @return view
     */
    public function getEditArticle($id,ArticleInterface $articleRepo)
    {
        $result = $articleRepo->getOne($id);
        $data = [
            'articles' => $result
        ];
        return view('admin.article.article-edit',$data);
    }

    /**
     * POST update article
     * POST ab-admin/article-update
     * 
     * @param request $request
     * @param ArticleInterface $articleRepo
     * @return redirect
     */
    public function postUpdateArticle(request $request,ArticleInterface $articleRepo)
    {
        $result = $request->all();
        $id = $result['id'];
       
        if (isset($result['image'])) {
            $oldObj = $articleRepo->getOne($id);
            $oldImg = public_path() .'/assets/admin/images/article_uploade/' . $oldObj->image;
            File::delete($oldImg);
            $logoFile = $result['image']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/admin/images/article_uploade';
            $result_move = $result['image']->move($path, $name.'.'.$logoFile);
            $article_images = $name.'.'.$logoFile;
            $result['image'] = $article_images;
        }
        
        $articleRepo->getUpdateArticle($id,$result);
        return redirect()->action('AdminController@getArticleList');
    }

    /**
     * GET Youtube
     * GET ab-admin/youtube
     *
     * @param YoutubeInerface $youtbeRepo
     * @return view
     */
    public function getYoutube(YoutubeInerface $youtbeRepo)
    {
        $result = $youtbeRepo->getAllYoutbeVideoPaginate();
        $data = [
            'vidoes' => $result
        ];
        return view('admin.youtube.youtube',$data);
    }

    /**
     * POST add youtube video
     * POST ab-admin/add-youtube
     *
     * @param request $request
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
     */
    public function postAddYoutbeVideo(request $request,YoutubeInerface $youtbeRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'video' => 'required',
            'width' => 'required',
            'height' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $youtbeRepo->createYoutubeVideo($result);
        }
        return redirect()->back();
    }

    /**
     * GET delete youtube video
     * GET ab-admin/youtube/{id}
     * 
     * @param $id
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
     */
    public function getDeleteYoutube($id,YoutubeInerface $youtbeRepo)
    {
        $youtbeRepo->deletevideo($id);
        return redirect()->back()->with('error','You are delete this file');
    }

    /**
     * GET edit youtube video
     * GET ab-admin/youtube-edit/{id}
     *
     * @param $id
     * @param YoutubeInerface $youtbeRepo
     * @return view
     */
    public function getEditYoutubeVideo($id,YoutubeInerface $youtbeRepo)
    {
        $result = $youtbeRepo->getOneYoutubeVideo($id);
        $data = [
            'videos' => $result
        ];
        return view('admin.youtube.edit-youtube-video',$data);
    }

    /**
     * GET Gallery
     * GET ab-admin/gallery-list
     * 
     * @param GalleryInterface $galleryRepo
     * @return view
     */
    public function getGallery(GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getAll();
        $data = [
          'images' => $result
        ];
        return view('admin.gallery.gallery',$data);
    }

    /**
     * GET Add Gallery page
     * GET ab-admin/add-gallery
     * 
     * @param 
     * @return view
     */
    public function getAddGallery()
    {
       return view('admin.gallery.add-gallery');
    }

    /**
     * POST Add Gallery
     * POST ab-admin/add-gallery
     * 
     * @param request $request
     * @param GalleryInterface $galleryRepo
     * @return redirect
     */
    public function postAddGallery(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'image_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            foreach ($result['image_name'] as $key => $image) {
                $logoFile = $image->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/admin/images/gallery_uploade';
                $result_move = $image->move($path, $name.'.'.$logoFile);
                $article_images = $name.'.'.$logoFile;
                $data['image_name'] = $article_images;
                $galleryRepo->createGallery($data);
            }
            return redirect()->action('AdminController@getGallery');
        }
    }

    /**
     * GET Delete gallery
     * GET ab-admin/delete-gallery/{id}
     * 
     * @param $id
     * @param GalleryInterface $galleryRepo
     * @return response
     */
    public function getDeleteGallery($id,GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getOne($id);
        $imgname = $result->image_name;
        $path = public_path() . '/assets/admin/images/gallery_uploade/' . $imgname;
        File::delete($path);
        $galleryRepo->deleteGallery($id);
        return response()->json();
    }

    /**
     * POST edit gallery images
     * POST ab-admin/gallery-image-edit
     * 
     * @param request $request
     * @param GalleryInterface $galleryRepo
     * @return response
     */
    public function posteditGalleryImages(request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        $id = $result['id'];
        $row = $galleryRepo->getOne($id);
        $oldPath = public_path() . '/assets/admin/images/gallery_uploade/' . $row['image_name'];
        File::delete($oldPath);
        $logoFile = $result['file']->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/assets/admin/images/gallery_uploade';
        $result_move = $result['file']->move($path, $name.'.'.$logoFile);
        $gallery_images = $name.'.'.$logoFile;
        $data['image_name'] = $gallery_images;
        $galleryRepo->updateImagesGallery($id,$data);
        return response()->json($gallery_images);
    }

    /**
     * POST yutube parametrs on of
     * POST ab-admin/youtube-autoplay
     * 
     * @param request $request
     * @param YoutubeInerface $youtbeRepo
     * @return redirect
     */
    public function postAutoplay(request $request,YoutubeInerface $youtbeRepo)
    {
        $result = $request->all();
        

        if(isset($result['width']) || isset($result['height'])){
            $data4 = [
                'width' => $result['width'],
                'height' => $result['height']
            ];
          
            $youtbeRepo->getUpdateYoutube($result['video_id'],$data4);
            return redirect()->back();
        }
        $id = $result['id'];
        if(isset($result['autoplay'])){
            if($result['autoplay'] == 1){
                $data1 = [
                    'autoplay' => '1',
                ];
            }else{
                $data1 = [
                    'autoplay' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data1);
        }

        if(isset($result['info'])){
            if($result['info'] == 1){
                $data2 = [
                    'info' => '1',
                ];
            }else{
                $data2 = [
                    'info' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data2);
        }

        if(isset($result['panel'])) {
             if($result['panel'] == 1){
                $data2 = [
                    'panel' => '1',
                ];
            }else{
                $data2 = [
                    'panel' => '0',
                ];
            }
            $youtbeRepo->getUpdateYoutube($id,$data2);
        }        
        $data = [
            'video' => $result['video']
        ];
        $youtbeRepo->getUpdateYoutube($id,$data);
        return response()->json($data);
    }

    /**
     * @return View
     */
    public function getNewsList(NewsInterface $newRepo)
    {
        $result = $newRepo->getAll();
        $data = [
            'news' => $result
        ];
        return view('admin.pages.news.news-list',$data);
    }



    /**
     * @return View
     */
    public function  getAddNews()
    {
        return view('admin.pages.news.add-news');
    }

    public function postAddNews(request $request,NewsInterface $newRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if ($request['image']){
                $logoFile = $result['image']->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/page_uploade/news';
                $result_move =  $result['image']->move($path, $name.'.'.$logoFile);
                $images = $name.'.'.$logoFile;
                $data['image'] = $images;
                $data['description'] = $result['description'];
                $data['title'] = $result['title'];
            }else{
                $data['description'] = $result['description'];
                $data['title'] = $result['title'];
            }
            $newRepo->getCreate($data);
        }
        return redirect(action('AdminController@getNewsList'));
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @return mixed
     */
    public function getDeleteNews($id,NewsInterface $newsRepo)
    {
        $res = $newsRepo->getOne($id);
        if($res->image == ""){
            $newsRepo->getdelete($id);
        }else{
            $path =  public_path().'/page_uploade/news/'.$res->image;
            $newsRepo->getdelete($id);
            File::delete($path);
        }
        return redirect()->back()->with('error',"File deleted");
    }

    /**
     * @param $id
     * @param NewsInterface $newRepo
     * @return View
     */
    public function getOneNews($id,NewsInterface $newRepo)
    {
       $result = $newRepo->getOne($id);
       $data = [
           'news' => $result
       ];
        return view('admin.pages.news.edit-news',$data);
    }

    /**
     * @param Request $request
     * @param NewsInterface $newRepo
     * @return mixed
     */
    public function postEditNews(request $request,NewsInterface $newRepo)
    {
       $result = $request->all();
       if(isset($result['image'])){
           $oldObj = $newRepo->getOne($result['id']);
           $oldImg = public_path() .'/page_uploade/news/' . $oldObj->image;
           File::delete($oldImg);
           $logoFile = $result['image']->getClientOriginalExtension();
           $name = str_random(12);
           $path = public_path() . '/page_uploade/news';
           $result_move = $result['image']->move($path, $name.'.'.$logoFile);
           $news_images = $name.'.'.$logoFile;
           $result['image'] = $news_images;
       }
       $newRepo->getUpdate($result['id'],$result);
       return redirect()->action('AdminController@getNewsList');
    }

    /**
     * @param $page_id
     * @param $category_id
     * @param PageGalleryServiceInterface $pageGalleryRepo
     * @return View
     */
    public function getPageGallery($page_id,$category_id,PageGalleryServiceInterface $pageGalleryRepo)
    {
        $result = $pageGalleryRepo->getPageCategory($page_id,$category_id);
        $data = [
            'page_id' => $page_id,
            'category_id' => $category_id,
            'gallerys' => $result
        ];
        return view('admin.pages.gallery.page_gallery',$data);
    }


    public function postAddPageGallery(request $request,PageGalleryServiceInterface $pageGalleryRepo,$page_id,$category_id)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            foreach ($result['image'] as $key => $image) {
                $logoFile = $image->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/page_uploade/page_gallery';
                $result_move = $image->move($path, $name.'.'.$logoFile);
                $page_gallery_images = $name.'.'.$logoFile;
                $data['image'] = $page_gallery_images;
                $data['page_id'] = $page_id;
                $data['category_id'] = $category_id;
                $pageGalleryRepo->getCreate($data);
            }
            //return redirect()->action('AdminController@getGallery');
        }
    }

    /**
     * @return View
     */
    public function getSport()
    {
        return view('admin.pages.sport.sport');
    }

    /**
     * @return View
     */
    public function getGames()
    {
        return view('admin.pages.games.games');
    }

    /**
     * @return View
     */
    public function getVideo()
    {
        return view('admin.pages.video.video');
    }

    /**
     * @return View
     */
    public function getShowBiznes()
    {
        return view('admin.pages.showbiznes.showbiznes');
    }

    /**
     * @return View
     */
    public function getCulture()
    {
        return view('admin.pages.culture.culture');
    }

    /**
     * @return View
     */
    public function getLanguage()
    {
        return view('admin.language.language');
    }

    /**
     * @param Request $request
     * @param LanguageInterface $langRepo
     * @return mixed
     */
    public function postAddLanguage(request $request,LanguageInterface $langRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'lang_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $langRepo->createLang($result);
        }
        return redirect()->action('AdminController@getLanguageList');
    }

    /**
     * @param LanguageInterface $langRepo
     * @return View
     */
    public function getLanguageList(LanguageInterface $langRepo)
    {
        $result = $langRepo->getAll();
        $data = [
            'languages' => $result
        ];
        return view('admin.language.language-list',$data);
    }

    /**
     * @param $id
     * @param LanguageInterface $langRepo
     * @return mixed
     */
    public function getDeleteLanguage($id,LanguageInterface $langRepo)
    {
        $langRepo->deleteLanguage($id);
        return redirect()->back()->with('error','language deleted');
    }

    /**
     * 
     */
    public function getCropImage($id,GalleryInterface $galleryRepo)
    {
        $result = $galleryRepo->getOne($id);
        $data = [
            'gallerys'=>$result
        ];
        return view('admin.gallery.gallery-crop',$data);
    }

    /**
     * 
     */
    public function postCropImages(Request $request)
    {
        $result = $request->all();
        $data_crop = $result['data_crop'];
        $crop_image =  json_decode($data_crop);
        if($crop_image != '')
        {
            $imag = explode('/',$request->get('data'));
            $imag = end($imag);
            $name = str_random();
            $format = explode('.', $imag);
            $format = end($format);

            $name = $name.'.'.$format;
            $path = public_path().'/assets/admin/images/gallery_uploade/';
            $newPath = public_path().'/assets/admin/images/gallery_uploade/';
            $img = Image::make($path.$imag);

            //dd($crop_image->width);
            $width = round($crop_image->width);
            $height = round($crop_image->height);

            $x = round($crop_image->x);
            $y = round($crop_image->y);

            if($width == 0){
                $width = 1;
            }
            if($height == 0)
            {
                $height = 1;
            }
            $img->crop($width, $height, $x, $y);
            $img->save($newPath.$name);
            $data['image_name'] = $name;
            return response()->json($data);
        }
    }

    /**
     * @param Request $request
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function postUpdeCropImage(Request $request,GalleryInterface $galleryRepo)
    {
        $result = $request->all();
        unset($result['_token']);
        $img = $result['image_name'];
        $id = $result['id'];
        $data = [
            'image_name' => $img
        ];
        $galleryRepo->updateImagesGallery($id,$data);
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @param GalleryInterface $galleryRepo
     * @return mixed
     */
    public function postResizeimage(request $request,GalleryInterface $galleryRepo)
    {
        $id = $request->get('id');
        $width = $request->get('width');
        $height = $request->get('height');
        $resullt = $galleryRepo->getOne($id);
        $image = $resullt->image_name;
        $imag = explode('/', $image);
        $imag = end($imag);

        $name = str_random();
        $format = explode('.', $imag);
        $format = end($format);

        $name = $name.'.'.$format;
        $path = public_path().'/assets/admin/images/gallery_uploade/';

        $img = Image::make($path.$imag);
        $img->resize($width, $height);
        $img->save($path.$imag);
        return response()->json($name);
    }

    


}
