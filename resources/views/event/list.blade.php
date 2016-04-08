@if($events->count() <= 0)
   <p class="padding">There are no events.</p>
@endif
<div class="event-list-container">
    @foreach($events as $event)
    <div class="event-list-row row">
        <div class="event-actions col-sm-2">
            @if(@$show_signup_links)
                <a class="btn btn-primary" href="/event/{{$event->id}}/register">Sign Up</a>
            @endif
        </div>
        <div class="event-title col-sm-6">
            <a href="/event/{{$event->id}}">{{$event->title}}</a>
        </div>
        <div class="event-date col-sm-3">
            {{$event->date->format('n/j/y')}}
        </div>
    </div>
    @endforeach
</div>
