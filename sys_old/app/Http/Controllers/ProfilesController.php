<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Exception;

class ProfilesController extends Controller
{

    /**
     * Display a listing of the profiles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $profiles = Profile::with('user')->paginate(25);

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('id','id')->all();

        return view('profiles.create', compact('Users'));
    }

    /**
     * Store a new profile in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Profile::create($data);

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $profile = Profile::with('user')->findOrFail($id);

        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        $Users = User::pluck('id','id')->all();

        return view('profiles.edit', compact('profile','Users'));
    }

    /**
     * Update the specified profile in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $profile = Profile::findOrFail($id);
            $profile->update($data);

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified profile from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $profile = Profile::findOrFail($id);
            $profile->delete();

            return redirect()->route('profiles.profile.index')
                ->with('success_message', 'Profile was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'user_id' => 'required',
            'profile_uuid' => 'nullable|string|min:0|max:36',
            'profile_image' => 'required|numeric|string|min:1|max:4294967295',
            'profile_cpf' => 'nullable|string|min:0|max:40',
            'profile_rg' => 'nullable|string|min:0|max:40',
            'profile_rg_emissor' => 'nullable|string|min:0|max:40',
            'profile_endereco' => 'nullable|string|min:0|max:191',
            'profile_numero' => 'nullable|string|min:0|max:40',
            'profile_bairro' => 'nullable|string|min:0|max:40',
            'profile_cidade' => 'nullable|string|min:0|max:40',
            'profile_estado' => 'nullable|string|min:0|max:2',
            'profile_pais' => 'nullable|string|min:0|max:40',
            'profile_cep' => 'nullable|string|min:0|max:10',
            'profile_fone1' => 'nullable|string|min:0|max:15',
            'profile_fone2' => 'nullable|string|min:0|max:15',
            'profile_fone3' => 'nullable|string|min:0|max:15',
            'profile_fone4' => 'nullable|string|min:0|max:15',
            'profile_obs' => 'nullable|string|min:0|max:4294967295',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
