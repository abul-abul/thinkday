<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

use App\Http\Requests\user\UserRequest;

use App\Contracts\UserInterface;
use App\Contracts\LanguageInterface;
use App\Contracts\NewsInterface;
use App\Contracts\SportInterface;
use App\Contracts\GameCategoryInterface;
use App\Contracts\GamePageInterface;
use App\Contracts\InteresInterface;
use App\Contracts\SubscripeInterface;
use App\Contracts\PageGalleryServiceInterface;
use App\Contracts\YoutubeInerface;
use App\Contracts\RatingInterface;


use App\Http\Requests;
use Validator;
use Auth;
use Socialite;
use Storage;
use Mail;



class UsersController extends BaseController
{


    /**
     * Create a new instance of BaseController class.
     *
     * @param LanguageInterface $langRepo
     */
	public function __construct(LanguageInterface $langRepo,SubscripeInterface $subscripeRepo)
    {
        parent::__construct($langRepo,$subscripeRepo);
       // $this->middleware('auth', ['except' => ['getLogin', 'postLogin','getLogout']]);
       // $this->middleware('language');

    }



    /**
     * @return mixed
     * @internal param Request $request
     */
    public function getLayOut()
    {
        return view('app-user');
    }

    /**
     * @return mixed
     */
    public function getHome(NewsInterface $newsRepo,InteresInterface $interesRepo)
    {
        $news = $newsRepo->getLastRow();
        $news_rand = $newsRepo->getRandomNews();
        $interests = $interesRepo->getLastRow();
        $interest_rand = $interesRepo->getRandomInteres();
        $data = [
            "news" => $news,
            "news_rands" => $news_rand,
            'interests' => $interests,
            "interest_rands" => $interest_rand
        ];
        return view('user.home',$data);
    }

    /**
     * @param InteresInterface $interesRepo
     * @return mixed
     */
    public function getInteres(InteresInterface $interesRepo)
    {
        $result = $interesRepo->getAllPaginate();
        $randNews = $interesRepo->getRandomInteres();
        $data = [
            'rand_interests' => $randNews,
            'interests' => $result
        ];
        return view('user.interes.interes',$data);
    }

    /**
     * @param $id
     * @param InteresInterface $interesRepo
     * @param PageGalleryServiceInterface $pageGalleryRepo
     * @param YoutubeInerface $youtubeRepo
     * @return mixed
     */
    public function getInteresCategory($id,InteresInterface $interesRepo,PageGalleryServiceInterface $pageGalleryRepo,YoutubeInerface $youtubeRepo)
    {
        $gallerys = $pageGalleryRepo->getPageCategory(4,$id);
        $video = $youtubeRepo->getPageCategoryVideo(4,$id);

        $result = $interesRepo->getOne($id);
        if(count($result) == null){
            abort(404);
        }
        $randNews = $interesRepo->getRandomInteres();
        $data = [
            'interests' => $result,
            'gallerys' => $gallerys,
            'videos' => $video,
            'rand_interests' => $randNews,
        ];
        return view('user.interes.interes-category',$data);
    }



