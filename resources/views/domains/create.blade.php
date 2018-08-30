@extends('layouts.app')

@section('content')

    @component('components.title')
        Domains
    @endcomponent

    <!-- END: Subheader -->
    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-plus"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            New domain
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form method="POST" action="{{route('domains.store')}}" class="m-form m-form--fit m-form--label-align-right">
                @csrf
                @include('domains._form', ['deadline' => true])
            </form>

            <!--end::Form-->
        </div>

        <!--end::Portlet-->

    </div>
@stop