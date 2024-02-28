@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Edit Bank Details</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                   data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="{{ route('home') }}"
                                                                          class="btn btn-danger"><em
                                                    class="icon ni ni-arrow-left"></em><span>Go to
                                                                    Dashboard</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your
                                    input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Edit Bank Details</h5>
                                    </div>
                                    <form action="{{ route('banks.update', $bank->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="bank_name">Bank Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $bank->bank_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="bank_code">Bank Code</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="bank_code" name="bank_code" value="{{ $bank->bank_code }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="branch_name">Branch Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="branch_name" name="branch_name" value="{{ $bank->branch_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="branch_code">Branch Code</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="branch_code" name="branch_code" value="{{ $bank->branch_code }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="swift_code">SWIFT Code</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="swift_code" name="swift_code" value="{{ $bank->swift_code }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="account_number">Account Number</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $bank->account_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Account Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $bank->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="account_type">Account Type</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="account_type" name="account_type" value="{{ $bank->account_type }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Add other fields here -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update Bank Details</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
