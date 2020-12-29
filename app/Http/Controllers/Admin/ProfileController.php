<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        //Validateを実行
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除
        unset($form['_token']);
        //フォームから送信されてきたimageを削除
        unset($form['image']);
        
        //データベースへ保存
        $profile->fill($form);
        $profile->save();
        
        //admin/profile/createにリダイレクト
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
       
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        
          //php17 追記
      $profile_history = new ProfileHistory;
      $profile_history->profile_id = $profile->id;
      $profile_history->edited_at = Carbon::now();
      $profile_history->save();
      
        return redirect('admin/profile/edit?id='. $request->id);
    }
}
