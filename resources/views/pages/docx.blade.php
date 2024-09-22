@extends('app')
@section('title',$title)
@section('content')
   <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">CRM</li>
                        </ol>
                    </div>
                    <h4 class="page-title">CRM</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="">
            <div class="">
                <h3 class="p-0 m-0">Part 1 - Assessment Overview</h3>
                <p class="p-0 m-0"> 1 Contact Information and Summary of Results</p>
                <p class="p-0 m-0">1.1 Contact Information</p>

                <hr class="border border-muted" />
            </div>
            <form action="{{ route('submitDocxInfo') }}" method="post">
                @csrf
                <div class="">
                    <div class="card mb-4">
                        <div class="card-header p-1">
                            <h5 class="p-0">Assessed Entity</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                @foreach ( $assessedEntity as $key => $value )
                                    @switch($value)
                                        @case('CUSTOMIZEDAPPROACHWASUSED')
                                                <tr>
                                                    <th>{{$key}}</th>
                                                    <td>
                                                        <div class="mt-2">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="{{$value}}-yes" checked name="{{ $value }}" value="☐" class="form-check-input">
                                                                <label class="form-check-label" for="{{$value}}-yes">Toggle this custom radio</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="{{$value}}-no" name="{{ $value }}" value="☒" class="form-check-input">
                                                                <label class="form-check-label" for="{{$value}}-no">Or toggle this other custom radio</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @break
                                        @case('COMPENSATIOGCONTROLWASUSED')
                                        <tr>
                                            <th>{{$key}}</th>
                                            <td>
                                                <div class="mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="{{$value}}-yes" checked name="{{ $value }}" value="☐" class="form-check-input">
                                                        <label class="form-check-label cursor-pointer"  for="{{$value}}-yes">Toggle this custom radio</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="{{$value}}-no" name="{{ $value }}" value="☒" class="form-check-input">
                                                        <label class="form-check-label cursor-pointer" for="{{$value}}-no">Or toggle this other custom radio</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                            @break
                                        @default
                                        <tr>
                                            <th>{{$key}}</th>
                                            <td>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-sm no-border"
                                                    name="{{ $value }}"
                                                    id=""
                                                    placeholder="{{ $key }}" />
                                            </td>
                                        </tr>
                                    @endswitch
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header p-1">
                            <h5 class="p-0">1.2 Date and Timeframe of Assessment</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                @foreach ( $dateTimeframeAssessment as $key => $value )
                                        <tr>
                                            <th>{{$key}}</th>
                                            <td>
                                                <input
                                                    type="{{$value['type']}}"
                                                    class="form-control form-control-sm no-border"
                                                    name="{{ $value['name'] }}"
                                                    id=""
                                                    placeholder="{{ $key }}" />
                                            </td>
                                        </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="">
                    <button class="btn btn-primary" type="submit">Submit Data</button>
                </div>
            </form>
        </div>

    </div>
@endsection
