# Welcome to Languages Laravel

Небольшая библиотека для работы с переводами в языковых файлах.

Данная библиотека может:

- **Добавлять**
- **Редактировать**
- **Показывать**
- **Удалять**

Добавлены artisan команды:

- **Показать список языков**
- **Добавление нового языка**

# Установка

```bash
composer require "Orange-laravel/Language"
```

Для работы artisan команд нужно в файле `app\Console\Kernel` добавить следующее:

```bash
protected $commands = [
  LanguageAdd::class,
  LanguageList::class
];
```

# Использование

1) Создание нового языка:

```bash
php artisan language:add en
```

2) Добавление нового перевода:

```php
Language::set('service.id.name', 'nameMyService', 'en');
```

3) Чтение нового перевода:

```php
$myValue = Language::get('service.id.name', 'en');

// nameMyService
```

или

```php
$myValue = __('service')['id']['name'];

// nameMyService 
```
Второй вариант будет работать правильно, только если выбран правильный язык, т.к. в дефолтном варианте нельзя указать язык, с которого нужно получить перевод.

4) Редактирование (перезаписывание):
```php
Language::set('service.id.name', 'nameMyNewService', 'en');
```

5) Удаление:

```php
Language::delete('service.id.name', 'en');
```

# Как это работает

В первом пункте мы создаём файл с названием языка: `resources/lang/en.json`

При добавлении или перезаписывании перевода, файл редактируется и приходит к виду:

```json
{
    "service": {
        "id": {
            "name": "nameMyService"
        }
    }
}
```