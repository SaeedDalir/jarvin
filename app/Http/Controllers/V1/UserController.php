<?php namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\Eloquent\User\UserRepository;
use App\Services\Token\TokenHandler;
use App\Utilities\Password\HashHandler;
use App\Utilities\Time\TimeHelper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Http\ResponseFactory;

class UserController extends Controller
{
    private $user;
    private $tokenHandler;

    /**
     * UserController constructor.
     * @param UserRepository $user
     * @param TokenHandler $tokenHandler
     */
    public function __construct(UserRepository $user, TokenHandler $tokenHandler)
    {
        $this->user = $user;
        $this->tokenHandler = $tokenHandler;
    }

    /**
     * validate and send the client credential object to Repo interface
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function register(UserCreateRequest $request)
    {
        $credential = [
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'password' => $request->password,
            'api_token' => $this->tokenHandler->randomString(100),
            'last_login' => TimeHelper::getNow(),
        ];
        return response([
            'data' => $this->user->create($credential),
            'status' => 'success'
        ],200);
    }

    /**
     * @param UserLoginRequest $request
     * @return Response|ResponseFactory|mixed
     */
    public function login(UserLoginRequest $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = $this->user->findBy('email', $credential['email']);
        if(! HashHandler::compareHash($credential['password'],$user->password)) {
            return response([
                'message' => 'Information doesnt match',
                'status' => 'error'
            ],403);
        }
        $this->user->update([
            'api_token' => $this->tokenHandler->randomString(100),
            'last_login' => TimeHelper::getNow(),
        ],$credential['email'],'email');
        return $this->user->findBy('email', $credential['email']);
    }

    /**
     * @return Response|ResponseFactory
     */
    public function showUserProfile()
    {
        return response([
            'data' => Auth::user(),
            'status' => 'success',
        ],200);
    }

    /**
     * @param UserUpdateRequest $request
     * @param $id
     * @return Response|ResponseFactory
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $credential = [
            'name' => $request->name,
            'family' => $request->family,
            'password' => $request->password,
            'mobile' => $request->mobile,
            'address' => $request->address,
        ];
        $this->user->update($credential, $id);
        return response([
            'message' => 'user updated successfully',
            'status' => 'success'
        ],200);
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        if (empty($user)){
            return response([
                'message' => 'not found',
                'status' => 'error'
            ],404);
        }
        $this->user->delete($id);
        return response([
            'message' => 'user deleted successfully',
            'status' => 'success'
        ],200);
    }
}
