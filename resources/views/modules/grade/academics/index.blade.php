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
            Penjanaan Gred
        @endslot
        @slot('title')
            Akademik
        @endslot
    @endcomponent

@endsection
