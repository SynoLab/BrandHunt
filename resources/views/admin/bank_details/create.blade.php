{{-- @extends('layouts.admin_includes.app')

@section('content')
<div class="container-xl wide-xl">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Manage Bank Details</h3>
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
                                            class="btn btn-danger"><em class="icon ni ni-arrow-left"></em><span>Go
                                                to Dashboard</span></a></li>
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
                                    <h5 class="card-title">{{ isset($bank) ? 'Edit' : 'Create' }} Bank Details
                                    </h5>
                                </div>
                                <form
                                    action="{{ isset($bank) ? route('banks.update', $bank->id) : route('banks.store') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($bank))
                                    @method('PUT')
                                    @endif
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="bank_code">Bank name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Bank Name" id="bank_name" name="bank_name"
                                                        value="{{ isset($bank) ? $bank->bank_code : old('bank_code') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="bank_code">Bank Code</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Bank Code" id="bank_code" name="bank_code"
                                                        value="{{ isset($bank) ? $bank->bank_code : old('bank_code') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="branch_name">Branch Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Branch Name" id="branch_name" name="branch_name"
                                                        value="{{ isset($bank) ? $bank->branch_name : old('branch_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="branch_code">Branch Code</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Branch Code" id="branch_code" name="branch_code"
                                                        value="{{ isset($bank) ? $bank->branch_code : old('branch_code') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="swift_code">SWIFT Code</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="SWIFT Code" id="swift_code" name="swift_code"
                                                        value="{{ isset($bank) ? $bank->swift_code : old('swift_code') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="account_number">Account Number</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Account Number" id="account_number"
                                                        name="account_number" value="{{ isset($bank) ? $bank->account_number : old('account_number') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Name" id="name" name="name"
                                                        value="{{ isset($bank) ? $bank->name : old('name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="account_type">Account Type</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" placeholder="Account Type" id="account_type" name="account_type"
                                                        value="{{ isset($bank) ? $bank->account_type : old('account_type') }}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="col-md-12 btn btn-lg btn-primary text-center" name="submit">
                                                    {{ isset($bank) ? 'Update' : 'Save' }} Bank Details
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="reset"
                                                    class="col-md-12 btn btn-lg btn-danger text-center">
                                                    Reset Bank Details
                                                </button>
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

<script>
    CKEDITOR.replace('description');
</script>
@endsection --}}
