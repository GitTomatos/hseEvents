-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 20 2021 г., 09:05
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
(27, 'День карьеры', 'В течение всего дня для посетителей HSE Career Fair будут открыты возможности делового общения с представителями более 40 компаний-участниц. Золотые партнёры этого Дня карьеры: Сбербанк, P&G и Шведское посольство. Впервые на ярмарке будут компании из Японии.  Также на HSE Career Fair пройдут мастер-классы с бизнес — и карьерными кейсами, деловые игры и отборочные тестирования. Перед студентами выступят Procter&Gamble, Google, Changellenge и другие компании.  5 апреля, четверг, с 12:00 до 19:00 Москва, Шаболовка 26, 5 корпус Регистрация, подробности и контакты на сайте: https://www.hse.ru/careerfair/2018_spring');

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
  `is_required` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `points`
--

INSERT INTO `points` (`id`, `event_id`, `name`, `description`, `is_required`) VALUES
(5, 27, 'Стэнд Effective Technologies', 'На данном стенде рассказывается про компанию Effective Technologies', 1),
(6, 27, 'Стэнд Intel', 'На данном стенде рассказывается про компанию Intel', 1),
(7, 27, 'Стэнд Lad', 'На данном стенде рассказывается про компанию Lad', 1),
(13, 27, 'Необязательный этап', 'Описание', 0);

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
(20, '345', '345', '345', '345', '345', 1, '345', 'cmanager', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3);

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
(18, 5, 1),
(18, 6, 0);

--
-- Индексы сохранённых таблиц
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `points`
--
ALTER TABLE `points`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
