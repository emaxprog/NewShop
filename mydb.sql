-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 08 2016 г., 18:17
-- Версия сервера: 5.7.15-0ubuntu0.16.04.1
-- Версия PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_params` (`id` INT)  BEGIN
SELECT * FROM params WHERE product_id=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL,
  `weight` tinyint(3) UNSIGNED NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `weight`, `visibility`) VALUES
(1, 'Ноутбуки и планшеты', 0, 1, 1),
(2, 'Компьютеры и периферия', 0, 2, 1),
(3, 'Телефоны и смарт-часы', 0, 3, 1),
(4, 'Телевизоры и медиа', 0, 4, 1),
(5, 'Игры и приставки', 0, 5, 1),
(6, 'Аудиотехника', 0, 6, 1),
(7, 'Фото аппаратура', 0, 7, 1),
(8, 'Ноутбуки', 1, 1, 1),
(9, 'Планшеты', 1, 2, 1),
(10, 'Аксессуары для ноутбуков', 1, 3, 1),
(11, 'Аксессуары для планшетов', 1, 4, 1),
(12, 'Смартфоны', 3, 1, 1),
(13, 'Сотовые телефоны', 3, 2, 1),
(14, 'Радиотелефоны', 3, 3, 1),
(15, 'Смарт часы', 3, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `checkpoints`
--

CREATE TABLE `checkpoints` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `opening_hours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `checkpoints`
--

INSERT INTO `checkpoints` (`id`, `name`, `address`, `opening_hours`) VALUES
(1, 'Ростелеком', 'Баклановский пр., 25, Новочеркасск, Ростовская обл., 346428', 'Пн-Пт: 9:00-18:00');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone1` varchar(11) DEFAULT NULL,
  `phone2` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `logotype` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `phone1`, `phone2`, `address`, `logotype`, `favicon`) VALUES
(1, '89500000000', '89500000000', 'г.Новочеркасск', '/template/images/site/logotype.png', '/template/images/site/favicon.ico');

-- --------------------------------------------------------

--
-- Структура таблицы `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deliveries`
--

INSERT INTO `deliveries` (`id`, `name`, `price`) VALUES
(1, 'Экспресс', 200),
(2, 'Курьер', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(1, 'Asus'),
(2, 'Acer'),
(3, 'Hewlett Packard'),
(4, 'Lenovo'),
(5, 'Samsung'),
(6, 'Dell'),
(7, 'Apple');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_18_115559_create_categories_table', 1),
('2016_09_18_115736_create_manufacturers_table', 1),
('2016_09_18_115832_create_products_table', 1),
('2016_09_20_140446_create_product_attributes_table', 1),
('2016_09_20_195909_create_product_attribute_value_table', 1),
('2016_09_21_113820_create_order_status_table', 1),
('2016_09_21_133757_create_checkpoints_table', 1),
('2016_09_21_134042_create_deliveries_table', 1),
('2016_09_21_134214_create_payments_table', 1),
('2016_09_21_134513_create_orders_table', 1),
('2016_09_22_195832_create_order_product_table', 1),
('2016_10_03_084659_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `checkpoint_id` int(10) UNSIGNED NOT NULL,
  `delivery_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `checkpoint_id`, `delivery_id`, `payment_id`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 1, 1, '2016-10-08 08:59:47', '2016-10-08 09:23:36');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 38, 1, '2016-10-08 08:59:47', '2016-10-08 08:59:47'),
(2, 39, 2, '2016-10-08 08:59:47', '2016-10-08 08:59:47'),
(2, 41, 2, '2016-10-08 08:59:47', '2016-10-08 08:59:47'),
(2, 42, 1, '2016-10-08 08:59:47', '2016-10-08 08:59:47'),
(2, 46, 1, '2016-10-08 08:59:47', '2016-10-08 08:59:47');

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Заказ принят'),
(2, 'Заказ передан на исполнение'),
(3, 'Заказ доставляется'),
(4, 'Заказ подготовлен к выдаче'),
(5, 'Заказ выдан');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `params`
--
CREATE TABLE `params` (
`id` int(10) unsigned
,`name` varchar(30)
,`unit` varchar(10)
,`product_id` int(10) unsigned
,`value` varchar(50)
);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `name`) VALUES
(1, 'VISA CARD'),
(2, 'MASTER CARD');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `description` text,
  `price` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `availability` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `manufacturer_id`, `description`, `price`, `code`, `availability`, `is_new`, `is_recommended`, `visibility`, `images`) VALUES
