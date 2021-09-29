<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <main class="cabinet__container">
        @yield('content')

        <div class="toast-container position-absolute p-3 bottom-0 end-0">
            <div id="notificationToast"  class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Администрация</strong>
                    <small id="notificationToast__timestamp" class="text-muted"></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div id="notificationToast__message" class="toast-body">

                </div>
            </div>
        </div>

    </main>

    <script src="{{ mix('js/app.js') }}"></script>


    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<script>

    // Подписка на персональные уведомления
    Echo.private('App.Models.User.{{ auth()->user()->id }}')
        .notification((notification) => {
            showNotification(notification.message)
        });

    // Подписка на общие уведомления
    Echo.channel('events')
        .listen('.CreateNotification', function (notification) {
            showNotification(notification.message)
        })

    let notificationForm = document.querySelector('#notificationForm')
    let notificationToast = document.querySelector('#notificationToast')
    let notificationToast__message = document.querySelector('#notificationToast__message')
    let notificationToast__timestamp = document.querySelector('#notificationToast__timestamp')
    let notificationForm__message__err = document.querySelector('#notificationForm__message__err')

    notificationToast = new bootstrap.Toast(notificationToast)

    // Ждем пока пользователь отправит данные из формы
    notificationForm.addEventListener('submit', function (event) {
        event.preventDefault()

        let notificationForm__message = notificationForm.querySelector('#notificationForm__message')
        let notificationForm__user = notificationForm.querySelector('#notificationForm__user')

        // Отправляем запрос
        sendMessage(notificationForm__user.value, notificationForm__message.value)
    })

    // Функция отображения уведомления
    function showNotification(message) {
        notificationToast__message.innerHTML = message
        notificationToast__timestamp.innerHTML = generateTimestamp()
        notificationToast.show()
    }

    // Функция отправки запроса
    function sendMessage(user_id, message) {
        axios.post('api/notifications/create', {user_id: user_id, message: message})
            .then((response) => {
                notificationForm__message__err.innerHTML = ''
            })
            .catch(function (error) {
                if (error.response) {
                    let errors = error.response.data.errors
                    notificationForm__message__err.innerHTML = errors['message']
                }
            });
    }

    // Функция генерирования даты для уведомления
    function generateTimestamp() {
        let date = new Date();

        return date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()
    }

</script>

</body>
</html>
