<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sk', array (
  'validators' => 
  array (
    'This value should be false.' => 'Táto hodnota by mala byť nastavená na false.',
    'This value should be true.' => 'Táto hodnota by mala byť nastavená na true.',
    'This value should be of type {{ type }}.' => 'Táto hodnota by mala byť typu {{ type }}.',
    'This value should be blank.' => 'Táto hodnota by mala byť prázdna.',
    'The value you selected is not a valid choice.' => 'Táto hodnota by mala byť jednou z poskytnutých možností.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Mali by ste vybrať minimálne {{ limit }} možnosť.|Mali by ste vybrať minimálne {{ limit }} možnosti.|Mali by ste vybrať minimálne {{ limit }} možností.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Mali by ste vybrať najviac {{ limit }} možnosť.|Mali by ste vybrať najviac {{ limit }} možnosti.|Mali by ste vybrať najviac {{ limit }} možností.',
    'One or more of the given values is invalid.' => 'Niektoré z uvedených hodnôt sú neplatné.',
    'This field was not expected.' => 'Toto pole sa neočakáva.',
    'This field is missing.' => 'Toto pole chýba.',
    'This value is not a valid date.' => 'Tato hodnota nemá platný formát dátumu.',
    'This value is not a valid datetime.' => 'Táto hodnota nemá platný formát dátumu a času.',
    'This value is not a valid email address.' => 'Táto hodnota nie je platná emailová adresa.',
    'The file could not be found.' => 'Súbor sa nenašiel.',
    'The file is not readable.' => 'Súbor nie je čitateľný.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Súbor je príliš veľký ({{ size }} {{ suffix }}). Maximálna povolená veľkosť je {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Súbor typu ({{ type }}) nie je podporovaný. Podporované typy sú {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Táto hodnota by mala byť {{ limit }} alebo menej.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znak.|Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znaky.|Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znakov.',
    'This value should be {{ limit }} or more.' => 'Táto hodnota by mala byť viac ako {{ limit }}.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Táto hodnota je príliš krátka. Musí obsahovať minimálne {{ limit }} znak.|Táto hodnota je príliš krátka. Musí obsahovať minimálne {{ limit }} znaky.|Táto hodnota je príliš krátka. Minimálny počet znakov je {{ limit }}.',
    'This value should not be blank.' => 'Táto hodnota by mala byť vyplnená.',
    'This value should not be null.' => 'Táto hodnota by nemala byť null.',
    'This value should be null.' => 'Táto hodnota by mala byť null.',
    'This value is not valid.' => 'Táto hodnota nie je platná.',
    'This value is not a valid time.' => 'Tato hodnota nemá správny formát času.',
    'This value is not a valid URL.' => 'Táto hodnota nie je platnou URL adresou.',
    'The two values should be equal.' => 'Tieto dve hodnoty by mali byť rovnaké.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Súbor je príliš veľký. Maximálna povolená veľkosť je {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Súbor je príliš veľký.',
    'The file could not be uploaded.' => 'Súbor sa nepodarilo nahrať.',
    'This value should be a valid number.' => 'Táto hodnota by mala byť číslo.',
    'This file is not a valid image.' => 'Tento súbor nie je obrázok.',
    'This is not a valid IP address.' => 'Toto nie je platná IP adresa.',
    'This value is not a valid language.' => 'Tento jazyk neexistuje.',
    'This value is not a valid locale.' => 'Táto lokalizácia neexistuje.',
    'This value is not a valid country.' => 'Táto krajina neexistuje.',
    'This value is already used.' => 'Táto hodnota sa už používa.',
    'The size of the image could not be detected.' => 'Nepodarilo sa zistiť rozmery obrázku.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Obrázok je príliš široký ({{ width }}px). Maximálna povolená šírka obrázku je {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Obrázok je príliš úzky ({{ width }}px). Minimálna šírka obrázku by mala byť {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => '>Obrázok je príliš vysoký ({{ height }}px). Maximálna povolená výška obrázku je {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Obrázok je príliš nízky ({{ height }}px). Minimálna výška obrázku by mala byť {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Táto hodnota by mala byť aktuálne heslo používateľa.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Táto hodnota by mala mať presne {{ limit }} znak.|Táto hodnota by mala mať presne {{ limit }} znaky.|Táto hodnota by mala mať presne {{ limit }} znakov.',
    'The file was only partially uploaded.' => 'Bola nahraná len časť súboru.',
    'No file was uploaded.' => 'Žiadny súbor nebol nahraný.',
    'No temporary folder was configured in php.ini.' => 'V php.ini nie je nastavená cesta k adresáru pre dočasné súbory.',
    'Cannot write temporary file to disk.' => 'Dočasný súbor sa nepodarilo zapísať na disk.',
    'A PHP extension caused the upload to fail.' => 'Rozšírenie PHP zabránilo nahraniu súboru.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Táto kolekcia by mala obsahovať aspoň {{ limit }} prvok alebo viac.|Táto kolekcia by mala obsahovať aspoň {{ limit }} prvky alebo viac.|Táto kolekcia by mala obsahovať aspoň {{ limit }} prvkov alebo viac.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Táto kolekcia by mala maximálne {{ limit }} prvok.|Táto kolekcia by mala obsahovať maximálne {{ limit }} prvky.|Táto kolekcia by mala obsahovať maximálne {{ limit }} prvkov.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Táto kolekcia by mala obsahovať presne {{ limit }} prvok.|Táto kolekcia by mala obsahovať presne {{ limit }} prvky.|Táto kolekcia by mala obsahovať presne {{ limit }} prvkov.',
    'Invalid card number.' => 'Neplatné číslo karty.',
    'Unsupported card type or invalid card number.' => 'Nepodporovaný typ karty alebo neplatné číslo karty.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Toto je neplatný IBAN.',
    'This value is not a valid ISBN-10.' => 'Táto hodnota je neplatné ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Táto hodnota je neplatné ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Táto hodnota nie je platné ISBN-10 ani ISBN-13.',
    'This value is not a valid ISSN.' => 'Táto hodnota nie je platné ISSN.',
    'This value is not a valid currency.' => 'Táto hodnota nie je platná mena.',
    'This value should be equal to {{ compared_value }}.' => 'Táto hodnota by mala byť rovná {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Táto hodnota by mala byť väčšia ako {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Táto hodnota by mala byť väčšia alebo rovná {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Táto hodnota by mala byť typu {{ compared_value_type }} a zároveň by mala byť rovná {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Táto hodnota by mala byť menšia ako {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Táto hodnota by mala byť menšia alebo rovná {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Táto hodnota by nemala byť rovná {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Táto hodnota by nemala byť typu {{ compared_value_type }} a zároveň by nemala byť rovná {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Pomer strán obrázku je príliš veľký ({{ ratio }}). Maximálny povolený pomer strán obrázku je {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Pomer strán obrázku je príliš malý ({{ ratio }}). Minimálny povolený pomer strán obrázku je {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Strany obrázku sú štvorcové ({{ width }}x{{ height }}px). Štvorcové obrázky nie sú povolené.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Obrázok je orientovaný na šírku ({{ width }}x{{ height }}px). Obrázky orientované na šírku nie sú povolené.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Obrázok je orientovaný na výšku ({{ width }}x{{ height }}px). Obrázky orientované na výšku nie sú povolené.',
    'An empty file is not allowed.' => 'Súbor nesmie byť prázdny.',
    'The host could not be resolved.' => 'Hostiteľa nebolo možné rozpoznať.',
    'This value does not match the expected {{ charset }} charset.' => 'Táto hodnota nezodpovedá očakávanej znakovej sade {{ charset }}.',
    'This form should not contain extra fields.' => 'Polia by nemali obsahovať ďalšie prvky.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Odoslaný súbor je príliš veľký. Prosím odošlite súbor s menšou veľkosťou.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'CSRF token je neplatný. Prosím skúste znovu odoslať formulár.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Pri overovaní došlo k chybe.',
    'Authentication credentials could not be found.' => 'Overovacie údaje neboli nájdené.',
    'Authentication request could not be processed due to a system problem.' => 'Požiadavok na overenie nemohol byť spracovaný kvôli systémovej chybe.',
    'Invalid credentials.' => 'Neplatné prihlasovacie údaje.',
    'Cookie has already been used by someone else.' => 'Cookie už bolo použité niekým iným.',
    'Not privileged to request the resource.' => 'Nemáte oprávnenie pristupovať k prostriedku.',
    'Invalid CSRF token.' => 'Neplatný CSRF token.',
    'Digest nonce has expired.' => 'Platnosť inicializačného vektoru (digest nonce) skončila.',
    'No authentication provider found to support the authentication token.' => 'Poskytovateľ pre overovací token nebol nájdený.',
    'No session available, it either timed out or cookies are not enabled.' => 'Session nie je k dispozíci, vypršala jej platnosť, alebo sú zakázané cookies.',
    'No token could be found.' => 'Token nebol nájdený.',
    'Username could not be found.' => 'Prihlasovacie meno nebolo nájdené.',
    'Account has expired.' => 'Platnosť účtu skončila.',
    'Credentials have expired.' => 'Platnosť prihlasovacích údajov skončila.',
    'Account is disabled.' => 'Účet je zakázaný.',
    'Account is locked.' => 'Účet je zablokovaný.',
  ),
));

