<?php

namespace App\Http\Controllers\Admin;

use App\Mail\contactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Session;

class ContactController extends Controller
{
    public function index(Request $request){
        $query_contact = Contact::select('id','name','subject','phone','phone','message','email','status');
        $contacts = is_null($request->get('status')) ? $query_contact : $query_contact->where('status', $request->get('status'));
      if(!is_null($request->get('search'))){ $contacts =$contacts->where('name','LIKE','%'.$request->get('search')); }
        $contacts= $contacts->orderBy('id', 'DESC')
            ->paginate(10)
            ->appends(request()
                ->query());
        return view('admin.contact.index',compact('contacts'));
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('msg','Xóa liên hệ thành công');
    }
    public function sendcontact(Request $request){
         $id = $request->id;
         $contact = Contact::findOrFail($id);
         $email=$contact->email;
        $noidung = $request->noidung;
        $sub = $request->sub;
        Mail::to($email)->send(new contactMail($sub,$noidung));
        Session::flash('sussces');
         $data = [
             'status'=>2
         ];
         $contact->update($data);
        return back();
    }
}
