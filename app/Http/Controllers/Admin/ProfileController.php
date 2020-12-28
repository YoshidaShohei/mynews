<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\History;
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
        
        //↓課題16.1
        //フォームから画像が送信されたら、保存して$profile->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
        
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
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
          //php17 追記
      $history = new History;
      $history->news_id = $news->id;
      $history->edited_at = Carbon::now();
      $history->save();
      
        return redirect('admin/profile/edit');
    }
}
