-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2022 г., 09:24
-- Версия сервера: 8.0.29
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text_articles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `pubdate` date NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text_articles`, `image`, `pubdate`, `author`) VALUES
(1, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog1.png', '2022-02-08', 'Admin'),
(2, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog2.png', '2022-02-08', 'Admin'),
(3, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog3.png', '2022-02-08', 'Admin'),
(4, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog4.png', '2022-02-08', 'Admin'),
(5, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog5.png', '2022-02-08', 'Admin'),
(6, 'Why should boys have all the fun? It`s the woman who are making india an alcohol-loving country', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aspernatur assumenda commodi cupiditate debitis dolorum eaque, eius ipsa, iusto maiores quae quam quos, rem repellendus saepe sed voluptas voluptate? Blanditiis consequuntur eum fugiat illum ipsam magni nemo nesciunt odit officiis, placeat quibusdam quisquam soluta tempore velit vero, voluptas voluptatum! Ab deleniti dolore doloribus incidunt porro qui quis, soluta sunt.', 'blog6.png', '2022-02-08', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `carousel`
--

CREATE TABLE `carousel` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `carousel`
--

INSERT INTO `carousel` (`id`, `title`, `image`) VALUES
(1, 'London Fashion week`s continued the evolution', 'post-1.jpg'),
(2, '2', 'post-2.jpg'),
(3, '3', 'post-3.jpg'),
(4, '4', 'post-4.jpg'),
(5, '5', 'post-5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `text` varchar(2555) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_article` int NOT NULL,
  `pubdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `email`, `id_article`, `pubdate`) VALUES
(1, 'cool', 'cool@gmail.com', 1, '2022-02-03');

-- --------------------------------------------------------

--
-- Структура таблицы `popular_posts`
--

CREATE TABLE `popular_posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pubdate` date NOT NULL,
  `comments` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `popular_posts`
--

INSERT INTO `popular_posts` (`id`, `title`, `image`, `pubdate`, `comments`) VALUES
(1, 'New data recording system to better analyse road accidents', 'm-blog-1.jpg', '2022-02-03', 3),
(2, 'New data recording system to better analyse road accidents', 'm-blog-2.jpg', '2022-02-03', 3),
(3, 'New data recording system to better analyse road accidents', 'm-blog-3.jpg', '2022-02-03', 3),
(4, 'New data recording system to better analyse road accidents', 'm-blog-4.jpg', '2022-02-03', 3),
(5, 'New data recording system to better analyse road accidents', 'm-blog-5.jpg', '2022-02-03', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `register`
--

CREATE TABLE `register` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `register`
--

INSERT INTO `register` (`id`, `login`, `email`, `pass`) VALUES
(1, 'vetal270499', 'vetal2704999@gmail.com', 'c93b9339d8c82f04b4ef31026dc9a7fe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `popular_posts`
--
ALTER TABLE `popular_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `popular_posts`
--
ALTER TABLE `popular_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `register`
--
ALTER TABLE `register`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
