@extends('layouts.app')

@section('meta')

@endsection

@section('content')

      <div class="app-viewport home_viewport" id="viewport">
        <div class="app-screen scroll-block contacts">
          <div class="app-screen-inn">
            <div class="app-screen-content">
              <div class="app-screen-title">
                <h2>Контакты</h2>
              </div><!-- 
              <div class="contacts-text">
                <p>Мобильный телефон не указан по причине того, что я не люблю звонки без предварительной договоренности.<br>Я читаю все сообщения и письма и отвечаю всем по мере возможности и заинтересованности.</p>
              </div> -->
              <div class="contacts__form">
                <form action="" id="contactsForm">
                  <div class="contacts__form--row">
                    <label for="name">
                      <input type="text" id="name" name="name" placeholder="Имя" class="input" data-state="required">
                      Это поле нужно заполнить
                    </label>
                    <label for="email">
                      <input type="email" id="email" name="email" placeholder="Ваша почта" class="input" data-state="required">
                      Это поле нужно заполнить
                    </label>
                    <label for="contacts">
                      <input type="text" id="contacts" name="contact" placeholder="Другие контакты (телефон, телеграм, соцсети)" class="input">
                      Это поле нужно заполнить
                    </label>
                  </div>
                  <div class="contacts__form--row">
                    <div class="select-box--wrapper">
                      <select name="topic" id="topic" class="select-box">
                        <option value="">Тема обращения</option>
                        <option value="Консультанция">Консультанция</option>
                        <option value="Сотрудничество">Сотрудничество</option>
                      </select>
                      <div class="select-box--drop-icon">
                        <svg class="svg">
                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#dropdown"></use>
                        </svg>
                      </div>
                      <p class="notification">Необходимо выбрать тему</p>
                    </div>
                    <label for="message">
                      <textarea id="message" name="message" placeholder="Сообщение" class="input" data-state="required"></textarea>
                      Это поле нужно заполнить
                    </label>
                    <div class="contacts__form--button">
                      <button data-text="Отправить" type="submit" class="btn">Отправить</button>
                    </div>
                  </div>
                  <div class="contacts__form--agreement">
                    Я согласен с <a href="javascript:void(0)">условиями обработки моих данных</a>
                  </div>
                </form>
              </div>
              <div class="contacts__social-block">
                <div class="contacts--social">
                  <span class="vk">
                    <svg class="svg">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#vk"></use>
                    </svg>
                  </span>
                  <a target="_blank" href="http://vk.me/enairoma">vk.me/enairoma</a>
                </div>
                <div class="contacts--social">
                  <span class="facebook">
                    <svg class="svg">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#facebook"></use>
                    </svg>
                  </span>
                  <a target="_blank" href="http://fb.me/enairoma">fb.me/enairoma</a>
                </div>
                <div class="contacts--social">
                  <span class="telegram">
                    <svg class="svg">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#telegram"></use>
                    </svg>
                  </span>
                  <a target="_blank" href="http://t.me/enairoma">t.me/enairoma</a>
                </div>
                <div class="contacts--social">
                  <span class="instagram">
                    <svg class="svg">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#instagram"></use>
                    </svg>
                  </span>
                  <a target="_blank" href="http://instagram.com/enairoma">@enairoma</a>
                </div>
                <div class="contacts--social">
                  <span class="email">
                    <svg class="svg">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#email"></use>
                    </svg>
                  </span>
                  <a href="mailto:pm@enaev.pro">romav@enaev.pro</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="opacity"></div>
      <div class="preloader">
        <div class='sk-fading-circle'>
          <div class='sk-circle sk-circle-1'></div>
          <div class='sk-circle sk-circle-2'></div>
          <div class='sk-circle sk-circle-3'></div>
          <div class='sk-circle sk-circle-4'></div>
          <div class='sk-circle sk-circle-5'></div>
          <div class='sk-circle sk-circle-6'></div>
          <div class='sk-circle sk-circle-7'></div>
          <div class='sk-circle sk-circle-8'></div>
          <div class='sk-circle sk-circle-9'></div>
          <div class='sk-circle sk-circle-10'></div>
          <div class='sk-circle sk-circle-11'></div>
          <div class='sk-circle sk-circle-12'></div>
        </div>
      </div>
      <div class="pop-up">
      <div class="pop-up--image">
        <img src="./img/svg/checked.svg" alt="success">
      </div>
      <div class="pop-up__text-block">
        <p class="pop-up--title">Ваше сообщение отправлено</p>
        <p class="pop-up--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, ex quasi sequi porro, enim animi.</p>
      </div>
      <div class="pop-up--closer"></div>

@endsection