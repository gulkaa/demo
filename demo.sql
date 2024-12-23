-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2024 г., 11:40
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `demo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `description`, `img`) VALUES
(4, 'hgvh', 'b nbhbjh', 'jfcjfcjgfcj ', 'assets/img/17330594201007119597.jpg'),
(5, 'fzdfbzdf', 'fdb dfbzdfb', ' bfbndkfbnkdfjnb ', 'assets/img/17330595421007119597.jpg'),
(6, 'hbfvzjdbjvdfv', 'zvkjdfjbkvbzkdfv', ' vbhbdv zdhfvhbdkjbvkhbfdhbfjvh ', 'assets/img/17330595541007119597.jpg'),
(7, 'vbjhbfvjhbdfv', 'vdjbfvabfvdfv', ' fvhdbfvhbadhfv ', 'assets/img/17330595671007119597.jpg'),
(9, 'fghyjj', 'dfghj', ' dfghyjuikol', 'assets/img/1734898557profil.jpg'),
(10, 'fvgbhnjmk', 'ghjkl', ' dfghjkl', 'assets/img/1734898563profil.jpg'),
(11, 'ertyu', 'dfgthyju', ' sdfghjk', 'assets/img/1734899221profil.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Казань'),
(2, 'Набережные Челны'),
(3, 'Нижнекамск'),
(4, 'Елабуга'),
(5, 'Москва'),
(10, 'Египетn'),
(11, 'апролд'),
(12, 'апролд'),
(13, 'апролд'),
(14, 'dfghj'),
(16, 'dfghjk'),
(17, 'dfghjk'),
(18, 'fghjk'),
(19, 'fghjk'),
(20, 'fghjk');

-- --------------------------------------------------------

--
-- Структура таблицы `number`
--

CREATE TABLE `number` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `number`
--

INSERT INTO `number` (`id`, `id_user`, `number`, `status`) VALUES
(1, 1, '89586245792', 3),
(2, 1, '89586245792', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `number`) VALUES
(3, '2345678');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `name`, `price`, `description`, `img`, `category_id`) VALUES
(59, 'Египетn', '11111', ' ghjuikolp[ ', 'assets/img/1734936735profil.jpg', 1),
(60, 'dfrgthyjuikop', '222', ' dfghjuki', 'assets/img/1734936744profil.jpg', 2),
(64, 'вапролдж', '333', ' кенгшщ', 'assets/img/1734937300profil.jpg', 4),
(65, 'апролд', '444', ' ывапр', 'assets/img/1734937310profil.jpg', 5),
(67, 'frghyju', '555', ' dcfvgh', 'assets/img/1734937382profil.jpg', 10),
(68, 'апролд', '6767', ' вапернгш', 'assets/img/1734937453profil.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1, 'Лилия', 'Фазлиева', 'user3@mail.ru', '$2y$10$RSxD/.4T58UlBHXVNv9R/umM4qkoXL2la6JYirrhVp7vgqjMtmHAG', 2),
(2, 'Лилия', 'Фазлиева', 'user6@mail.ru', '$2y$10$9NMPsSUga18Nj2wPMyVIH./EKiriZTlTzVzWP8aEJrO7PeUOZUC2K', 2),
(4, 'gulka', 'gulka', 'gulka@gmail.com', '$2y$10$sW8yFyyshcFwCsJCFK7Izu1kfs.THGRUyah1qmYyPT6pRPLo7e3Iu', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `number`
--
ALTER TABLE `number`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `number`
--
ALTER TABLE `number`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `tovar_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
