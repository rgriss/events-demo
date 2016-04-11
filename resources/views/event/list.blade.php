@if($events->count() <= 0)
   <p class="padding">There are no events.</p>
@endif

<div class="event-list-container">
    @foreach($events as $event)
    <div class="event-list-row row">
        <div class="left-col col-xs-7 col-sm-9">
            <div class="row">
                <div class="event-title col-sm-8">
                    <a href="/event/{{$event->id}}">{{$event->title}}</a>
                </div>
                <div class="event-date col-sm-4">
                    {{$event->date->format('n/j/y')}}
                </div>
            </div>
        </div>
        <div class="right-col col-xs-5 col-sm-3 text-right">
            <div class="event-actions">
                @if(@$show_signup_links)
                    <a class="btn btn-primary" href="/event/{{$event->id}}/register"><i class="fa fa-plus"></i>  Sign Up</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
