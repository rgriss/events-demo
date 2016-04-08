@if($events->count() <= 0)
   <p>This list is empty.</p>
@endif
<ul class="event-list">
    @foreach($events as $event)
        <li>
            @if(@$show_signup_links)
                <a class="btn btn-primary btn-lg" href="/event/{{$event->id}}/register">Sign Up</a>
            @endif
            <a href="/event/{{$event->id}}">{{$event->title}}</a> ({{$event->date->format('Y-m-d')}})

        </li>
    @endforeach
</ul>
