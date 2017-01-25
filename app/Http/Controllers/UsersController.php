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


use App\Http\Requests;
use Validator;
use Auth;
use Socialite;
use Storage;

class UsersController extends BaseController
{


    /**
     * Create a new instance of BaseController class.
     *
     * @param LanguageInterface $langRepo
     */
	public function __construct(LanguageInterface $langRepo)
    {
        parent::__construct($langRepo);
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
     * @return mixed
     */
    public function getInteresCategory($id,InteresInterface $interesRepo)
    {
        $gallerys = $interesRepo->getPageGallery($id);
        $result = $interesRepo->getOne($id);
        $randNews = $interesRepo->getRandomInteres();
        $data = [
            'interests' => $result,
            'gallerys' => $gallerys,
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
            
        ];
        $showView = view('user.show-more-interest', $result)->render();
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
     * @return mixed
     */
    public function getNewsCategory($id,NewsInterface $newsRepo)
    {
        $gallerys = $newsRepo->getPageGallery($id);
        $result = $newsRepo->getOne($id);
        $randNews = $newsRepo->getRandomNews();
        $data = [
            'news' => $result,
            'gallerys' => $gallerys,
            'rand_news' => $randNews,
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
    public function getSportCategory($id,SportInterface $sportRepo)
    {
        $gallerys = $sportRepo->getPageGallery($id);
        $result = $sportRepo->getOne($id);
        $randNews = $sportRepo->getRandomSport();
        $data = [
            'sports' => $result,
            'gallerys' => $gallerys,
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
            $subscripeRepo->getCreate($result);
            return redirect()->back()->with('error','Ваше письмо отправлено');
        }
    }
    /**
     * 
     */
//    public function postRegistration(UserRequest $request,UserInterface $userRepo)
//    {
//        $result = $request->inputs();
//        $userRepo->createOne($result);
//        return redirect()->back();
//    }
//
//    /**
//     *
//     */
//    public function postLogin(Request $request)
//    {
//        $result = $request->all();
//        $password = $request->get('password');
//        $email = $request->get('email');
//
//        $validator = Validator::make($result, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator);
//        }else{
//            if(Auth::attempt([
//                'email' => $email,
//                'password' => $password,
//                'role' => 'user'
//            ]))
//            {
//                return redirect()->action('UsersController@getDeshbord');
//            }
//        }
//    }
//
//    /**
//     *
//     */
//    public function getDeshbord()
//    {
//        return view('user.dashbord');
//    }
//
//    /**
//     * Get facebook login
//     */
//    public function getFacebookLogin()
//    {
//        return Socialite::with('facebook')->redirect();
//    }
//
//    /**
//     * get Facebook callback
//     * GET user/facebook-callback
//     *
//     * @return redirect
//     */
//    public function getFacebookCallback(UserInterface $userRepo)
//    {
//        $user = Socialite::with('facebook')->user();
//
//        $id = $user->id;
//        $token = $user->token;
//        $fullName = $user->getName();
//
//        $exp = explode(' ', $fullName);
//        $username = $exp[0];
//        $lastname = $exp[1];
//        $email = $user->getEmail();
//
//        $userAvatar =  $user->getAvatar();
//
//        $firstEmail = $userRepo->getAllSocial($email);
//        if(count($firstEmail) == 0){
//             $data = [
//                'facebook_id' => $id,
//                'username' => $username,
//                'lastname' => $lastname,
//                'email' => $email,
//                'profile_picture' => $userAvatar,
//                'facebook_token' => $token,
//            ];
//            $result = $userRepo->createOne($data);
//            Auth::login($userRepo->getOne($result->id));
//        }else{
//            Auth::login($firstEmail);
//            $tokenData = [
//                'facebook_token' => $token
//            ];
//            $userRepo->updateSocialToken($email,$tokenData);
//        }
//        return redirect()->action('UsersController@getDeshbord');
//    }
//
//    /**
//     * Get facebook login
//     */
//    public function getTwitterLogin()
//    {
//        return Socialite::with('twitter')->redirect();
//    }
//
//    /**
//     * get Facebook callback
//     * GET user/facebook-callback
//     *
//     * @return redirect
//     */
//    public function getTwitterCallback(UserInterface $userRepo)
//    {
//        $user = Socialite::with('twitter')->user();
//
//        $id = $user->id;
//        $token = $user->token;
//        $fullName = $user->getName();
//
//        $exp = explode(' ', $fullName);
//        $username = $exp[0];
//        $lastname = $exp[1];
//        $email = $user->getEmail();
//
//        $userAvatar =  $user->getAvatar();
//
//        $firstEmail = $userRepo->getAllSocial($email);
//        if(count($firstEmail) == 0){
//             $data = [
//                'twitter_id' => $id,
//                'username' => $username,
//                'lastname' => $lastname,
//                'email' => $email,
//                'profile_picture' => $userAvatar,
//                'twitter_token' => $token
//            ];
//            $result = $userRepo->createOne($data);
//            Auth::login($userRepo->getOne($result->id));
//        }else{
//            Auth::login($firstEmail);
//            $tokenData = [
//                'twitter_token' => $token
//            ];
//            $userRepo->updateSocialToken($email,$tokenData);
//        }
//        return redirect()->action('UsersController@getDeshbord');
//    }
//
//    /**
//     * Get facebook login
//     */
//    public function getGoogleLogin()
//    {
//        return Socialite::with('google')->redirect();
//    }
//
//     /**
//     * get Facebook callback
//     * GET user/facebook-callback
//     *
//     * @return redirect
//     */
//    public function getGoogleCallback(UserInterface $userRepo)
//    {
//        $user = Socialite::with('google')->user();
//        $id = $user->id;
//        $token = $user->token;
//        $fullName = $user->getName();
//
//        $exp = explode(' ', $fullName);
//        $username = $exp[0];
//        $lastname = $exp[1];
//        $email = $user->getEmail();
//
//        $userAvatar =  $user->getAvatar();
//
//        $firstEmail = $userRepo->getAllSocial($email);
//        if(count($firstEmail) == 0){
//             $data = [
//                'google_id' => $id,
//                'username' => $username,
//                'lastname' => $lastname,
//                'email' => $email,
//                'profile_picture' => $userAvatar,
//                'google_token' => $token
//            ];
//            $result = $userRepo->createOne($data);
//            Auth::login($userRepo->getOne($result->id));
//        }else{
//            Auth::login($firstEmail);
//            $tokenData = [
//                'google_token' => $token
//            ];
//            $userRepo->updateSocialToken($email,$tokenData);
//        }
//        return redirect()->action('UsersController@getDeshbord');
//    }


    /**
     * 
     */
    // public function getFile(Filesystem $filesystem)
    // {
    //    //$x = Storage::disk('local')->put('filez.txt', 'Contents');
    //     $filename = base_path().'pagination.php';
        

    //    // $disk = Storage::disk('local');
    //     // $filesystem->append()
    //     // $path = base_path().'pagination.php';

    //     // $filesystem->append($path, 'Appended Text');
    //   //  $file = $filesystem->get('hello.txt');

    //  //   dd($file);
    // }
    /**
     * 
     */

}