    /**
     * @param $id
     * @param InteresInterface $interesRepo
     * @return mixed
     */
    public function getShowMoreInterest($id,InteresInterface $interesRepo)
    {
        $result = $interesRepo->showMoreInterest($id);

        $data = [
           'interests' => $result
        ];
        $showView = view('user.interes.show-more-interest', $data)->render();
        return response()->json(["status"=>"success","resource"=>$showView]);
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @return mixed
     */
    public function getShowMoreNews($id,NewsInterface $newsRepo)
    {
        $result = $newsRepo->getShowMoreNews($id);
        $data = [
            'news' => $result
        ];
        $showView = view('user.news.show-more-news', $data)->render();
        return response()->json(["status"=>"success","resource"=>$showView]);
    }

    /**
     * @param NewsInterface $newsRepo
     * @return mixed
     */
    public function getNews(NewsInterface $newsRepo)
    {
        $result = $newsRepo->getAllPaginate();
        $randNews = $newsRepo->getRandomNews();
        $data = [
            'rand_news' => $randNews,
            'news' => $result
        ];
        return view('user.news.news',$data);
    }

    /**
     * @param $id
     * @param NewsInterface $newsRepo
     * @param PageGalleryServiceInterface $pageGalleryRepo
     * @param YoutubeInerface $youtubeRepo
     * @return mixed
     */
    public function getNewsCategory($id,NewsInterface $newsRepo,PageGalleryServiceInterface $pageGalleryRepo,YoutubeInerface $youtubeRepo)
    {
        $gallerys = $pageGalleryRepo->getPageCategory(2,$id);
        $video = $youtubeRepo->getPageCategoryVideo(2,$id);

        $result = $newsRepo->getOne($id);
        if (count($result) == null)
        {
            abort(404);
        }
        $randNews = $newsRepo->getRandomNews();
        $data = [
            'news' => $result,
            'gallerys' => $gallerys,
            'videos' => $video,
            'rand_news' => $randNews,
            'id' => $id
        ];
        return view('user.news.news-category',$data);
    }


    /**
     * @param SportInterface $sportRepo
     * @return mixed
     */
    public function getSport(SportInterface $sportRepo)
    {
        $result = $sportRepo->getAllPaginate();
        $randSport = $sportRepo->getRandomSport();
        $data = [
            'rand_sports' => $randSport,
            'sports' => $result
        ];
        return view('user.sport.sport',$data);
    }

    /**
     * @param $id
     * @param SportInterface $sportRepo
     * @return mixed
     */
    public function getSportCategory($id,SportInterface $sportRepo,PageGalleryServiceInterface $pageGalleryRepo,YoutubeInerface $youtubeRepo)
    {
        $gallerys = $pageGalleryRepo->getPageCategory(1,$id);

        $video = $youtubeRepo->getPageCategoryVideo(1,$id);
        $result = $sportRepo->getOne($id);
        if (count($result) == null)
        {
            abort(404);
        }
        $randNews = $sportRepo->getRandomSport();
        $data = [
            'sports' => $result,
            'gallerys' => $gallerys,
            'videos' => $video,
            'rand_sports' => $randNews,
        ];
        return view('user.sport.sport-category',$data);
    }

    /**
     * @param GameCategoryInterface $gameCategoryRepo
     * @return mixed
     */
    public function getGame(GameCategoryInterface $gameCategoryRepo,GamePageInterface $gamePageRepo)
    {
        $result = $gameCategoryRepo->getRandomGameCategory();
        $game_page = $gamePageRepo->getAll();
        $data = [
            'game_pages' => $game_page,
            'games_categorys' => $result
        ];

        return view('user.game.game-home',$data);
    }

    /**
     * @param $page_id
     * @param GameCategoryInterface $gameCategoryRepo
     * @param GamePageInterface $gamePageRepo
     * @return mixed
     */
    public function getCategoryPage($page_id,GameCategoryInterface $gameCategoryRepo,GamePageInterface $gamePageRepo)
    {
        $result = $gameCategoryRepo->getPageCategoryPaginate($page_id);
        $game_page = $gamePageRepo->getAll();
        $one_game_page = $gamePageRepo->getOne($page_id);
        $data = [
            'one_game_page' => $one_game_page,
            'game_pages' => $game_page,
            'game_categorys' => $result
        ];
        return view('user.game.game-category-list',$data);
    }

    /**
     * @param $category_id
     * @param GameCategoryInterface $gameCategoryRepo
     * @return mixed
     */
    public function gameCategoryInnerPage($category_id,GameCategoryInterface $gameCategoryRepo)
    {
        $result = $gameCategoryRepo->getOne($category_id);
        if(count($result) == null)
        {
            abort(404);
        }
        $rand = $gameCategoryRepo->getRandomGameCategoryInner();
        $data = [
            'game' => $result,
            'random_games' => $rand
        ];
        return view('user.game.game-inner-category-page',$data);
    }

    /**
     * @param Request $request
     * @param SubscripeInterface $subscripeRepo
     * @return mixed
     */
    public function postSubscripe(request $request,SubscripeInterface $subscripeRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'email' => 'required|email',
            'question' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $result['status'] = '0';

            $subscripeRepo->getCreate($result);
            return redirect()->back()->with('error','Ваше письмо отправлено');
        }
    }

