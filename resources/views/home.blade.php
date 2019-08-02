@extends('layouts.app')

@section('meta')

@endsection

@section('content')

    <div class="app-viewport home_viewport" id="viewport">
        <div class="app-screen scroll-block homescreen_1">
            <div class="app-screen-inn">
                <div class="app-screen-content">
                    <div class="homescreen_1-text1">
                        <div class="homescreen_1-text1-line"><span>Роман</span></div><br/>
                        <div class="homescreen_1-text1-line"><span>Енаев</span></div>
                    </div>
                    <div class="homescreen_1-text2">Руководитель интернет-проектов и цифровых продуктов</div>
                </div>
            </div>
        </div>
        <div class="app-screen scroll-block homescreen_2">
            <div class="app-screen-inn">
                <div class="app-screen-content">
                    <div class="homescreen_2-text">
                        <p>Здравствуйте. Меня зовут Роман. </p>
                        <p>Последние 10 лет своей жизни я посвятил себя разработке  и управлению интернет-проектами.<br/>За это время накопилось не мало знаний и опыта, которыми я готов делиться и применять в новых проектах.</p>
                        <p>Я всегда открыт к предложениям и новым вызовам. Обращайтесь.<br/>Буду рад сотрудничеству!</p>
                    </div>
                    <div class="homescreen_2-btn"><a class="btn" href="cooperation.blade.php" data-text="Сотрудничество"><span>Сотрудничество</span></a></div>
                </div>
            </div>
        </div>
    </div>

@endsection