<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('gl', array (
  'validators' => 
  array (
    'This value should be false.' => 'Este valor debería ser falso.',
    'This value should be true.' => 'Este valor debería ser verdadeiro.',
    'This value should be of type {{ type }}.' => 'Este valor debería ser de tipo {{ type }}.',
    'This value should be blank.' => 'Este valor debería estar baleiro.',
    'The value you selected is not a valid choice.' => 'O valor seleccionado non é unha opción válida.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Debe seleccionar polo menos {{ limit }} opción.|Debe seleccionar polo menos {{ limit }} opcions.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Debe seleccionar como máximo {{ limit }} opción.|Debe seleccionar como máximo {{ limit }} opcions.',
    'One or more of the given values is invalid.' => 'Un ou máis dos valores indicados non son válidos.',
    'This field was not expected.' => 'Este campo non era esperado.',
    'This field is missing.' => 'Este campo falta.',
    'This value is not a valid date.' => 'Este valor non é unha data válida.',
    'This value is not a valid datetime.' => 'Este valor non é unha data e hora válidas.',
    'This value is not a valid email address.' => 'Este valor non é unha dirección de correo electrónico válida.',
    'The file could not be found.' => 'Non se puido atopar o arquivo.',
    'The file is not readable.' => 'O arquivo non se pode ler.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'O arquivo é demasiado grande ({{ size }} {{ suffix }}). O tamaño máximo permitido é {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'O tipo mime do arquivo non é válido ({{ type }}). Os tipos mime válidos son {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Este valor debería ser {{ limit }} ou menos.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Este valor é demasiado longo. Debería ter {{ limit }} carácter ou menos.|Este valor é demasiado longo. Debería ter {{ limit }} caracteres ou menos.',
    'This value should be {{ limit }} or more.' => 'Este valor debería ser {{ limit }} ou máis.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Este valor é demasiado curto. Debería ter {{ limit }} carácter ou máis.|Este valor é demasiado corto. Debería ter {{ limit }} caracteres ou máis.',
    'This value should not be blank.' => 'Este valor non debería estar baleiro.',
    'This value should not be null.' => 'Este valor non debería ser null.',
    'This value should be null.' => 'Este valor debería ser null.',
    'This value is not valid.' => 'Este valor non é válido.',
    'This value is not a valid time.' => 'Este valor non é unha hora válida.',
    'This value is not a valid URL.' => 'Este valor non é unha URL válida.',
    'The two values should be equal.' => 'Os dous valores deberían ser iguais.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'O arquivo é demasiado grande. O tamaño máximo permitido é {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'O arquivo é demasiado grande.',
    'The file could not be uploaded.' => 'No se puido cargar o arquivo.',
    'This value should be a valid number.' => 'Este valor debería ser un número válido.',
    'This file is not a valid image.' => 'O arquivo non é unha imaxe válida.',
    'This is not a valid IP address.' => 'Isto non é unha dirección IP válida.',
    'This value is not a valid language.' => 'Este valor non é un idioma válido.',
    'This value is not a valid locale.' => 'Este valor non é unha localización válida.',
    'This value is not a valid country.' => 'Este valor non é un país válido.',
    'This value is already used.' => 'Este valor xa está a ser empregado.',
    'The size of the image could not be detected.' => 'Non se puido determinar o tamaño da imaxe.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'A largura da imaxe é demasiado grande ({{ width }}px). A largura máxima permitida son {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'A largura da imaxe é demasiado pequena ({{ width }}px). A largura mínima requerida son {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'A altura da imaxe é demasiado grande ({{ height }}px). A altura máxima permitida son {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'A altura da imaxe é demasiado pequena ({{ height }}px). A altura mínima requerida son {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Este valor debería ser a contrasinal actual do usuario.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Este valor debería ter exactamente {{ limit }} carácter.|Este valor debería ter exactamente {{ limit }} caracteres.',
    'The file was only partially uploaded.' => 'O arquivo foi só subido parcialmente.',
    'No file was uploaded.' => 'Non se subiu ningún arquivo.',
    'No temporary folder was configured in php.ini.' => 'Ningunha carpeta temporal foi configurada en php.ini.',
    'Cannot write temporary file to disk.' => 'Non se puido escribir o arquivo temporal no disco.',
    'A PHP extension caused the upload to fail.' => 'Unha extensión de PHP provocou que a subida fallara.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Esta colección debe conter {{ limit }} elemento ou máis.|Esta colección debe conter {{ limit }} elementos ou máis.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Esta colección debe conter {{ limit }} elemento ou menos.|Esta colección debe conter {{ limit }} elementos ou menos.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Esta colección debe conter exactamente {{ limit }} elemento.|Esta colección debe conter exactamente {{ limit }} elementos.',
    'Invalid card number.' => 'Número de tarxeta non válido.',
    'Unsupported card type or invalid card number.' => 'Tipo de tarxeta non soportado ou número de tarxeta non válido.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Este valor non é un International Bank Account Number (IBAN) válido.',
    'This value is not a valid ISBN-10.' => 'Este valor non é un ISBN-10 válido.',
    'This value is not a valid ISBN-13.' => 'Este valor non é un ISBN-13 válido.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Este valor non é nin un ISBN-10 válido nin un ISBN-13 válido.',
    'This value is not a valid ISSN.' => 'Este valor non é un ISSN válido.',
    'This value is not a valid currency.' => 'Este valor non é unha moeda válida.',
    'This value should be equal to {{ compared_value }}.' => 'Este valor debería ser igual a {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Este valor debería ser maior que {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Este valor debería ser maior ou igual que {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Este valor debería ser identico a {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Este valor debería ser menor que {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Este valor debería ser menor ou igual que {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Este valor non debería ser igual a {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Este valor non debería ser identico a {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'A proporción da imaxe é demasiado grande ({{ ratio }}). A proporción máxima permitida é {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'A proporción da é demasiado pequena ({{ ratio }}). A proporción mínima permitida é {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'A imaxe é cadrada ({{ width }}x{{ height }}px). As imáxenes cadradas non están permitidas.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'A imaxe está orientada horizontalmente ({{ width }}x{{ height }}px). As imáxenes orientadas horizontalmente non están permitidas.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'A imaxe está orientada verticalmente ({{ width }}x{{ height }}px). As imáxenes orientadas verticalmente non están permitidas.',
    'An empty file is not allowed.' => 'Non está permitido un arquivo baleiro.',
    'The host could not be resolved.' => 'Non se puido resolver o host.',
    'This value does not match the expected {{ charset }} charset.' => 'A codificación de caracteres para este valor debería ser {{ charset }}.',
    'This form should not contain extra fields.' => 'Este formulario non debería conter campos adicionais.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'O arquivo subido é demasiado grande. Por favor, suba un arquivo máis pequeno.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'O token CSRF non é válido. Por favor, probe a enviar novamente o formulario.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ocorreu un erro de autenticación.',
    'Authentication credentials could not be found.' => 'Non se atoparon as credenciais de autenticación.',
    'Authentication request could not be processed due to a system problem.' => 'A solicitude de autenticación no puido ser procesada debido a un problema do sistema.',
    'Invalid credentials.' => 'Credenciais non válidas.',
    'Cookie has already been used by someone else.' => 'A cookie xa foi empregado por outro usuario.',
    'Not privileged to request the resource.' => 'Non ten privilexios para solicitar o recurso.',
    'Invalid CSRF token.' => 'Token CSRF non válido.',
    'Digest nonce has expired.' => 'O vector de inicialización (digest nonce) expirou.',
    'No authentication provider found to support the authentication token.' => 'Non se atopou un provedor de autenticación que soporte o token de autenticación.',
    'No session available, it either timed out or cookies are not enabled.' => 'Non hai ningunha sesión dispoñible, expirou ou as cookies non están habilitadas.',
    'No token could be found.' => 'Non se atopou ningún token.',
    'Username could not be found.' => 'Non se atopou o nome de usuario.',
    'Account has expired.' => 'A conta expirou.',
    'Credentials have expired.' => 'As credenciais expiraron.',
    'Account is disabled.' => 'A conta está deshabilitada.',
    'Account is locked.' => 'A conta está bloqueada.',
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
