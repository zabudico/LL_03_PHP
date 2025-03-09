# Лабораторная работа №3: Массивы и Функции  
**Выполнил:** Zabudico AlexAandr  
**Группа:** I-2302_ru_ș.e. 
**Дата:** 09.03.2024

---

## Инструкции по запуску проекта

### Требования:
- PHP 8.0+
- Веб-сервер (Apache/Nginx)
- Браузер с поддержкой HTML5/CSS3

### Шаги:
1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/your-repo/transactions-gallery.git
   cd transactions-gallery
   ```
2. Создать директорию `image` и добавить 20-30 изображений в формате `.jpg`
3. Запустить веб-сервер:
   ```bash
   php -S localhost:8000
   ```
4. Открыть в браузере:
   - Управление транзакциями: `http://localhost:8000/transactions.php`
   - Галерея изображений: `http://localhost:8000/gallery.php`

---

## Описание лабораторной работы

### Цель:
1. Освоить работу с массивами и функциями в PHP.
2. Реализовать систему управления банковскими транзакциями.
3. Создать адаптивную галерею изображений.

### Задание 1: Управление транзакциями
- Создание/удаление транзакций
- Сортировка по дате и сумме
- Поиск по описанию и ID
- Расчет общего баланса и дней с момента транзакции

### Задание 2: Галерея изображений
- Динамическая загрузка изображений из директории
- Адаптивный дизайн с CSS Grid
- Эффекты анимации при наведении

---

## Краткая документация к проекту

### Управление транзакциями (`functions.php`)

| Функция                  | Параметры                                      | Возвращаемое значение | Описание                              |
|--------------------------|-----------------------------------------------|-----------------------|---------------------------------------|
| `calculateTotalAmount`   | `array $transactions`                         | `float`               | Сумма всех транзакций                 |
| `findTransactionByDescription` | `string $descriptionPart`              | `array`               | Поиск по части описания               |
| `findTransactionById`    | `int $id`                                     | `array|null`          | Поиск по ID через `array_filter`      |
| `daysSinceTransaction`   | `string $date`                                | `int`                 | Расчет дней с даты транзакции         |
| `addTransaction`         | `int $id, string $date, float $amount, ...`   | `void`                | Добавление с валидацией данных        |
| `deleteTransactionById`  | `int $id`                                     | `bool`                | Удаление с переиндексацией массива    |

### Галерея изображений (`gallery.php`)
```php
function getImages(string $dir): array {
    // Возвращает массив .jpg файлов из указанной директории
    // Игнорирует системные файлы (., ..)
    // Пример: ['image/cat1.jpg', 'image/cat2.jpg']
}
```

---

## Примеры использования проекта

### 1. Вывод транзакций с подсчётом дней
```php
foreach ($transactions as $transaction) {
    echo "<tr>
        <td>{$transaction['id']}</td>
        <td>{$transaction['date']}</td>
        <td>\${$transaction['amount']}</td>
        <td>".daysSinceTransaction($transaction['date'])." дней</td>
    </tr>";
}
```
**Результат:**  
Таблица с колонками: ID, Дата, Сумма, Дней с транзакции.

---

### 2. Добавление транзакции с обработкой ошибок
```php
try {
    addTransaction(5, "2024-03-15", 199.99, "Netflix", "Онлайн подписка");
} catch (InvalidArgumentException $e) {
    echo "<div class='error'>{$e->getMessage()}</div>";
}
```
**Проверки:**  
- Уникальность ID  
- Формат даты (`YYYY-MM-DD`)  
- Положительная сумма  

---

### 3. Адаптивная галерея изображений
```html
<div class="gallery">
    <?php foreach (getImages('image') as $img): ?>
        <img src="<?= $img ?>" alt="Cat" class="gallery-img">
    <?php endforeach; ?>
</div>
```
**Стили CSS:**
```css
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
}

.gallery-img {
    transition: transform 0.3s;
    height: 240px;
    object-fit: cover;
}
```

---

## Ответы на контрольные вопросы

1. **Что такое массивы в PHP?**  
   Массивы — упорядоченные коллекции элементов, доступные по индексу (числовой массив) или ключу (ассоциативный массив). Могут содержать элементы разных типов.

2. **Способы создания массива:**  
   - Короткий синтаксис: `$arr = [1, 2, 3];`  
   - Функция `array()`: `$assoc = array('id' => 1, 'name' => 'Test');`  
   - Динамическое добавление: `$arr[] = 'Новый элемент';`

3. **Цикл foreach:**  
   Используется для итерации по массивам:
   ```php
   foreach ($array as $key => $value) {
       echo "Ключ: $key, Значение: $value";
   }
   ```

---

## Список использованных источников

1. Официальная документация PHP: [php.net/manual/ru](https://www.php.net/manual/ru/)
2. Руководство по CSS Grid: [MDN Web Docs](https://developer.mozilla.org/ru/docs/Web/CSS/CSS_Grid_Layout)
3. Руководство по безопасности OWASP: [OWASP Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/PHP_Security_Cheat_Sheet.html)

---

## Дополнительные аспекты

1. **Безопасность:**  
   - Экранирование вывода через `htmlspecialchars()`  
   - Валидация входных параметров в функциях  
   - Обработка исключений через `try/catch`

2. **Производительность:**  
   - Использование `array_filter` вместо циклов для поиска  
   - Кэширование списка изображений в галерее

3. **Адаптивность:**  
   - Медиа-запросы для мобильных устройств:  
     ```css
     @media (max-width: 768px) {
         .gallery-img { height: 150px; }
     }
     ```
``` 

**Примечание:** Для наглядности рекомендуется добавить скриншоты интерфейса в раздел примеров, но в текстовом формате они заменены описаниями.
