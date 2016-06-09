Сервисы Пеликан
===============

В общем случае для каждого сервиса должно быть реализовано два класса:

1. Класс, отвечающий за работу с сервисом и реализующий интерфейс `\pelican\services\interfaces\Service`,

2. Класс отвечающий за представление данных ответа от сервиса и реализующий интерфейс `\pelican\services\interfaces\Result`.



Соглашения при реализации сервисов:
-----------------------------------

1. Сервисы должны иметь свое пространство имен внутри пространства имен `\pelican\services\`. Например, `\pelican\services\portbilet` или `\pelican\services\gloria`.

2. Базовый класс сервиса должен называться `Service`. Например, `\pelican\services\portbilet\Service`.

3. Базовый класс данных ответа сервиса должен называться `Result`. Например, `\pelican\services\portbilet\Result`.

4. Каждый сервис должен быть реализован отдельным пакетом для composer, который будет иметь в зависимостях данный пакет.

5. Сервисы должны сами перехватывать все исключения и не выбрасывать их далее.



Пример взаимодействия с сервисом
--------------------------------

```php
	//инициируем объект сервиса
	$service = new \pelican\services\portbilet\Service;
	//конфигурируем объект сервиса
	$service->setOptions([
		'wsdl' => '...',
		'login' => '...',
		'password' => '...',
	]);
	//получим список доступных вылетов из тюмени за текущую дату
	$request = new \pelican\services\Request('get_flights', [
		'from' => 'tmn',
		'date' => date('Y-m-d'),
	]);
	$response = new \pelican\services\ResponseList;
	$service->queryAll($request, $response);
	//далее, согласно какой-либо бизнес логике сайта выбираем нужный перелет
	$flight = $response[17];
	//забронируем билет на данный перелет
	$request = new \pelican\services\Request('order_flight', [
		'flight' => $flight,
		'user' => Yii::$app->user,
	]);
	$service->query($request, $response);
	//проверяем результат
	if ($response->getErrorCode() === null) {
		echo 'Перелет успешно забронирован!';
	} else {
		echo 'Произошла ошибка: ' . $response->getErrorMessage();
	}
```