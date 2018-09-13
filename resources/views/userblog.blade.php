<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="{{asset('frontend/js/script.js')}}"></script>
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row top-section">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <h5>
                        We are simply against instant gratification
                    </h5>
                </div>
                <div class="col-md-3 potatoes text-center" style="background-image: url('{{asset('frontend/images/card/potatoes.png')}}');" >
                    <p>Potatoes</p>
                    <span class="download">Download the app</span>
                </div>
                <div class="col-md-3 topbtns">
                    <span class="available">Available Now</span>
                    <a href="#"><span class="philosopy">Our philosopy</span></a>
                    <a href="{{URL::to('/login')}}">sign in</a>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row pg-row">
                <div class="col-md-12 pg-icons">
                    <img src="{{asset('frontend/images/card/grid.png')}}"/>
                    <img src="{{asset('frontend/images/card/hamburger.png')}}"/>
                </div>
            </div>
            <div class="row">
                <?php
                $all_published_card=DB::table('tbl_userdata')
                                    ->leftjoin('tbl_users', 'tbl_userdata.user_id','=','tbl_users.user_id')
                                    ->select('tbl_userdata.*','tbl_users.user_name','tbl_users.user_photo')
                                    ->where('tbl_userdata.publication_status',1)
                                    ->get();
                foreach($all_published_card as $v_card){?>	
                <div class="col-md-4" >
                    <div class="card" id="card_id" data-id="{{$v_card->userdata_id}}" style="width: 100%;">
                        <div class="card-header text-center">
                            <img id="{{"bell-alert".$v_card->userdata_id}}" src="{{asset('frontend/images/card/alert.png')}}"
                                class="bell-alert"
                                data-toggle="tooltip" 
                                data-placement="top" 
                                title="Get notified when this article is available on the app"/>
                            <a href="#"><img class="righttop" src="{{asset('frontend/images/card/arrow.png')}}"/></a>
                        </div>
                        <div class="img-body" data-id="{{$v_card->userdata_id}}" style="background-image: url('{{$v_card->card_image}}');">
                            <div class="middle-ib">
                                <span id="{{"span".$v_card->userdata_id}}">
                                    {{ $v_card->user_description }}
                                </span>
                            </div>

                            <div class="bottom-ib">
                                <div class="text-center">
                                    <img id="avatar" src="{{$v_card->user_photo}}"/>
                                </div>
                            </div>

                            <div class="eye">
                                <img class="eye-img" src="{{asset('frontend/images/card/eye.png')}}"/>
                                <span class="eye-comment">Uncover this photo now on the photosapp</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="status-sections">
                                <div class="st">
                                    <span id="{{"count_star_id".$v_card->userdata_id}}">{{$v_card->count_star}}</span>
                                    <img src="{{asset('frontend/images/card/star.png')}}" style="margin-bottom:3px" />
                                </div>
                                <div class="bt">
                                    <span>{{$v_card->max_star}}</span>
                                    <img src="{{asset('frontend/images/card/bubblew.png')}}" />
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="info-sections">
                                <div class="st">
                                    <img class="left-info" src="{{asset('frontend/images/card/info.png')}}" 
                                        data-toggle="tooltip" 
                                        data-placement="bottom" 
                                        title="Number of people interest in this article"/>
                                </div>
                                <div class="bt">
                                    <img class="right-info" src="{{asset('frontend/images/card/info.png')}}" 
                                        data-toggle="tooltip" 
                                        data-placement="right" 
                                        title="Interest Target : The number of interests needed to uncover this article"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </body>
</html>