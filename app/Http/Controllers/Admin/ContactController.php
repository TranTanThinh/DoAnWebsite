<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all(); // Lấy tất cả dữ liệu từ bảng products
        return view('Dashboard.pages.contact.listcontact', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Dashboard.pages.contact.editcontact', compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        // Validate input nếu cần
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Cập nhật thông tin
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Tìm sản phẩm theo productId thay vì id
    $contact = Contact::where('id', $id)->first();

    if (!$contact) {
        return redirect()->route('contacts.index')->with('error', 'Contact not found.');
    }

    // Xóa sản phẩm
    $contact->delete();

    return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
}
}
