@extends('layouts.app')

@section('meta')

@endsection

@section('content')

      <div class="app-viewport" id="viewport">
        <div class="app-screen scroll-block projectsscreen_1">
          <div class="projectsscreen_1-slider">
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/1.png);"></div>
              <a href="{{ route('work.melamenu') }}" class="projectsscreen_1-slide-title">Melamenu</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/4.png);"></div>
              <a href="{{ route('work.festmarket') }}" class="projectsscreen_1-slide-title">festmarket</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/abido.png);"></div>
              <a href="{{ route('work.abido') }}" class="projectsscreen_1-slide-title">Abido</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/3.png);"></div>
              <a href="{{ route('work.kenaz') }}" class="projectsscreen_1-slide-title">kenaz analytics</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/sleki.png);"></div>
              <a href="{{ route('work.sleki') }}" class="projectsscreen_1-slide-title">Sleki</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/2.png);"></div>
              <a href="{{ route('work.badcube') }}" class="projectsscreen_1-slide-title">Badcube</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
            <div class="projectsscreen_1-slide">
              <div class="projectsscreen_1-slide-bg" style="background-image: url(img/content/projects/domonos.png);"></div>
              <a href="{{ route('work.domonos') }}" class="projectsscreen_1-slide-title">Domonos</a>
              <div class="projectsscreen_1-slide-text">
                <p>Мобильное приложение по доставке еды</p>
              </div>
            </div>
          </div>
          <!-- <div class="app-screen-footer">2018 © Роман Енаев. Все права защищены. <a href="#">Политика конфиденциальности</a>.</div> -->
        </div>
      </div>

@endsection