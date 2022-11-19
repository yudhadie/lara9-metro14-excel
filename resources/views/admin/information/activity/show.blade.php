@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">
        <div class="card">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{$title}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$subtitle ?? ''}}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="mb-10">
                        <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                            <tr>
                                <td class="text-gray-400">ID:</td>
                                <td class="text-gray-800">{{$data->id}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">Data:</td>
                                <td class="text-gray-800">{{$data->log_name}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">Data ID:</td>
                                <td class="text-gray-800">{{$data->subject_id}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">Activity:</td>
                                <td class="text-gray-800">{{$data->event}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">User:</td>
                                <td class="text-gray-800">{{$data->user->name}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">Waktu:</td>
                                <td class="text-gray-800">{{Carbon\Carbon::parse($data->created_at)}}</td>
                            </tr>
                            <tr>
                                <td class="text-gray-400">Content:</td>
                                <td class="text-gray-800">
                                    {{$data->properties}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{route('activity.index')}}"  class="btn btn-light me-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu-info');
            element.classList.add('show');
        var element2 = document.getElementById('menu-info-activity');
            element2.classList.add('active');
    </script>

@endpush
