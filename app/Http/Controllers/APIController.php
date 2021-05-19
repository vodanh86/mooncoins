<?php

namespace App\Http\Controllers;

use JWTAuth;
use Carbon\Carbon;
use App\User;
use App\Models\Coin;
use Illuminate\Http\Request;
use App\Models\AdminRoleUsers;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $token = null;
        $input = $request->only('username', 'password');

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $adminRoleUsers = AdminRoleUsers::where("user_id", auth()->user()->id)->first();
        return response()->json([
            'data' => auth()->user(),
            'role' => $adminRoleUsers->role_id,
            'status' => true,
            'token' => $token,
            'error' => 0
        ]);
    }

    public function getPromotedCoins(Request $request)
    {
        $promotedCoins = Coin::where("promoted", "=", 1)
        ->where("verify", "=", 1)
        ->orderBy('vote', 'DESC')->get();
        return $this->checkIp($promotedCoins);
    }

    public function getBestCoins(Request $request)
    {
        $bestCoins = Coin::where("verify", "=", 1)->orderBy('vote', 'DESC')->get();
        return $this->checkIp($bestCoins);
    }

    public function getYourCoins(Request $request)
    {
        $bestCoins = Coin::where("verify", "=", 1)
        ->where("user_id", "=", auth()->user()->id)
        ->orderBy('vote', 'DESC')->get();
        return $this->checkIp($bestCoins);
    }

    public function getComments(Request $request){
        $coin = Coin::find($request->id);
        $users = User::all()->keyBy('id');
        $comments = $coin->comments;
        return view('comments', ["comments" => $comments, "users" => $users]);
    }

    public function getTodayCoins(Request $request)
    {
        $dayBefore = Carbon::now()->modify('-2 day')->format('Y-m-d');

        $bestCoins = Coin::where("verify", "=", 1)
        ->where("lauched_date", ">=", $dayBefore)->orderBy('vote', 'DESC')->get();
        return $this->checkIp($bestCoins);
    }

    public function addComment(Request $request){
        $coin = Coin::find($request->id);
        $user = User::find(auth()->user()->id);
        $user->comment($coin, $request->comment, 3);
        $users = User::all()->keyBy('id');
        $comments = $coin->comments;
        return view('comments', ["comments" => $comments, "users" => $users]);
    }

    public function updateVote(Request $request)
    {
        $coin = Coin::find($request->id);
        $notVoted = false;
        if ($coin["ips"]){
            if (strpos($coin["ips"].",", $_SERVER['REMOTE_ADDR'].",") === false) {            
                $coin["vote"] += 1;
                $coin["ips"] = str_replace(",,", ",", $coin["ips"].$_SERVER['REMOTE_ADDR'].",");
                $coin->save();
            } else {
                $coin["vote"] -= 1;
                $coin["ips"] = str_replace($_SERVER['REMOTE_ADDR'].",", "", $coin["ips"].",");
                $coin->save();
            }
        } else {
            $coin["vote"] += 1;
            $coin["ips"] = str_replace(",,", ",", $coin["ips"].$_SERVER['REMOTE_ADDR'].",");
            $coin->save();
        }

        $promotedCoins = Coin::where("promoted", "=", 1)
        ->orderBy('vote', 'DESC')->get();
        return $this->checkIp($promotedCoins);
    }

    public function checkIp($coins){
        $updatedCoins = array();
        foreach($coins as $i => $coin){
            if (strpos($coin["ips"].",", $_SERVER['REMOTE_ADDR'].",") === false) {
                $coin["voted"] = 0;
            } else {
                $coin["voted"] = 1;
            }
            $updatedCoins[] = $coin;
        }
        return array("data" => $updatedCoins);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
}
