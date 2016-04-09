@if($events->count() <= 0)
   <p class="padding">There are no events.</p>
@endif

<style>

</style>
<div class="event-list-container">
    @foreach($events as $event)
    <div class="event-list-row row">

        <div class="left-col col-xs-8 col-sm-10">
            <div class="event-title col-sm-8">
                <a href="/event/{{$event->id}}">{{$event->title}}</a>
            </div>
            <div class="event-date col-sm-4">
                {{$event->date->format('n/j/y')}}
            </div>
        </div>
        <div class="right-col col-xs-4 col-sm-2 text-right">
            <div class="event-actions">
                @if(@$show_signup_links)
                    <a class="btn btn-primary" href="/event/{{$event->id}}/register">Sign Up</a>
                @endif
            </div>
        </div>


    </div>
    @endforeach
</div>
