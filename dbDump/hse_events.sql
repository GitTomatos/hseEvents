-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 29 2021 г., 09:08
-- Версия сервера: 8.0.23-0ubuntu0.20.04.1
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hse_events`
--

-- --------------------------------------------------------

--
-- Структура таблицы `complex_points`
--

CREATE TABLE `complex_points` (
  `point_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `complex_points`
--

INSERT INTO `complex_points` (`point_id`, `name`, `description`) VALUES
(13, 'SubPoint 1', 'Descr 1'),
(13, 'SupPoint 2', 'Desc 2'),
(16, 'Project Management в IT', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 15:20 - 16:20\r\n\r\nСпикер: Татьяна Кузнецова, Program Manager, Intel\r\n\r\nДанная лекция позволит познакомиться с основами управления проектами. Слушатели узнают о том какие soft и hard skills требуются для того, чтобы успешно освоить профессию Program/ Project manager и какие возможности карьерного роста существуют у представителей этого направления.\r\n\r\n'),
(16, 'Тинькофф - эволюция общения', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 15:20 - 16:20\r\n\r\nСпикер: Алексей Рябчиков, Тинькофф\r\n\r\nКак должен выглядеть современный финансовый месенджер в 2021 году?\r\n\r\nПуть от общения с человеком до искусственного интеллекта в чате.\r\n\r\nРасскажем про наш путь, используемые технологии и возможности обучения и роста в компании.\r\n\r\n'),
(17, 'Мастер-класс «#homoSAPscience» от IBS', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 16:35 - 17:05\r\n\r\nСпикеры: Тришин Дмитрий, Акулина Дарья, Кукушкина Анна.\r\n\r\nСотрудники компании IBS расскажут о профессии SAP консультанта и о том, как достичь успеха в ней.\r\n\r\n'),
(17, 'Мастер-класс «Знакомство с EPAM и Data практикой»', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 16:35 - 17:05\r\n\r\nСпикер: Максим Ефремов, старший инженер EPAM\r\n\r\nМаксим поделится с участниками встречи, почему он выбрал именно это направление и компанию.\r\n\r\nРегистрируйся на мероприятие, и мы пришлем тебе ссылки на все трансляции программы!\r\n\r\n'),
(17, 'МЭТЧИНГ-СЕССИЯ', ''),
(17, 'РОСТЕЛЕКОМ', 'Дата: 27 и 28 апреля\r\n\r\nВремя: 16:35 - 17:05\r\n\r\nКак стать и остаться эффективным сотрудником?\r\nКакие soft skills теперь рулят?\r\nОт каких хардов точно нельзя отказываться?\r\nРазберемся вместе с экспертами «Ростелекома» и поймем, как не терять актуальность на рынке труда.'),
(18, 'Мастер-класс «Где брать данные, как их обрабатывать и что делать, если все сломалось. Карьерные возможности для Дата инженеров в Билайн»', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 17:15 - 17:45\r\n\r\nСпикер: Донат Фетисов, руководитель департамента по архитектуре и инфраструктуре данных.'),
(18, 'Мастер-класс «Графовая аналитика в ИТ и не только» от Lad', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 17:15 - 17:45\r\n\r\nСпикер: Ксения Плесовских, кандидат технических наук. Занималась Data Science и обучала нейронные сети распознаванию состава нефтегазовых смесей еще до того, как это стало мейнстримом. В IT с 2008 года, прошла путь от разработчика на с++ до R&D менеджера и лидера гильдии Data Science & Machine Learning в IT-компании Lad. Ксения расскажет про графы: для решения каких задач Machine Learning они применяются, как работает графовая база данных, что такое графовая нейронная сеть и как получить из графа знания.'),
(18, 'Мастер-класс «Разработка ПО для оборудования сетей мобильной связи 5G» от Радио Гигабит', 'Дата: 27 апреля 2021 г.\r\n\r\nВремя: 17:15 - 17:45\r\n\r\nНовый стандарт мобильной связи 5G является одной из самых обсуждаемых тем на протяжении последних нескольких лет. На мастер-классе специалисты компании Радио Гигабит постараются структурировать знания о 5G технологиях на простом для понимания уровне и расскажут о процессе разработки программного обеспечения для оборудования нового поколения мобильных сетей. В конце мероприятия между участниками будет проведен розыгрыш ценных призов в виде викторины.\r\n\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `description`) VALUES
(27, 'День карьеры', 'FIND YOUR PERFECT MATCH \r\n\r\nВесенний День Карьеры ВШЭ 2021 пройдет в онлайн-трансляции в режиме реального времени. Не пропустите!\r\n\r\nДни Карьеры ВШЭ - это серия интерактивных мероприятий, обеспечивающих студентам возможности общения с лучшими российскими и международными работодателями, развития необходимых soft skills, а также получения информации, важной для успешного профессионального развития.'),
(32, 'Второе мероприятие', 'Мероприятие для проверки работы второго мероприятия');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'Незарегистрированный пользователь', '+ Просмотр мероприятий'),
(2, 'Зарегистрированный пользователь', '+ Просмотр мероприятий\r\n+ Регистрация на мероприятие'),
(3, 'Контент-менеджер', '+ Редактирование информации о мероприятиях'),
(4, 'Организатор', '+ Пометка студента');

-- --------------------------------------------------------

--
-- Структура таблицы `points`
--

CREATE TABLE `points` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_complex` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `points`
--

INSERT INTO `points` (`id`, `event_id`, `name`, `description`, `is_complex`) VALUES
(5, 27, 'Стэнд Effective Technologies', 'На данном стенде рассказывается про компанию Effective Technologies', 0),
(6, 27, 'Стэнд Intel', 'На данном стенде рассказывается про компанию Intel', 0),
(7, 27, 'Стэнд Lad', 'На данном стенде рассказывается про компанию Lad', 0),
(13, 27, 'Необязательный этап', 'Описание', 1),
(14, 32, 'Тестовый этап 1', 'Описание 1', 0),
(15, 32, 'Тестовый этап 2', 'Описание 2', 0),
(16, 27, '15:20 - 16:20', '', 1),
(17, 27, '16:35 - 17:05', '', 1),
(18, 27, '17:15 - 17:45', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `first_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `patronymic` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `university` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `speciality` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `permission` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `last_name`, `first_name`, `patronymic`, `university`, `speciality`, `year`, `phone`, `email`, `password`, `permission`) VALUES
(2, 'фамилия', 'имя', 'Отчество', 'Вуз', 'Специальность', 1, '89876543210', 'log', '1a1dc91c907325c69271ddf0c944bc72', 2),
(18, '123', '123', '123', '123', '123', 1, '123', 'admin', '21232f297a57a5a743894a0e4a801fc3', 4),
(20, '345', '345', '345', '345', '345', 1, '345', 'cmanager', 'qwerty', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `student_complex_point`
--

CREATE TABLE `student_complex_point` (
  `student_id` int NOT NULL,
  `point_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `has_marked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `student_complex_point`
--

INSERT INTO `student_complex_point` (`student_id`, `point_id`, `name`, `has_marked`) VALUES
(2, 13, 'SubPoint 1', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `student_event`
--

CREATE TABLE `student_event` (
  `student_id` int NOT NULL,
  `event_id` int NOT NULL,
  `has_diplom` tinyint(1) NOT NULL DEFAULT '0',
  `has_feedback` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `student_event`
--

INSERT INTO `student_event` (`student_id`, `event_id`, `has_diplom`, `has_feedback`) VALUES
(2, 27, 0, 0),
(2, 32, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `student_point`
--

CREATE TABLE `student_point` (
  `student_id` int NOT NULL,
  `point_id` int NOT NULL,
  `has_marked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `student_point`
--

INSERT INTO `student_point` (`student_id`, `point_id`, `has_marked`) VALUES
(2, 5, 0),
(2, 6, 0),
(2, 7, 0),
(2, 13, 0),
(2, 14, 0),
(2, 15, 0),
(18, 5, 1),
(18, 6, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `complex_points`
--
ALTER TABLE `complex_points`
  ADD PRIMARY KEY (`point_id`,`name`) USING BTREE;

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_unique` (`name`) USING BTREE;

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`name`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `phone_unique` (`phone`) USING BTREE,
  ADD KEY `permission` (`permission`);

--
-- Индексы таблицы `student_complex_point`
--
ALTER TABLE `student_complex_point`
  ADD PRIMARY KEY (`student_id`,`point_id`,`name`),
  ADD KEY `point_id` (`point_id`,`name`);

--
-- Индексы таблицы `student_event`
--
ALTER TABLE `student_event`
  ADD PRIMARY KEY (`student_id`,`event_id`),
  ADD KEY `student_event_ibfk_2` (`event_id`);

--
-- Индексы таблицы `student_point`
--
ALTER TABLE `student_point`
  ADD PRIMARY KEY (`student_id`,`point_id`),
  ADD KEY `point_id` (`point_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `points`
--
ALTER TABLE `points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `complex_points`
--
ALTER TABLE `complex_points`
  ADD CONSTRAINT `complex_points_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`permission`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student_complex_point`
--
ALTER TABLE `student_complex_point`
  ADD CONSTRAINT `student_complex_point_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_complex_point_ibfk_2` FOREIGN KEY (`point_id`,`name`) REFERENCES `complex_points` (`point_id`, `name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student_event`
--
ALTER TABLE `student_event`
  ADD CONSTRAINT `student_event_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student_point`
--
ALTER TABLE `student_point`
  ADD CONSTRAINT `student_point_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_point_ibfk_2` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
