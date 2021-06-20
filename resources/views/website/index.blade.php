<link rel="stylesheet" type="text/css" href="{{ asset('css/css.css')}}">
<title>Trợ lý ảo</title>
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> Trợ lý ảo
    </div>
    <div class="msger-header-options">
      <span><i class="fas fa-cog"></i></span>
    </div>
  </header>
  <main class="msger-chat">
  @foreach( $items as $item )
    <?php
      $class = 'left';
      if( $item->user_id == $current_user_id ){
        $class = 'right';
      }
    ?>
        <div class="msg {{ $class }}-msg">
            <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)">
            </div>

            <div class="msg-bubble">
                <div class="msg-info">
                    <div class="msg-info-name">
                        <?php if( $item->user_id == $current_user_id ): ?>
                        Me
                        <?php else: ?>
                        Bot
                        <?php endif; ?>
                    </div>
                    <div class="msg-info-time"><?= date('H:i',strtotime($item->created_at)); ?></div>
                </div>

                <div class="msg-text">

                    {{ $item->content }}
                </div>
            </div>
        </div>

        @endforeach

    </main>

    <form class="msger-inputarea" action="{{ route('Input') }}" method="post">
        @csrf
        <input type="text" class="msger-input" name="input" placeholder="Nhập tin nhắn">
        <button type="submit" class="msger-send-btn">Gửi</button>
    </form>
</section>