(34, 'Ноутбук Asus X200MA (X200MA-KX315D)', 8, 1, '', 65654, 1839707, 1, 0, 0, 1, NULL),
(35, 'Ноутбук HP Stream 11-d050nr', 8, 3, '', 45000, 2343847, 0, 1, 1, 1, NULL),
(36, 'Ноутбук Asus X200MA White ', 8, 1, '', 27000, 2028027, 1, 0, 1, 1, NULL),
(37, 'Ноутбук Acer Aspire E3-112-C65X', 8, 2, 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linpus / 1.29 кг / серебристый', 32500, 2019487, 1, 0, 1, 1, NULL),
(38, 'Ноутбук Acer TravelMate TMB115', 8, 2, 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linpus / 1.32 кг / черный', 27500, 1953212, 1, 0, 0, 1, NULL),
(39, 'Ноутбук Lenovo Flex 10', 8, 4, 'Экран 10.1" (1366x768) HD LED, сенсорный, глянцевый / Intel Celeron N2830 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 / 1.2 кг / черный', 37000, 1602042, 0, 0, 0, 1, NULL),
(40, 'Ноутбук Asus X751MA', 8, 1, 'Экран 17.3" (1600х900) HD+ LED, глянцевый / Intel Pentium N3540 (2.16 - 2.66 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / DOS / 2.6 кг / белый', 43000, 2028367, 1, 0, 1, 1, NULL),
(41, 'Samsung Galaxy Tab S 10.5 16GB', 9, 5, 'Samsung Galaxy Tab S создан для того, чтобы сделать вашу жизнь лучше. Наслаждайтесь своим контентом с покрытием 94% цветов Adobe RGB и 100000:1 уровнем контрастности, который обеспечивается sAmoled экраном с функцией оптимизации под отображаемое изображение и окружение. Яркий 10.5” экран в ультратонком корпусе весом 467 г порадует вас высоким уровнем портативности. Работа станет проще вместе с Hancom Office и удаленным доступом к вашему ПК. E-Meeting и WebEx – отличные помощники для проведения встреч, когда вы находитесь вне офиса. Надежно храните ваши данные благодаря сканеру отпечатка пальцев.', 78000, 1129365, 1, 1, 1, 1, NULL),
(42, 'Samsung Galaxy Tab S 8.4 16GB', 9, 5, 'Экран 8.4" Super AMOLED (2560x1600) емкостный Multi-Touch / Samsung Exynos 5420 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 16 ГБ встроенной памяти + поддержка карт памяти microSD / Bluetooth 4.0 / Wi-Fi 802.11 a/b/g/n/ac / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 4.4.2 (KitKat) / 294 г / белый', 64000, 1128670, 1, 0, 0, 1, NULL),
(46, 'Ноутбук APPLE', 8, 7, 'fdsf', 34500, 435345, 1, 1, 1, 1, NULL),
(47, 'Новый', 8, 1, '', 5435, 454, 1, 1, 1, 1, '/template/images/content/products/product7.jpg;/template/images/content/products/product11.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `unit`) VALUES
(7, 'вес', 'кг');

-- --------------------------------------------------------

--
-- Структура таблицы `product_attribute_value`
--

CREATE TABLE `product_attribute_value` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `phone`, `address`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'emaxprog@gmail.com', '$2y$10$SAfzBgfUmY3qFNdoZpkO8uubFKx6r3jlQhWqisQbN3MSk/LygutY6', 'Александр', 'Эм', '89000000000', 'г.Новочеркасск,ул.Просвещения 1000', 0, 'bxdIDxBPhUI6BVuu2EyvZgrzhuYSypiOPSWhOeoQwb0zgifqunfiysjeRd4s', '2016-10-08 05:50:13', '2016-10-08 08:59:53'),
(2, 'admin@admin.ru', '$2y$10$8x3Kh0bWfnw1Uh0tSiIyq.3d3r1Bkop81ZHEvhuvE0D5R8p8vtx72', 'admin', 'admin', '89000000000', 'г.Новочеркасск gdfgdsgfdgdsfgdfsgsdfg', 1, 'Wkvafj8XHTmaS64eogombDjdmb0yt7MRlfUS9xXTkzvyGoSJpgv48kKCeJ3U', '2016-10-08 05:51:12', '2016-10-08 12:13:30');

-- --------------------------------------------------------

--
-- Структура для представления `params`
--
DROP TABLE IF EXISTS `params`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `params`  AS  select `pa`.`id` AS `id`,`pa`.`name` AS `name`,`pa`.`unit` AS `unit`,`pav`.`product_id` AS `product_id`,`pav`.`value` AS `value` from (`product_attributes` `pa` left join `product_attribute_value` `pav` on((`pa`.`id` = `pav`.`attribute_id`))) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Индексы таблицы `checkpoints`
--
ALTER TABLE `checkpoints`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_checkpoint_id_foreign` (`checkpoint_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Индексы таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_attribute_value`
--
ALTER TABLE `product_attribute_value`
  ADD PRIMARY KEY (`product_id`,`attribute_id`),
  ADD KEY `product_attribute_value_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `checkpoints`
--
ALTER TABLE `checkpoints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT для таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_checkpoint_id_foreign` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoints` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_attribute_value`
--
ALTER TABLE `product_attribute_value`
  ADD CONSTRAINT `product_attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attribute_value_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
