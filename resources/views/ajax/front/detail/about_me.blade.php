<div class="dashbaord-content-box p-0">
    <iframe width="100%" height="350" src="{{ $user->tutor_profile->embed_video_url ?? 'https://www.youtube.com/embed/togxaC8QRlU' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="p-5">
        <div class="other-info">
            <p><span class="icon"><i class="fa fa-map-marker"></i></span> {{ $tutor->lives_in.", ".$tutor->country }} </p>
                <p><span class="icon"><i class="fa fa-check-circle"></i></span> Speaks:
                @foreach($user->tutor_speaks as $item)
                    {{ $item->language }} @if($loop->iteration == $loop->last)  @else , @endif
                @endforeach

            </p>
        </div>
        <div class="about-me">
            <p class="widget-section-heading font-weight-bold">Description</p>
            <p class="intro">
                @if(isset($tutor->description))
                    {{ $tutor->description ?? '' }}
                @endif
            </p>
        </div>
    </div>
</div>