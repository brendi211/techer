@foreach($items as $item)
        <!-- Single Comment -->
        <div class="media mb-4 mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$item->name}}</h5>
            <div class="text-sm">
                {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}                     
            </div>

            {{ $item->text }}




    <div class="reply group">
        <a class="comment-reply-link" href="#respond">Ответить</a>                    
    </div>

    <!-- .comment-author .vcard -->
 @if(isset($com[$item->id]))
        @include('post.comment', ['items' => $com[$item->id]])
 @endif
          </div>
        </div>
@endforeach