    /**
     * @param UserRequest $request
     * @param UserInterface $userRepo
     * @return mixed
     */
    public function postRegistration(UserRequest $request,UserInterface $userRepo)
    {
        $result = $request->inputs();

        //$data = ['foo' => 'bar'];
        $email = $result['email'];
        //$userRepo->sendEmailFromRegistration($data,$email);
        $user =  $userRepo->createOne($result);
        return response()->json($user);
    }


    /**
     * @param Request $request
     * @param UserInterface $userRepo
     * @return mixed
     */
    public function postLogin(Request $request,UserInterface $userRepo)
    {
        $result = $request->all();
        $password = $request->get('password');
        $email = $request->get('email');

        $validator = Validator::make($result, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
           // return redirect()->back()->withErrors($validator);
        }else{
            if(Auth::attempt([
                'email' => $email,
                'password' => $password,
                'role' => 'user'
            ]))
            {
                $user = $userRepo->getAllEmail($email);
                Auth::login($user);
                return response()->json(['error'=>'success']);
            }else{
                return response()->json(['error'=>'error']);
            }
        }
    }

    public function getUserProfile()
    {
        return view('user.user_profile.user_profile');
    }


    /**
     * Get facebook login
     */
    public function getFacebookLogin()
    {
        return Socialite::with('facebook')->redirect();
    }

    /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getFacebookCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('facebook')->user();

        $id = $user->id;
        $token = $user->token;
        $fullName = $user->name;

        $exp = explode(' ', $fullName);
        $firstname = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();

        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
            $data = [
                'facebook_id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'facebook_token' => $token,
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'facebook_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
            return redirect()->action('UsersController@getUserProfile');
        }
        return redirect()->action('UsersController@getUserProfile');

    }



    /**
     * Get facebook login
     */
    public function getTwitterLogin()
    {
        return Socialite::with('twitter')->redirect();
    }

    /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getTwitterCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('twitter')->user();

        $id = $user->id;
        $token = $user->token;
        $fullName = $user->name;


        $exp = explode(' ', $fullName);
        $firstname = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();

        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
            $data = [
                'twitter_id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'twitter_token' => $token,
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'twitter_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }
        return redirect()->action('UsersController@getUserProfile');
    }

    /**
     * Get facebook login
     */
    public function getGoogleLogin()
    {
        return Socialite::with('google')->redirect();
    }

     /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getGoogleCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('google')->user();

        $id = $user->id;
        $token = $user->token;
        $fullName = $user->name;


        $exp = explode(' ', $fullName);
        $firstname = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();

        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
             $data = [
                'google_id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'google_token' => $token,
             ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'google_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }
        return redirect()->action('UsersController@getUserProfile');
    }

    /**
     * @param NewsInterface $newRepo
     * @param SportInterface $sportRepo
     * @param InteresInterface $interestRepo
     * @return mixed
     */
    public function getSearch(request $request,NewsInterface $newRepo,SportInterface $sportRepo,InteresInterface $interestRepo)
    {
        $search = trim($request->get('search'));
        $news = $newRepo->postSearch($search);
        $sport = $sportRepo->postSearch($search);
        $interest = $interestRepo->postSearch($search);
        $dataArray = [
            'news' => [],
            'interests' => [],
            'sports' => [],
            'search' => $search
        ];
        if(count($news) != 0){
            $dataArray['news'] = $news;
        }
        if(count($sport) != 0){
            $dataArray['sports'] = $sport;
        }
        if(count($interest) != 0){
            $dataArray['interests'] = $interest;
        }
        return view('user.user_profile.user_search',$dataArray);
    }


    public function postRating(request $request, RatingInterface $ratinRepo)
    {
        $result = $request->all();
        $result['user_id'] = Auth::id();
        $status = $ratinRepo->getCreate($result);
        dd($status);
    }


}
