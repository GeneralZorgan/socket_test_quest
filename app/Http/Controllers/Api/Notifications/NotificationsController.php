<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Events\Notifications\CreateNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Notifications\CreateNotificationRequest;
use App\Notifications\Toast\PersonalToastNotification;
use App\Notifications\Toast\ToastNotification;
use App\Repositories\UsersRepository;

class NotificationsController extends Controller
{

    protected $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Обработка запроса создания уведомления
     *
     * @param CreateNotificationRequest $request
     */
    public function create(CreateNotificationRequest $request)
    {
        // Сохраняем проверенные данные в переменную
        $data = $request->validated();
        // Получаем и сохраняем пользователя по его ID
        $user = $this->usersRepository->getById($data['user_id']);
        // Если пользователь есть, то отправляем ему персональное уведомление
        if ($user) {
            $user->notify(new PersonalToastNotification($data['message']));
        // Если пользователь не найден, то отправляем общее уведомление
        } else {
            event(new CreateNotification($data['message']));
        }
    }
}
