-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 16 2024 г., 18:09
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `BLOG`
--

-- --------------------------------------------------------

--
-- Структура таблицы `like_post`
--

CREATE TABLE `like_post` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `creaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `like_post`
--

INSERT INTO `like_post` (`id`, `creator_id`, `post_id`, `creaded_at`) VALUES
(19, 1, 9, '2024-06-16 15:32:22'),
(21, 2, 66, '2024-06-16 15:37:12');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` text DEFAULT NULL,
  `post_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `creator_id`, `post_title`, `post_description`, `post_image`) VALUES
(9, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(10, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(11, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(12, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(13, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(14, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(15, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(16, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(17, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(18, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(19, '2024-06-16 07:00:40', NULL, 1, 'armen', 'aaa', '1718481879.png'),
(66, '2024-06-16 07:00:40', NULL, 2, 'ARMAN', 'Z2001', '1718535640.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `password`, `role`) VALUES
(1, 'Armen Khachatryan', 'armen_khachatryan_02@mail.ru', 'b59c67bf196a4758191e42f76670ceba', 1),
(2, 'Arman Khachatryan', 'arman_khachatryan_02@mail.ru', 'b59c67bf196a4758191e42f76670ceba', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_post_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `like_post_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
