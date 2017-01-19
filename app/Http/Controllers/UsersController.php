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
    public function getHome()
    {
        return view('user.home');
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
    public function getGame(GameCategoryInterface $gameCategoryRepo)
    {
        $result = $gameCategoryRepo->getRandomGameCategory();
        $data = [
            'games_categorys' => $result
        ];
        return view('user.game.game-home',$data);
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
