@extends('admin.templates.default')

@section('content')

<div class="flex-lg-row-fluid">
    <div class="tab-content">
        <div id="kt_project_users_card_pane" class="tab-pane fade show active">
            <div class="row g-6 g-xl-9">
                <div class="col-md-4">
                    <div class="card card-flush h-md-100">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Import Data Users</h2>
                            </div>
                        </div>
                        <div class="card-body pt-1">
                            <div class="d-flex flex-column text-gray-600">
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>
                                    <span class="me-1">Total Users :</span>
                                    <span>
                                        <b>{{$user->count()}}</b>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>
                                    <span class="me-1">Admin :</span>
                                    <span>
                                        <b>{{$user->where('current_team_id',1)->count()}}</b>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>
                                    <span class="me-1">User :</span>
                                    <span>
                                        <b>{{$user->where('current_team_id',2)->count()}}</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer flex-wrap pt-0">
                            <form id="modal_form_form" class="form" action="{{ route('import.user') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-8">
                                    <div class="col-12 d-flex flex-column fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">File</span>
                                        </label>
                                        <input type="file" class="form-control form-control-solid" name="file" accept=".xls,.xlsx,.csv"/>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="button" class="btn btn-secondary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Export
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('print.user') }}" target="_blank" class="menu-link px-3">PDF</a>
                                            <a href="{{ route('export.user') }}" class="menu-link px-3">EXCEL</a>
                                        </div>
                                    </div>
                                    <button type="submit" id="modal_form_submit" class="btn btn-primary">
                                        <span class="indicator-label">Import</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu-setting');
            element.classList.add('show');
        var element2 = document.getElementById('menu-setting-import');
            element2.classList.add('active');
    </script>

<script>
    //validation
    const form = document.getElementById('modal_form_form');
    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'file': {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan pilih file!'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );

    // Submit button handler
    const submitButton = document.getElementById('modal_form_submit');
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        form.submit();
                    }
                });
            }
        });
</script>

@endpush
