@inject('widgets', 'App\Services\WidgetsService')

@php
    $widget = $widgets->widgets();
@endphp

<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">library_books</i>
            </div>
            <div class="content">
                <div class="text">TOTAL BOOKS</div>
                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                <div class="text text-center">
                    <strong>{{ $widget['totalBooks'] }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">collections</i>
            </div>
            <div class="content">
                <div class="text">BORROWED BOOKS</div>
                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                <div class="text text-center">
                    <strong>{{ $widget['borrowed'] }}</strong>
                </div>    
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person</i>
            </div>
            <div class="content">
                <div class="text">FACULTY & STAFF</div>
                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                <div class="text text-center">
                    <strong>{{ $widget['faculty'] }}</strong>
                </div>    
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">NO. OF STUDENTS</div>
                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                <div class="text text-center">
                    <strong>{{ $widget['student'] }}</strong>
                </div>    
            </div>
        </div>
    </div>
</div>