@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('css')
    {{-- <!-- DataTables --> --}}
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Akademik
        @endslot
        @slot('title')
            Pentaksiran Akhir Akademik
        @endslot
    @endcomponent

    {{--    <div class="row">--}}
    {{--        <div class="col-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}

    {{--                    <div class="row mb-3">--}}
    {{--                        <form>--}}

    {{--                            <div class="row">--}}

    {{--                                <div class="col-xl-2 col-sm-2">--}}
    {{--                                    <div class="mb-3">--}}
    {{--                                        <label class="form-label">PERANAN PENGGUNA</label> not yet functioning--}}
    {{--                                        <select id="role" name="role" class="form-select" required>--}}
    {{--                                            <option selected value="">SEMUA</option>--}}
    {{--                                            @foreach ($roles as $role)--}}
    {{--                                                <option value="{{ $role->id }}">--}}
    {{--                                                    {{ $role->name }}--}}
    {{--                                                </option>--}}
    {{--                                            @endforeach--}}
    {{--                                        </select>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="col-xl col-sm align-self-end">--}}
    {{--                                    <div class="text-sm-end">--}}
    {{--                                        <div class="mb-3">--}}
    {{--                                            <button type="submit"--}}
    {{--                                                    class="btn btn-primary waves-effect waves-light w-md me-2 btn-search">--}}
    {{--                                                <i class="fas fa-search"></i> Cari--}}
    {{--                                            </button>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}

    {{--                    </div>--}}

    {{--                    <hr class="mt-2">--}}

    {{--                    <div class="row mb-3">--}}

    {{--                        <div class="col-sm">--}}
    {{--                            <div class="text-sm-end">--}}
    {{--                                <a href="{{ route('users.create') }}">--}}
    {{--                                    <button type="button" class="btn btn-secondary waves-effect waves-light w-md me-2">--}}
    {{--                                        <i class="mdi mdi-plus me-1"></i>--}}
    {{--                                        Daftar Pengguna--}}
    {{--                                    </button>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div><!-- end col-->--}}

    {{--                    </div>--}}

    {{--                    <table id="datatable" class="table align-middle table-nowrap table-check">--}}
    {{--                        <thead class="table-light">--}}
    {{--                        <tr>--}}
    {{--                            <th>#</th>--}}
    {{--                            <th>NAMA</th>--}}
    {{--                            <th>ALAMAT EMEL</th>--}}
    {{--                            <th>MYKAD</th>--}}
    {{--                            <th>NOMBOR TELEFON</th>--}}
    {{--                            <th>PERANAN</th>--}}
    {{--                            <th class="text-center">SUNTING</th>--}}
    {{--                        </tr>--}}
    {{--                        </thead>--}}


    {{--                        <tbody>--}}
    {{--                        @foreach ($users as $user)--}}
    {{--                            <tr id="dtable">--}}
    {{--                                <td>{{ $loop->iteration }}</td>--}}
    {{--                                <td>{{ $user->name }}</td>--}}
    {{--                                <td>{{ $user->email }}</td>--}}
    {{--                                <td>{{ $user->mykad }}</td>--}}
    {{--                                <td>{{ $user->phonenumber }}</td>--}}
    {{--                                <td>{{ $user->role }}</td>--}}
    {{--                                <td class="text-center">--}}

    {{--                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">--}}
    {{--                                        @csrf--}}
    {{--                                        @method('DELETE')--}}

    {{--                                        <a href="{{ route('users.edit', $user->id) }}" class="text-success">--}}
    {{--                                            <i class="mdi mdi-pencil font-size-22" data-bs-toggle="tooltip"--}}
    {{--                                               data-bs-placement="top" title="Sunting"></i>--}}
    {{--                                        </a>--}}

    {{--                                        <a href="#" class="text-danger"><i--}}
    {{--                                                class="mdi mdi-delete font-size-22 btn-destroy" data-bs-toggle="tooltip"--}}
    {{--                                                data-bs-placement="top" title="Padam"></i>--}}
    {{--                                        </a>--}}

    {{--                                    </form>--}}
    {{--                                </td>--}}
    {{--                            </tr>--}}
    {{--                        @endforeach--}}

    {{--                        </tbody>--}}
    {{--                    </table>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div> <!-- end col -->--}}
    {{--    </div> <!-- end row -->--}}
@endsection


@section('script')
    <script>
        $(document).on("click", ".btn-destroy", (function (e) {
            e.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: "Padam Pengguna",
                text: "Adakah anda pasti?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Padam",
                cancelButtonText: "Batal",
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#74788d"
            }).then(function (result) {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Pengguna telah berjaya dipadam!",
                        icon: "success",
                        timer: 2000,
                        showCloseButton: 0,
                        showCancelButton: 0,
                        showConfirmButton: 0,
                        onBeforeOpen: function () {
                            Swal.showLoading(), t = setInterval((function () {
                            }), 100)
                        },
                        onClose: function () {
                            clearInterval(t);
                            form.submit();
                        }
                    })
                }
            })
        }))
    </script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
