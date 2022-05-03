<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notice;
use App\Models\User;

class NoticeController extends Controller
{
     
    public function index() {
        
        $search = request('search');

        if($search) {

          $notices = Notice::where([
            ['title', 'like', '%'.$search.'%']
          ])->get();

        } else {
          $notices = Notice::all();
        }
    
        return view('welcome',['notices'=> $notices, 'search' => $search]);
    }

  public function create() {
      return view('notices.create');
  }

   public function store(Request $request){

     $notice = new Notice;

     $notice->title = $request->title;
     $notice->date = $request->date;
     $notice->city = $request->city;
     $notice->private = $request->private;
     $notice->description = $request->description;
     
     // Image Upload
     if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;     
        
        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) .  "." . $extension;
    
        $requestImage->move(public_path('img/notices'), $imageName);

        $notice->image = $imageName;
    }
   
     $user = auth()->user();
     $notice->user_id = $user->id;  
     

     $notice->save();

      return redirect("/")->with('msg', 'Notícia criada com sucesso!');

   }
   public function show($id) {
    
    $notice = Notice::findOrFail($id);

    $user = auth()->user();
    $hasUserJoined = false;

    if($user) {

      $userNotices = $user->noticesAsParticipant->toArray();

      foreach($userNotices as $userNotice) {
        if($userNotice['id'] == $id) {
            $hasUserJoined = true;
        }
      }
    }

    $noticeOwner = User::where('id',$notice->user_id)->first()->toArray();

    return view('notices.show',['notice' => $notice, 'noticeOwner' => $noticeOwner, 'hasUserJoined' => $hasUserJoined]);
   }
 
   public function dashboard() {
     
     $user = auth()->user();

     $notices = $user->notices;

     $noticesAsParticipant = $user->noticesAsParticipant;

     return view('notices.dashboard',
     ['notices'=> $notices, 'noticesAsParticipant' => $noticesAsParticipant]);
   }

public function destroy($id){

  Notice::findOrFail($id)->delete();

  return redirect('/dashboard')->with('msg', 'Notícia Excluida com sucesso!');

  }

  public function edit($id) {

    $user = auth()->user();

    $notice = Notice::findOrFail($id);

    if($user->id != $notice->user_id) {
      return redirect('/dashboard');
    }

    return view('notices.edit', ['notice' => $notice]);
  }

  public function update(request $request){

   $data = $request->all(); 

   //Image upload
   if($request->hasFile('image') && $request->file('image')->isValid()) {

    $requestImage = $request->image;     
    
    $extension = $requestImage->extension();

    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) .  "." . $extension;

    $requestImage->move(public_path('img/notices'), $imageName);

    $data['image'] = $imageName;
}

   Notice::findOrFail($request->id)->update($data);
 
  return redirect('/dashboard')->with('msg', 'Notícia editada!');
  }

    public function joinNotice($id) {
     
     $user = auth()->user();

     $user->noticesAsParticipant()->attach($id);
     
     $notice = Notice::findOrFail($id);

     return redirect('/dashboard')->with('msg','Sua presença foi confirmada da notícia: ' . $notice->title);
    }

    public function leaveNotice($id){

      $user = auth()->user();

      $user->noticesAsParticipant()->detach($id);

      $notice = Notice::findOrFail($id);

      return redirect('/dashboard')->with('msg','Você saiu com sucesso da notícia: ' . $notice->title);

    }

}