$catalogueRu = new MessageCatalogue('ru', array (
  'validators' => 
  array (
    'This value should be false.' => 'Значение должно быть ложным.',
    'This value should be true.' => 'Значение должно быть истинным.',
    'This value should be of type {{ type }}.' => 'Тип значения должен быть {{ type }}.',
    'This value should be blank.' => 'Значение должно быть пустым.',
    'The value you selected is not a valid choice.' => 'Выбранное Вами значение недопустимо.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Вы должны выбрать хотя бы {{ limit }} вариант.|Вы должны выбрать хотя бы {{ limit }} варианта.|Вы должны выбрать хотя бы {{ limit }} вариантов.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Вы должны выбрать не более чем {{ limit }} вариант.|Вы должны выбрать не более чем {{ limit }} варианта.|Вы должны выбрать не более чем {{ limit }} вариантов.',
    'One or more of the given values is invalid.' => 'Одно или несколько заданных значений недопустимо.',
    'This field was not expected.' => 'Это поле не ожидалось.',
    'This field is missing.' => 'Это поле отсутствует.',
    'This value is not a valid date.' => 'Значение не является правильной датой.',
    'This value is not a valid datetime.' => 'Значение даты и времени недопустимо.',
    'This value is not a valid email address.' => 'Значение адреса электронной почты недопустимо.',
    'The file could not be found.' => 'Файл не может быть найден.',
    'The file is not readable.' => 'Файл не может быть прочитан.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Файл слишком большой ({{ size }} {{ suffix }}). Максимально допустимый размер {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'MIME-тип файла недопустим ({{ type }}). Допустимы MIME-типы файлов {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Значение должно быть {{ limit }} или меньше.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Значение слишком длинное. Должно быть равно {{ limit }} символу или меньше.|Значение слишком длинное. Должно быть равно {{ limit }} символам или меньше.|Значение слишком длинное. Должно быть равно {{ limit }} символам или меньше.',
    'This value should be {{ limit }} or more.' => 'Значение должно быть {{ limit }} или больше.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Значение слишком короткое. Должно быть равно {{ limit }} символу или больше.|Значение слишком короткое. Должно быть равно {{ limit }} символам или больше.|Значение слишком короткое. Должно быть равно {{ limit }} символам или больше.',
    'This value should not be blank.' => 'Значение не должно быть пустым.',
    'This value should not be null.' => 'Значение не должно быть null.',
    'This value should be null.' => 'Значение должно быть null.',
    'This value is not valid.' => 'Значение недопустимо.',
    'This value is not a valid time.' => 'Значение времени недопустимо.',
    'This value is not a valid URL.' => 'Значение не является допустимым URL.',
    'The two values should be equal.' => 'Оба значения должны быть одинаковыми.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Файл слишком большой. Максимально допустимый размер {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Файл слишком большой.',
    'The file could not be uploaded.' => 'Файл не может быть загружен.',
    'This value should be a valid number.' => 'Значение должно быть числом.',
    'This value is not a valid country.' => 'Значение не является допустимой страной.',
    'This file is not a valid image.' => 'Файл не является допустимым форматом изображения.',
    'This is not a valid IP address.' => 'Значение не является допустимым IP адресом.',
    'This value is not a valid language.' => 'Значение не является допустимым языком.',
    'This value is not a valid locale.' => 'Значение не является допустимой локалью.',
    'This value is already used.' => 'Это значение уже используется.',
    'The size of the image could not be detected.' => 'Не удалось определить размер изображения.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Ширина изображения слишком велика ({{ width }}px). Максимально допустимая ширина {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Ширина изображения слишком мала ({{ width }}px). Минимально допустимая ширина {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Высота изображения слишком велика ({{ height }}px). Максимально допустимая высота {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Высота изображения слишком мала ({{ height }}px). Минимально допустимая высота {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Значение должно быть текущим паролем пользователя.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Значение должно быть равно {{ limit }} символу.|Значение должно быть равно {{ limit }} символам.|Значение должно быть равно {{ limit }} символам.',
    'The file was only partially uploaded.' => 'Файл был загружен только частично.',
    'No file was uploaded.' => 'Файл не был загружен.',
    'No temporary folder was configured in php.ini.' => 'Не настроена временная директория в php.ini.',
    'Cannot write temporary file to disk.' => 'Невозможно записать временный файл на диск.',
    'A PHP extension caused the upload to fail.' => 'Расширение PHP вызвало ошибку при загрузке.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Эта коллекция должна содержать {{ limit }} элемент или больше.|Эта коллекция должна содержать {{ limit }} элемента или больше.|Эта коллекция должна содержать {{ limit }} элементов или больше.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Эта коллекция должна содержать {{ limit }} элемент или меньше.|Эта коллекция должна содержать {{ limit }} элемента или меньше.|Эта коллекция должна содержать {{ limit }} элементов или меньше.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Эта коллекция должна содержать ровно {{ limit }} элемент.|Эта коллекция должна содержать ровно {{ limit }} элемента.|Эта коллекция должна содержать ровно {{ limit }} элементов.',
    'Invalid card number.' => 'Неверный номер карты.',
    'Unsupported card type or invalid card number.' => 'Неподдерживаемый тип или неверный номер карты.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Значение не является допустимым международным номером банковского счета (IBAN).',
    'This value is not a valid ISBN-10.' => 'Значение имеет неверный формат ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Значение имеет неверный формат ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Значение не соответствует форматам ISBN-10 и ISBN-13.',
    'This value is not a valid ISSN.' => 'Значение не соответствует формату ISSN.',
    'This value is not a valid currency.' => 'Некорректный формат валюты.',
    'This value should be equal to {{ compared_value }}.' => 'Значение должно быть равно {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Значение должно быть больше чем {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Значение должно быть больше или равно {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Значение должно быть идентичным {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Значение должно быть меньше чем {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Значение должно быть меньше или равно {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Значение не должно быть равно {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Значение не должно быть идентичным {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Соотношение сторон изображения слишком велико ({{ ratio }}). Максимальное соотношение сторон {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Соотношение сторон изображения слишком мало ({{ ratio }}). Минимальное соотношение сторон {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Изображение квадратное ({{ width }}x{{ height }}px). Квадратные изображения не разрешены.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Изображение в альбомной ориентации ({{ width }}x{{ height }}px). Изображения в альбомной ориентации не разрешены.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Изображение в портретной ориентации ({{ width }}x{{ height }}px). Изображения в портретной ориентации не разрешены.',
    'An empty file is not allowed.' => 'Пустые файлы не разрешены.',
    'The host could not be resolved.' => 'Имя хоста не может быть разрешено.',
    'This value does not match the expected {{ charset }} charset.' => 'Значение не совпадает с ожидаемой {{ charset }} кодировкой.',
    'This form should not contain extra fields.' => 'Эта форма не должна содержать дополнительных полей.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Загруженный файл слишком большой. Пожалуйста, попробуйте загрузить файл меньшего размера.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'CSRF значение недопустимо. Пожалуйста, попробуйте повторить отправку формы.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ошибка аутентификации.',
    'Authentication credentials could not be found.' => 'Аутентификационные данные не найдены.',
    'Authentication request could not be processed due to a system problem.' => 'Запрос аутентификации не может быть обработан в связи с проблемой в системе.',
    'Invalid credentials.' => 'Недействительные аутентификационные данные.',
    'Cookie has already been used by someone else.' => 'Cookie уже был использован кем-то другим.',
    'Not privileged to request the resource.' => 'Отсутствуют права на запрос этого ресурса.',
    'Invalid CSRF token.' => 'Недействительный токен CSRF.',
    'Digest nonce has expired.' => 'Время действия одноразового ключа дайджеста истекло.',
    'No authentication provider found to support the authentication token.' => 'Не найден провайдер аутентификации, поддерживающий токен аутентификации.',
    'No session available, it either timed out or cookies are not enabled.' => 'Сессия не найдена, ее время истекло, либо cookies не включены.',
    'No token could be found.' => 'Токен не найден.',
    'Username could not be found.' => 'Имя пользователя не найдено.',
    'Account has expired.' => 'Время действия учетной записи истекло.',
    'Credentials have expired.' => 'Время действия аутентификационных данных истекло.',
    'Account is disabled.' => 'Учетная запись отключена.',
    'Account is locked.' => 'Учетная запись заблокирована.',
  ),
  'messages' => 
  array (
    'resetting.email.subject' => 'Восстановление паролся. Seed',
    'resetting.email.message' => 'Добрый день.

Ваш пароль от сервиса Seed был сброшен.
Новый пароль %password%',
  ),
));
$catalogue->addFallbackCatalogue($catalogueRu);

return $catalogue;
