@extends('templates.vietstar.layouts.app')

@section('content') 

<!-- Header start --> 

@include('templates.vietstar.includes.header') 

<!-- Header end --> 

<!-- Inner Page Title start --> 


<!-- Inner Page Title end -->

<div class="user-wrapper listpgWraper">
             
        @include('templates.vietstar.includes.mobile_dashboard_menu')

            <div class="content"> 

                <div class="myads">

                    <h3>{{__('Unlocked Seekers')}}</h3>

                    <ul class="searchList">

                        <!-- job start --> 

                        @if(isset($users) && count($users))

                        @foreach($users as $user)

                        <li>

                            <div class="row">

                                <div class="col-md-9 col-sm-9">

                                    <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>

                                    <div class="jobinfo">

                                        <h3><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h3>

                                        <div class="location"> {{trim($user->getLocation(),',')}}</div>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="col-md-3 col-sm-3">

                                    <div class="listbtn"><a href="{{route('user.profile', $user->id)}}">{{__('View Profile')}}</a></div>

                                </div>

                            </div>

                            <p>{{\Illuminate\Support\Str::limit(strip_tags($user->getProfileSummary('summary')),150,'...')}}</p>

                        </li>

                        <!-- job end --> 

                        @endforeach

                        @endif

                    </ul>

                </div>

            </div>

</div>

@include('templates.vietstar.includes.footer')

@endsection
