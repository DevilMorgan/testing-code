@extends('layouts.app')

@section('content')
    @component('components.title', ['back_url' => route('dashboard')])
        {{__('messages.stations')}}
    @endcomponent

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            @component('components.tableHeader', [
                'title' => __('messages.all_stations'),
                'icon' => 'flaticon-interface-7',
                'button' => __('messages.new_station'),
                'url' => route('stations.create'),
                'newModal' => false,
                'dataTarget' => '',
                'moreAction' => false,
            ])
            @endcomponent
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table id="stations_table" data-deleteall="{{route('stations.destroy-all')}}" class="table m-table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{__('messages.name')}}</th>
                        <th>{{__('messages.label')}}</th>
                        <th>{{__('messages.actions')}}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
@stop