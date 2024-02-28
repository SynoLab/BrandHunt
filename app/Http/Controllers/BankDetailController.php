<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BankDetail;

class BankDetailController extends Controller
{

    public function index()
    {
        $bankDetails = BankDetail::all();
    
        return view('admin.bank_details.index', compact('bankDetails'));
    }


    public function create()
    {
        return view('admin.bank_details.create');
    }


    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'bank_name' => 'required|string',
            'bank_code' => 'required|string',
            'branch_name' => 'required|string',
            'branch_code' => 'required|string',
            'swift_code' => 'required|string',
            'account_number' => 'required|string',
            'name' => 'required|string',
            'account_type' => 'required|string',
        ]);

        // Create a new bank detail
        $bankDetail = BankDetail::create($validatedData);

        return response()->json([
            'message' => 'Bank detail created successfully',
            'data' => $bankDetail,
            'redirect' => route('admin.bank_details.index') 
        ]);
            }
    public function edit($id)
    {
        $bank = BankDetail::findOrFail($id);
        return view('admin.bank_details.edit', compact('bank'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_name' => 'required',
            'bank_code' => 'required',
            'branch_name' => 'required',
            'branch_code' => 'required',
            'swift_code' => 'required',
            'account_number' => 'required',
            'name' => 'required',
            'account_type' => 'required',
        ]);
    
        $bank = BankDetail::findOrFail($id);
        $bank->update([
            'bank_name' => $request->bank_name,
            'bank_code' => $request->bank_code,
            'branch_name' => $request->branch_name,
            'branch_code' => $request->branch_code,
            'swift_code' => $request->swift_code,
            'account_number' => $request->account_number,
            'name' => $request->name,
            'account_type' => $request->account_type,
        ]);
    
        return redirect()->route('banks.index')->with('success', 'Bank details updated successfully');
    }

    public function destroy($id)
    {
        $bank = BankDetail::findOrFail($id);
        $bank->delete();
    
        return redirect()->route('banks.index')->with('success', 'Bank details deleted successfully');
    }

}
