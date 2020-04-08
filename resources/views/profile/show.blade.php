<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Test</title>
    <style>
        *, *::before, *::after{
            box-sizing: border-box;
        }

        body{
            margin: 0;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            color: #111111;
            height: 100vh;
        }

        .wrapper{
            position: relative;
            width: 100%;
            height: 100%;
        }

        .main-content{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);

            display: flex;
        }

        .heading{
            text-align: center;
        }

        .my-profile{
            margin-right: 50px;
            height: 100%;
            flex-basis: 50%;
        }

        .profile{
            display: flex;
            align-items: center;

            background-color: #ececec;
            border-radius: 3px;
            border: 1px solid rgb(221, 221, 221);
            padding: 20px;
        }

        .avatar{
            min-width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 35px;
        }

        .avatar__pic{
            max-width: 100%;
        }

        .nickname{
            font-weight: bold;
            font-size: 120%;
            color: rgb(40, 50, 71);
            margin-bottom: 15px;
        }

        .user-name{
            white-space: nowrap;
            font-size: 110%;
            margin-bottom: 15px;
        }

        .phone{
            display: block;
            text-decoration: none;
        }

        .edit-profile{
            flex-basis: 50%;
        }

        .form{
            background-color: #ececec;
            border-radius: 3px;
            border: 1px solid rgb(221, 221, 221);
            padding: 20px;
        }

        .form__list{
            margin: 0;
            padding: 0;
        }

        .form__item{
            list-style: none;
            margin-bottom: 15px;
            display: flex;
        }

        .form__item:last-child{
            margin-bottom: 0;
        }

        .form__label{
            display: block;
            flex-basis: 30%;
        }

        .form__input{
            flex-grow: 1;
        }

        .form__inline-label{
            display: inline-block;
            margin-right: 10px;
        }

        .form__inline-input{
            margin-right: 10px;
        }

        .form__button{
            margin: 0 auto;
            padding: 2px 5px;
        }

        .form__title{
            margin-right: 15px;
        }
    </style>
</head>
<body>
@php
/** @var \App\Models\User $user */
@endphp
@if($errors->any)
    {{ $errors->first() }}
@endif
<div class="wrapper">
    <main class="main-content">
        <div class='edit-profile'>
            <form class='form' id='form'>
                <ul class="form__list">
                    <li class="form__item">
                        <label class='form__label' for="email">Электронная почта:</label>
                        <input readonly class='form__input' id='email' type="text" name="email" value="{{ $user->email }}">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="password">Пароль:</label>
                        <input readonly class='form__input' id='password' type="password" name="password">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="password_confirmation">Пароль ещё раз:</label>
                        <input readonly class='form__input' id='password_confirmation' type="password" name="password_confirmation">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="nickname">Никнейм:</label>
                        <input readonly class='form__input' id='nickname' type="text" name="nickname" value="{{ $user->profile->nickname }}">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="name">Имя:</label>
                        <input readonly class='form__input' id='name' type="text" name="name" value="{{ $user->profile->name }}">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="surname">Фамилия:</label>
                        <input readonly class='form__input' id='surname' type="text" name="surname" value="{{ $user->profile->surname }}">
                    </li>
                    <li class="form__item">
                        <label class='form__inline-label' for="avatar">Аватар:</label>
                        <input style="pointer-events: none;" class='form__inline-input' id='avatar' type="file" name="avatar" value='image/jpeg,image/png'>
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="phone">Телефон:</label>
                        <input readonly class='form__input' id='phone' type="text" name="phone" value="{{ $user->profile->phone }}">
                    </li>
                    @if(is_array(\App\Models\UserProfile::GENDERS) && count(\App\Models\UserProfile::GENDERS))
                        <li class="form__item">
                            <div class="form__title">Пол:</div>
                            @foreach(\App\Models\UserProfile::GENDERS as $gender)
                                <label class='form__inline-label' for="{{ $gender }}">
                                    {{ \App\Models\UserProfile::GENDERS_LABELS[$gender] }}
                                </label>
                                <input readonly {{ $user->profile->sex === $gender ? 'checked' : '' }}
                                       class='form__inline-input' name='sex' value="{{ $gender }}" id='{{ $gender }}' type="radio">
                            @endforeach
                        </li>
                    @endif
                    <li class="form__item">
                        <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                        <input type="hidden" name="consent_to_receive_email" value="0">
                        <input readonly {{ $user->profile->consent_to_receive_email ? 'checked' : '' }}
                               class='form__inline-input' id='showPhone' name="consent_to_receive_email" value="1" type="checkbox">
                    </li>
                </ul>
            </form>
        </div>
    </main>
</div>
</body>
</html>