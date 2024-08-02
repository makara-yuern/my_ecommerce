<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Construct function
     */
    public function __construct(protected UserRepositoryInterface $userRepo)
    {
    }

    public function index(Request $request): view
    {
        $users = $request->name;
        $listUser = $this->userRepo->getList($users);
        return view('users.index', compact('listUser', 'request'));
    }

    /**
     * Create new user
     */
    public function create(Request $request)
    {
        $userTypes = UserType::all();
        $countries = config('countries');
        return view('users.partials.create', compact('userTypes', 'countries'));
    }

    /**
     * Store new user
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name', 'email', 'is_admin', 'status', 'country_code', 'user_type_id']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $data['password'] = bcrypt($request->password); // Hash the password

        $result = $this->userRepo->create($data);

        if (!$result) {
            return redirect()->route('user.index')->with('fail', "Can't create new user!");
        }

        return redirect()->route('user.index')->with('success', "Created successfully!");
    }

    /**
     * Delete project
     */
    public function destroy($id)
    {
        try {
            $result = $this->userRepo->delete($id);
            if ($result) {
                return response()->json(['status' => 'success', 'message' => 'User deleted successfully!']);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'Error deleting user!']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => 'An error occurred while deleting the user.']);
        }
    }
}
