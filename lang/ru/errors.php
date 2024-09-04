<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'internal_server_error'        => 'На сервере появился сбой',
    'unauthenticated'              => 'Вы не авторизованы',
    'forbidden'                    => 'Вход запрещен',
    'model_not_found'              => ':model не найден',
    'not_found'                    => 'Страница не найдена',
    'limited_sms'                  => 'Попробуйте по позже',
    'sms_not_sent'                 => 'sms не отправлено',
    'the_code_or_number_incorrect' => 'Неверный код или номер',
    'user'                         => [
        'old_phone_incorrect'  => 'Старый номер не совпадает',
        'not_found'            => 'Пользователь не найден',
        'photo_format'         => 'Формат изображения должен быть jpeg или png, svg',
        'password_not_match'   => 'Ваши введенные пароли не совпадают',
        'invalid_password'     => 'Пароль введен неправильно',
        'email_or_password'    => 'Ошибка почты или пароля',
        'sms_not_found'        => 'Sms не найден',
        'email_code_not_found' => 'код не найден',
    ],
    'passport'                     => [
        'invalid_grant' => 'Недействительный грант'
    ],
    'file'                         => [
        'max_size' => 'Размер Файла  должно быть меньше :size Мб.',
    ],
    'given_data_invalid'           => 'Приведенные данные неверны',
    'error_server'                 => 'В сервере произошла ошибка! Свяжитесь администратором.',
    'error_validation'             => 'В сервере произошла ошибка!',
    'connection_not_db'            => 'SQL подключение не установлено',

];
