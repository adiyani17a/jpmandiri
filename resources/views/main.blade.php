<!DOCTYPE html>
<html lang="id">
@include('layouts._head')
@yield('extra_style')
<body>
  <div class="container-scroller">
    @include('layouts._topnav')
    <div class="container-fluid page-body-wrapper">
      @include('layouts._sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layouts._footer')
      </div>
    </div>
  </div>
  <div  style="position: fixed;z-index: 1000000;bottom: 25px;right: 50px">
    <a onclick="" style="cursor: pointer;">
      <img class="js-tilt chat-icon" style="width: 50px;height: 50px" src="{{ asset('assets/image/chat.png') }}">
    </a>
  </div>
  <div class="chat">
    <div class="chat-box">
      <div class="chat-head bg-gradient-success">
        <h5 class="text-light" style="padding-top: 5px;padding-right: 5px;text-align: center;">CHAT JPMANDIRI</h5>
      </div>
      <div class="chat-body default-skin bg-light scroll " style="word-wrap: break-word;">
        <div class="odd">
          <img class="js-tilt chat-icon" style="width: 50px;height: 50px" src="{{ asset('assets/image/chat.png') }}">
          <div class="talk-bubble-odd tri-right left-top-odd">
            <div class="talktext">
              <p>HelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHello</p>
            </div>
          </div>
        </div>
        <div class="even">
          <div class="talk-bubble-even tri-right left-top-even">
            <div class="talktext">
              <p>Hy HelloHelloHelloHelloHelloHelloHelloHelloHello.</p>
            </div>
          </div>
        </div>
        <div class="odd">
          <img class="js-tilt chat-icon" style="width: 50px;height: 50px" src="{{ asset('assets/image/chat.png') }}">
          <div class="talk-bubble-odd tri-right left-top-odd">
            <div class="talktext">
              <p>HelloHelloHelloHelloHelloHelloHelloHelloHelloHello</p>
            </div>
          </div>
        </div>
        <div class="even">
          <div class="talk-bubble-even tri-right left-top-even">
            <div class="talktext">
              <p>Hy HelloHelloHelloHelloHelloHelloHelloHelloHello.</p>
            </div>
          </div>
        </div>
        <div class="odd">
          <img class="js-tilt chat-icon" style="width: 50px;height: 50px" src="{{ asset('assets/image/chat.png') }}">
          <div class="talk-bubble-odd tri-right left-top-odd">
            <div class="talktext">
              <p>HelloHelloHelloHelloHelloHelloHelloHelloHelloHello</p>
            </div>
          </div>
        </div>
        <div class="even">
          <div class="talk-bubble-even tri-right left-top-even">
            <div class="talktext">
              <p>Hy HelloHelloHelloHelloHelloHelloHelloHelloHello.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="chat-text">
        <input type="text" name="">
      </div>
    </div>
  </div>
  @include('layouts._script')
  @yield('extra_script')
</body>
</html>
