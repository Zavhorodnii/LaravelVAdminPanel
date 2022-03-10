-- --------------------------------------------------------
-- Хост:                         
-- Версия сервера:               5.7.29-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица laravelvadminproject.audio_reviews
CREATE TABLE IF NOT EXISTS `audio_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audio_reviews_file_id_foreign` (`file_id`),
  CONSTRAINT `audio_reviews_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.audio_reviews: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `audio_reviews` DISABLE KEYS */;
INSERT INTO `audio_reviews` (`id`, `city`, `person_name`, `draft`, `file_id`, `review`, `created_at`, `updated_at`) VALUES
	(1, 'Сочи', 'Андрей', 0, 61, 'Отзыв', '2022-01-21 22:51:48', '2022-01-26 20:01:59'),
	(2, 'Сочи', 'Александр', 0, 63, 'Шведская стенка Axioma standart №4', '2022-01-26 21:42:57', '2022-01-26 21:42:57'),
	(3, 'Сочи', 'Александр', 0, 62, 'Шведская стенка Axioma standart №4', '2022-01-26 21:43:30', '2022-01-26 21:43:30'),
	(4, 'Сочи', 'Андрей', 0, 61, 'Шведская стенка Axioma standart №6', '2022-01-26 21:44:47', '2022-01-26 21:44:47'),
	(31, '', 'Vitalii', 1, 107, 'some review', '2022-02-01 19:20:58', '2022-02-01 19:20:58');
/*!40000 ALTER TABLE `audio_reviews` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.benefits
CREATE TABLE IF NOT EXISTS `benefits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `benefits_file_id_foreign` (`file_id`),
  CONSTRAINT `benefits_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.benefits: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `benefits` DISABLE KEYS */;
INSERT INTO `benefits` (`id`, `title`, `file_id`, `created_at`, `updated_at`) VALUES
	(10, 'Отправка турника \nв день заказа', 18, '2022-01-17 16:23:55', '2022-01-17 16:23:55'),
	(11, 'Выдача чека', 19, '2022-01-17 16:23:55', '2022-01-17 16:23:55'),
	(12, 'Оплата карточкой / наличными', 20, '2022-01-17 16:23:55', '2022-01-17 16:23:55'),
	(13, 'Работа с организациями', 21, '2022-01-17 16:23:55', '2022-01-17 16:23:55'),
	(14, 'Установка в Минске, Гомеле, Витебске, Могилеве', 22, '2022-01-17 16:23:55', '2022-01-17 16:23:55'),
	(15, 'Шоу-рум\nкаждый день', 24, '2022-01-17 16:23:55', '2022-01-17 16:23:55');
/*!40000 ALTER TABLE `benefits` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.bestsellers
CREATE TABLE IF NOT EXISTS `bestsellers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_text_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_text_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `slider_block` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.bestsellers: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `bestsellers` DISABLE KEYS */;
INSERT INTO `bestsellers` (`id`, `title`, `all_text_title`, `all_text_link`, `draft`, `slider_block`, `created_at`, `updated_at`) VALUES
	(3, 'Хиты продаж', 'Все хиты', '#', 0, 1, '2022-01-17 18:16:44', '2022-01-17 18:16:44'),
	(4, 'Хиты продаж', 'Все хиты', '#', 0, 0, '2022-01-20 18:42:13', '2022-01-20 18:42:19');
/*!40000 ALTER TABLE `bestsellers` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.bestseller_products
CREATE TABLE IF NOT EXISTS `bestseller_products` (
  `bestsellers_id` bigint(20) unsigned NOT NULL,
  `products_id` bigint(20) unsigned DEFAULT NULL,
  KEY `bestseller_products_bestsellers_id_foreign` (`bestsellers_id`),
  KEY `bestseller_products_products_id_foreign` (`products_id`),
  CONSTRAINT `bestseller_products_bestsellers_id_foreign` FOREIGN KEY (`bestsellers_id`) REFERENCES `bestsellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bestseller_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.bestseller_products: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `bestseller_products` DISABLE KEYS */;
INSERT INTO `bestseller_products` (`bestsellers_id`, `products_id`) VALUES
	(3, 11),
	(3, 12),
	(3, 13),
	(3, 14),
	(3, 15),
	(4, 15),
	(4, 14),
	(4, 13),
	(4, 12),
	(4, 11);
/*!40000 ALTER TABLE `bestseller_products` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.catalogs
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `show_top` tinyint(1) NOT NULL DEFAULT '0',
  `important_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `important_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.catalogs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` (`id`, `title`, `description`, `draft`, `show_top`, `important_title`, `important_link`, `created_at`, `updated_at`) VALUES
	(9, 'Каталог товаров для тяжелой атлетики', 'Более 70 разных моделей на нашем сайте. Выбор тренажера максимально прост', 0, 0, NULL, NULL, '2022-01-17 18:15:12', '2022-01-17 18:15:12'),
	(10, 'Типы гантелей', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоиях', 0, 1, 'Подробный материал, как выбирать гантели', '#', '2022-01-20 11:22:29', '2022-01-20 11:22:29');
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.catalog_items
CREATE TABLE IF NOT EXISTS `catalog_items` (
  `catalog_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `page_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `catalog_items_catalog_id_foreign` (`catalog_id`),
  KEY `catalog_items_file_id_foreign` (`file_id`),
  CONSTRAINT `catalog_items_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalog_items_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.catalog_items: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `catalog_items` DISABLE KEYS */;
INSERT INTO `catalog_items` (`catalog_id`, `title`, `file_id`, `page_link`, `top_title`, `top_link`, `created_at`, `updated_at`) VALUES
	(9, 'Турники', 27, '#', NULL, NULL, '2022-01-17 18:17:07', '2022-01-17 18:17:07'),
	(10, 'Разборные обрезиненные', 12, '#', 'Посмотреть топ 5 продаж', '#', '2022-01-20 11:22:29', '2022-01-20 11:22:29');
/*!40000 ALTER TABLE `catalog_items` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_addresses
CREATE TABLE IF NOT EXISTS `delivery_addresses` (
  `delivery_points_id` bigint(20) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_time` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `delivery_addresses_delivery_points_id_foreign` (`delivery_points_id`),
  CONSTRAINT `delivery_addresses_delivery_points_id_foreign` FOREIGN KEY (`delivery_points_id`) REFERENCES `delivery_points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_addresses: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_addresses` DISABLE KEYS */;
INSERT INTO `delivery_addresses` (`delivery_points_id`, `address`, `phone`, `work_time`, `created_at`, `updated_at`) VALUES
	(38, 'г. Минск, ул. Монтажников, 2', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Неманская, 85', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Мележа, 5-1', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Жилуновича, 41', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Притыцкого, 29', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Червякова, 3', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(38, 'г. Минск, ул. Казимировская, 6', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(39, 'г. Молодечно, ул. Громадовская, 8', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(39, 'г. Молодечно, ул. Будавников, 17А', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(40, 'г. Борисов, ул. Гагарина,107', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(41, 'г. Слуцк, ул. Богдановича, 42', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(42, 'г. Жодино, ул. Гагарина, 20А', '5353636 (MTC, Life, A1)', 'пн-вс: 09:00-21:00 |\r\nобед: 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(43, 'г. Дзержинск, ул. Минская, 27', '5353636 (MTC, Life, A1)', 'вт-сб: 10:00-19:00 |\r\nобед: 14:00-15:00 |\r\nвс-пн: выходной', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(44, 'г. Старые дороги, ул. Московская, 84', '5353636 (MTC, Life, A1)', 'вт-сб: 10:00-19:00 |\r\nобед: 14:00-15:00 |\r\nвс-пн: выходной', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(45, 'г. Молодечно, ул. Громадовская, 8', '5353636 (MTC, Life, A1)', 'пн-вс 09:00-21:00 |\r\nобед 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(45, 'г. Молодечно, ул. Будавников, 17А', '5353636 (MTC, Life, A1)', 'пн-вс 09:00-21:00 |\r\nобед 14:00-15:00', '2022-02-05 13:37:47', '2022-02-05 13:37:47');
/*!40000 ALTER TABLE `delivery_addresses` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_all_cities
CREATE TABLE IF NOT EXISTS `delivery_all_cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_prices_id` bigint(20) unsigned NOT NULL,
  `cities` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_all_cities_delivery_prices_id_foreign` (`delivery_prices_id`),
  CONSTRAINT `delivery_all_cities_delivery_prices_id_foreign` FOREIGN KEY (`delivery_prices_id`) REFERENCES `delivery_prices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_all_cities: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_all_cities` DISABLE KEYS */;
INSERT INTO `delivery_all_cities` (`id`, `delivery_prices_id`, `cities`, `created_at`, `updated_at`) VALUES
	(40, 2, 'Минск', '2022-02-02 14:46:50', '2022-02-02 14:46:50'),
	(41, 2, 'Барановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,', '2022-02-02 14:46:50', '2022-02-02 14:46:50'),
	(42, 1, 'Минск', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, 1, 'Барановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,\r\nБарановичи,', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(44, 1, 'Другие города', '2022-02-02 14:48:12', '2022-02-02 14:48:12');
/*!40000 ALTER TABLE `delivery_all_cities` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_blocks
CREATE TABLE IF NOT EXISTS `delivery_blocks` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_type_pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_type_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_place_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_day_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_blocks: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_blocks` DISABLE KEYS */;
INSERT INTO `delivery_blocks` (`title`, `subtitle`, `title_type_pay`, `title_type_delivery`, `title_place_delivery`, `title_day_delivery`, `created_at`, `updated_at`) VALUES
	('Доставка товаров для тяжелой атлетики', 'Доставим быстро в любой город Беларуси. Отправка в день заказа', 'Удобные способы оплаты', 'Способы доставки', 'Показать адреса пунктов выдачи заказов', 'Показать дни доставки товаров', '2022-02-02 15:16:41', '2022-02-02 15:16:41');
/*!40000 ALTER TABLE `delivery_blocks` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_points
CREATE TABLE IF NOT EXISTS `delivery_points` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_style` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_points: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_points` DISABLE KEYS */;
INSERT INTO `delivery_points` (`id`, `region`, `point_style`, `created_at`, `updated_at`) VALUES
	(38, 'Минск', 'top: 66.5%;\r\nleft: 48.5%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(39, 'Молодечно', 'top: 32.5%;\r\n    left: 76.5%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(40, 'Борисов', 'top: 60.5%;\r\n    left: 19.5%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(41, 'Слуцк', 'top: 76.5%;\r\n    left: 9%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(42, 'Жодино', 'top: 80.5%;\r\n    left: 27%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(43, 'Дзержинск', 'top: 81.5%;\r\n    left: 2%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(44, 'Старыедороги', 'top: 72.5%;\r\n    left: 79.5%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47'),
	(45, 'Молодечно', 'top: 35.5%;\r\n    left: 34%;', '2022-02-05 13:37:47', '2022-02-05 13:37:47');
/*!40000 ALTER TABLE `delivery_points` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_prices
CREATE TABLE IF NOT EXISTS `delivery_prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_repeater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `important_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_prices: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_prices` DISABLE KEYS */;
INSERT INTO `delivery_prices` (`id`, `title_repeater`, `draft`, `title`, `subtitle`, `important_info`, `created_at`, `updated_at`) VALUES
	(1, 'Курьером до двери: с помощь транспортной компании', 0, 'Курьером до двери', 'с помощь транспортной компании', NULL, '2021-09-08 13:32:05', '2022-02-02 14:48:12'),
	(2, 'На терминал (пункт выдачи) транспортной компании в Вашем городе', 0, 'На терминал (пункт выдачи) транспортной компании в Вашем городе', 'С ПОМОЩЬЮ ТРАНСПОРТНОЙ КОМПАНИЙ В ВАШЕМ ГОРОДЕ', 'Вы можете приехать в пункт самовывоза в Вашем городе и получить заказ', '2022-02-02 14:46:50', '2022-02-02 14:46:50');
/*!40000 ALTER TABLE `delivery_prices` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_price_items
CREATE TABLE IF NOT EXISTS `delivery_price_items` (
  `delivery_all_cities_id` bigint(20) unsigned NOT NULL,
  `weight_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `delivery_price_items_delivery_all_cities_id_foreign` (`delivery_all_cities_id`),
  CONSTRAINT `delivery_price_items_delivery_all_cities_id_foreign` FOREIGN KEY (`delivery_all_cities_id`) REFERENCES `delivery_all_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_price_items: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_price_items` DISABLE KEYS */;
INSERT INTO `delivery_price_items` (`delivery_all_cities_id`, `weight_from`, `weight_to`, `price`, `created_at`, `updated_at`) VALUES
	(41, '0,00', '1,00', '7,5', '2022-02-02 14:46:50', '2022-02-02 14:46:50'),
	(41, '1,00', '3,00', '8,0', '2022-02-02 14:46:50', '2022-02-02 14:46:50'),
	(42, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(42, '1,00', '3,00', '8,0', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, '1,00', '3,00', '8,0', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, '1,00', '3,00', '8,0', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(43, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(44, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(44, '1,00', '3,00', '8,0', '2022-02-02 14:48:12', '2022-02-02 14:48:12'),
	(44, '0,00', '1,00', '7,5', '2022-02-02 14:48:12', '2022-02-02 14:48:12');
/*!40000 ALTER TABLE `delivery_price_items` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_type_pays
CREATE TABLE IF NOT EXISTS `delivery_type_pays` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_type_pays: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_type_pays` DISABLE KEYS */;
INSERT INTO `delivery_type_pays` (`title`, `created_at`, `updated_at`) VALUES
	('Наличными при получении, наложенный платеж', '2022-02-02 15:16:41', '2022-02-02 15:16:41'),
	('Оплата карточкой при получении', '2022-02-02 15:16:41', '2022-02-02 15:16:41'),
	('Безналичный расчет', '2022-02-02 15:16:41', '2022-02-02 15:16:41'),
	('ЕРИП', '2022-02-02 15:16:41', '2022-02-02 15:16:41');
/*!40000 ALTER TABLE `delivery_type_pays` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_work_days
CREATE TABLE IF NOT EXISTS `delivery_work_days` (
  `id_select` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_region_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monday` tinyint(1) NOT NULL DEFAULT '0',
  `tuesday` tinyint(1) NOT NULL DEFAULT '0',
  `wednesday` tinyint(1) NOT NULL DEFAULT '0',
  `thursday` tinyint(1) NOT NULL DEFAULT '0',
  `friday` tinyint(1) NOT NULL DEFAULT '0',
  `saturday` tinyint(1) NOT NULL DEFAULT '0',
  `sunday` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_work_days: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_work_days` DISABLE KEYS */;
INSERT INTO `delivery_work_days` (`id_select`, `delivery_region_title`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `created_at`, `updated_at`) VALUES
	('1', 'Минский район', 1, 1, 1, 1, 1, 1, 0, '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	(NULL, 'Березинский', 0, 0, 1, 0, 1, 0, 0, '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	(NULL, 'Минск', 1, 1, 1, 1, 1, 0, 0, '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('5', 'Гродненская', 0, 1, 1, 0, 1, 1, 0, '2022-02-03 09:08:19', '2022-02-03 09:08:19');
/*!40000 ALTER TABLE `delivery_work_days` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.delivery_work_regions
CREATE TABLE IF NOT EXISTS `delivery_work_regions` (
  `id_for_select` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.delivery_work_regions: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `delivery_work_regions` DISABLE KEYS */;
INSERT INTO `delivery_work_regions` (`id_for_select`, `region`, `created_at`, `updated_at`) VALUES
	('1', 'Минская,', '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('2', 'Брестская,', '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('3', 'Витебская,', '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('4', 'Гомельская,', '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('5', 'Гродненская,', '2022-02-03 09:08:19', '2022-02-03 09:08:19'),
	('6', 'Могилевская', '2022-02-03 09:08:19', '2022-02-03 09:08:19');
/*!40000 ALTER TABLE `delivery_work_regions` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.failed_jobs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.files: ~55 rows (приблизительно)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `name`, `alt_name`, `file_path`, `created_at`, `updated_at`) VALUES
	(1, 'name', NULL, '/storage/uploads/2021/08/1629444030_wallpaperflare.com_wallpaper (18).jpg', '2021-08-20 07:20:30', '2021-09-02 19:28:10'),
	(3, '1640782276_wallpaperflare.com_wallpaper (4).jpg', NULL, '/storage/uploads/2021/12/1640782276_wallpaperflare.com_wallpaper (4).jpg', '2021-12-29 12:51:17', '2021-12-29 12:51:17'),
	(4, '1640782288_wallpaperflare.com_wallpaper (15).jpg', NULL, '/storage/uploads/2021/12/1640782288_wallpaperflare.com_wallpaper (15).jpg', '2021-12-29 12:51:28', '2021-12-29 12:51:28'),
	(5, '1640782295_wallpaperflare.com_wallpaper (30).jpg', NULL, '/storage/uploads/2021/12/1640782295_wallpaperflare.com_wallpaper (30).jpg', '2021-12-29 12:51:35', '2021-12-29 12:51:35'),
	(6, '1641766522_06.png', NULL, '/storage/uploads/2022/01/1641766522_06.png', '2022-01-09 22:15:22', '2022-01-09 22:15:22'),
	(7, '1641766546_02.png', NULL, '/storage/uploads/2022/01/1641766546_02.png', '2022-01-09 22:15:46', '2022-01-09 22:15:46'),
	(8, '1641766551_06.png', NULL, '/storage/uploads/2022/01/1641766551_06.png', '2022-01-09 22:15:51', '2022-01-09 22:15:51'),
	(9, '1641766562_02.jpg', NULL, '/storage/uploads/2022/01/1641766562_02.jpg', '2022-01-09 22:16:02', '2022-01-09 22:16:02'),
	(10, '1641766584_05.png', NULL, '/storage/uploads/2022/01/1641766584_05.png', '2022-01-09 22:16:24', '2022-01-09 22:16:24'),
	(11, '1641766606_03.png', NULL, '/storage/uploads/2022/01/1641766606_03.png', '2022-01-09 22:16:46', '2022-01-09 22:16:46'),
	(12, '1641766666_05.png', NULL, '/storage/uploads/2022/01/1641766666_05.png', '2022-01-09 22:17:46', '2022-01-09 22:17:46'),
	(13, '1641766706_small.png', NULL, '/storage/uploads/2022/01/1641766706_small.png', '2022-01-09 22:18:26', '2022-01-09 22:18:26'),
	(14, '1641766719_02.png', NULL, '/storage/uploads/2022/01/1641766719_02.png', '2022-01-09 22:18:39', '2022-01-09 22:18:39'),
	(15, '1641767064_01.webp', NULL, '/storage/uploads/2022/01/1641767064_01.webp', '2022-01-09 22:24:24', '2022-01-09 22:24:24'),
	(16, '1641767090_mail.svg', NULL, '/storage/uploads/2022/01/1641767090_mail.svg', '2022-01-09 22:24:50', '2022-01-09 22:24:50'),
	(17, '1641823285_logo.webp', NULL, '/storage/uploads/2022/01/1641823285_logo.webp', '2022-01-10 14:01:25', '2022-01-10 14:01:25'),
	(18, '1642436455_01.svg', NULL, '/storage/uploads/2022/01/1642436455_01.svg', '2022-01-17 16:20:55', '2022-01-17 16:20:55'),
	(19, '1642436503_02.svg', NULL, '/storage/uploads/2022/01/1642436503_02.svg', '2022-01-17 16:21:43', '2022-01-17 16:21:43'),
	(20, '1642436563_03.svg', NULL, '/storage/uploads/2022/01/1642436563_03.svg', '2022-01-17 16:22:43', '2022-01-17 16:22:43'),
	(21, '1642436574_04.svg', NULL, '/storage/uploads/2022/01/1642436574_04.svg', '2022-01-17 16:22:54', '2022-01-17 16:22:54'),
	(22, '1642436588_05.svg', NULL, '/storage/uploads/2022/01/1642436588_05.svg', '2022-01-17 16:23:08', '2022-01-17 16:23:08'),
	(23, '1642436604_07.svg', NULL, '/storage/uploads/2022/01/1642436604_07.svg', '2022-01-17 16:23:24', '2022-01-17 16:23:24'),
	(24, '1642436617_06.svg', NULL, '/storage/uploads/2022/01/1642436617_06.svg', '2022-01-17 16:23:37', '2022-01-17 16:23:37'),
	(25, '1642437576_garanty.svg', NULL, '/storage/uploads/2022/01/1642437576_garanty.svg', '2022-01-17 16:39:36', '2022-01-17 16:39:36'),
	(26, '1642437624_return.svg', NULL, '/storage/uploads/2022/01/1642437624_return.svg', '2022-01-17 16:40:24', '2022-01-17 16:40:24'),
	(27, '1642442751_turnik.png', NULL, '/storage/uploads/2022/01/1642442751_turnik.png', '2022-01-17 18:05:51', '2022-01-17 18:05:51'),
	(28, '1642442821_SP01021b-2-470x390.jpg', NULL, '/storage/uploads/2022/01/1642442821_SP01021b-2-470x390.jpg', '2022-01-17 18:07:01', '2022-01-17 18:07:01'),
	(29, '1642442847_SP01021b-3-470x390.jpg', NULL, '/storage/uploads/2022/01/1642442847_SP01021b-3-470x390.jpg', '2022-01-17 18:07:27', '2022-01-17 18:07:27'),
	(30, '1642444041_07.svg', NULL, '/storage/uploads/2022/01/1642444041_07.svg', '2022-01-17 18:27:21', '2022-01-17 18:27:21'),
	(31, '1642444111_09.svg', NULL, '/storage/uploads/2022/01/1642444111_09.svg', '2022-01-17 18:28:31', '2022-01-17 18:28:31'),
	(32, '1642444150_10.svg', NULL, '/storage/uploads/2022/01/1642444150_10.svg', '2022-01-17 18:29:10', '2022-01-17 18:29:10'),
	(33, '1642600113_01.webp', NULL, '/storage/uploads/2022/01/1642600113_01.webp', '2022-01-19 13:48:33', '2022-01-19 13:48:33'),
	(34, '1642600149_02.webp', NULL, '/storage/uploads/2022/01/1642600149_02.webp', '2022-01-19 13:49:09', '2022-01-19 13:49:09'),
	(35, '1642600166_03.webp', NULL, '/storage/uploads/2022/01/1642600166_03.webp', '2022-01-19 13:49:26', '2022-01-19 13:49:26'),
	(36, '1642600189_04.webp', NULL, '/storage/uploads/2022/01/1642600189_04.webp', '2022-01-19 13:49:49', '2022-01-19 13:49:49'),
	(37, '1642600215_05.webp', NULL, '/storage/uploads/2022/01/1642600215_05.webp', '2022-01-19 13:50:15', '2022-01-19 13:50:15'),
	(38, '1642600229_06.webp', NULL, '/storage/uploads/2022/01/1642600229_06.webp', '2022-01-19 13:50:29', '2022-01-19 13:50:29'),
	(39, '1642693128_gkit5-1-470x390.webp', NULL, '/storage/uploads/2022/01/1642693128_gkit5-1-470x390.webp', '2022-01-20 15:38:48', '2022-01-20 15:38:48'),
	(40, '1642693152_gkit5-3-470x390.webp', NULL, '/storage/uploads/2022/01/1642693152_gkit5-3-470x390.webp', '2022-01-20 15:39:12', '2022-01-20 15:39:12'),
	(41, '1642694149_SG01004w-1-470x390.webp', NULL, '/storage/uploads/2022/01/1642694149_SG01004w-1-470x390.webp', '2022-01-20 15:55:49', '2022-01-20 15:55:49'),
	(42, '1642694191_SG01004w-2-470x390.webp', NULL, '/storage/uploads/2022/01/1642694191_SG01004w-2-470x390.webp', '2022-01-20 15:56:32', '2022-01-20 15:56:32'),
	(43, '1642694570_SG06001-1-470x390.webp', NULL, '/storage/uploads/2022/01/1642694570_SG06001-1-470x390.webp', '2022-01-20 16:02:51', '2022-01-20 16:02:51'),
	(44, '1642694594_SG06001-2-470x390.webp', NULL, '/storage/uploads/2022/01/1642694594_SG06001-2-470x390.webp', '2022-01-20 16:03:14', '2022-01-20 16:03:14'),
	(45, '1642695271_SV04012-3-470x390.jpg', NULL, '/storage/uploads/2022/01/1642695271_SV04012-3-470x390.jpg', '2022-01-20 16:14:32', '2022-01-20 16:14:32'),
	(46, '1642695284_SV04012-1-470x390.jpg', NULL, '/storage/uploads/2022/01/1642695284_SV04012-1-470x390.jpg', '2022-01-20 16:14:44', '2022-01-20 16:14:44'),
	(47, '1642695295_SV04012-2-470x390.jpg', NULL, '/storage/uploads/2022/01/1642695295_SV04012-2-470x390.jpg', '2022-01-20 16:14:55', '2022-01-20 16:14:55'),
	(51, '1642782035_gkit5-3-470x390.webp', NULL, '/storage/uploads/2022/01/1642782035_gkit5-3-470x390.webp', '2022-01-21 16:20:35', '2022-01-21 16:20:35'),
	(61, '1642799862_audio1.mp3', NULL, '/storage/uploads/2022/01/1642799862_audio1.mp3', '2022-01-21 21:17:42', '2022-01-26 21:42:14'),
	(62, 'audio1.mp3', 'alt 2', '/storage/uploads/2022/01/1642799866_audio1.mp3', '2022-01-21 21:17:46', '2022-01-26 21:48:35'),
	(63, '1642799879_audio1.mp3', NULL, '/storage/uploads/2022/01/1642799879_audio1.mp3', '2022-01-21 21:17:59', '2022-01-21 21:17:59'),
	(107, '1643743258_audio1.mp3', NULL, '/storage/uploads/2022/02/1643743258_audio1.mp3', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(108, '1643743258_scr.webp', NULL, '/storage/uploads/2022/02/1643743258_scr.webp', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(109, '1643744017_SG01004w-1-470x390.webp', NULL, '/storage/uploads/2022/02/1643744017_SG01004w-1-470x390.webp', '2022-02-01 19:33:37', '2022-02-01 19:33:37'),
	(110, '1643746008_scr.png', NULL, '/storage/uploads/2022/02/1643746008_scr.png', '2022-02-01 20:06:49', '2022-02-01 20:06:49'),
	(112, '1643746110_SP01021b-3-470x390.jpg', NULL, '/storage/uploads/2022/02/1643746110_SP01021b-3-470x390.jpg', '2022-02-01 20:08:30', '2022-02-01 20:08:30'),
	(113, '1644000631_01.webp', NULL, '/storage/uploads/2022/02/1644000631_01.webp', '2022-02-04 18:50:31', '2022-02-04 18:50:31'),
	(114, '1644000659_02.webp', NULL, '/storage/uploads/2022/02/1644000659_02.webp', '2022-02-04 18:50:59', '2022-02-04 18:50:59'),
	(115, '1644000670_03.webp', NULL, '/storage/uploads/2022/02/1644000670_03.webp', '2022-02-04 18:51:10', '2022-02-04 18:51:10'),
	(116, '1644000684_04.webp', NULL, '/storage/uploads/2022/02/1644000684_04.webp', '2022-02-04 18:51:24', '2022-02-04 18:51:24');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gallery_images
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `gallery_images_file_id_foreign` (`file_id`),
  CONSTRAINT `gallery_images_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gallery_images: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` (`file_id`, `created_at`, `updated_at`) VALUES
	(113, '2022-02-04 22:43:50', '2022-02-04 22:43:50'),
	(114, '2022-02-04 22:43:50', '2022-02-04 22:43:50'),
	(115, '2022-02-04 22:43:50', '2022-02-04 22:43:50'),
	(116, '2022-02-04 22:43:50', '2022-02-04 22:43:50');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gallery_titles
CREATE TABLE IF NOT EXISTS `gallery_titles` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gallery_titles: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `gallery_titles` DISABLE KEYS */;
INSERT INTO `gallery_titles` (`title`, `description`, `created_at`, `updated_at`) VALUES
	('Выставочный зал товаров тяжелой атлетики', 'Гантели, штанги, гири, стойки, пояса, кроссфит оборудование и другие спорттовары.', '2022-02-04 22:43:50', '2022-02-04 22:43:50');
/*!40000 ALTER TABLE `gallery_titles` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gifts
CREATE TABLE IF NOT EXISTS `gifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gifts: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `gifts` DISABLE KEYS */;
INSERT INTO `gifts` (`id`, `title`, `date_finish`, `created_at`, `updated_at`) VALUES
	(24, 'К каждому заказу 1 подарок', '2022-01-26 00:00:00', '2022-02-16 21:05:10', '2022-02-16 21:05:10');
/*!40000 ALTER TABLE `gifts` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gift_prices
CREATE TABLE IF NOT EXISTS `gift_prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gifts_id` bigint(20) unsigned DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gift_prices_gifts_id_foreign` (`gifts_id`),
  CONSTRAINT `gift_prices_gifts_id_foreign` FOREIGN KEY (`gifts_id`) REFERENCES `gifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gift_prices: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `gift_prices` DISABLE KEYS */;
INSERT INTO `gift_prices` (`id`, `gifts_id`, `price`) VALUES
	(38, 24, 400),
	(39, 24, 1000);
/*!40000 ALTER TABLE `gift_prices` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gift_products
CREATE TABLE IF NOT EXISTS `gift_products` (
  `gift_prices_id` bigint(20) unsigned DEFAULT NULL,
  `products_id` bigint(20) unsigned DEFAULT NULL,
  KEY `gift_products_gift_prices_id_foreign` (`gift_prices_id`),
  KEY `gift_products_products_id_foreign` (`products_id`),
  CONSTRAINT `gift_products_gift_prices_id_foreign` FOREIGN KEY (`gift_prices_id`) REFERENCES `gift_prices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gift_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gift_products: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `gift_products` DISABLE KEYS */;
INSERT INTO `gift_products` (`gift_prices_id`, `products_id`) VALUES
	(38, 15),
	(38, 11),
	(39, 13),
	(39, 12),
	(39, 11);
/*!40000 ALTER TABLE `gift_products` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gift_sets
CREATE TABLE IF NOT EXISTS `gift_sets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gift_sets: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `gift_sets` DISABLE KEYS */;
INSERT INTO `gift_sets` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
	(37, 'Комплекты на акции', NULL, '2022-01-20 22:36:24', '2022-01-20 22:36:24');
/*!40000 ALTER TABLE `gift_sets` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gift_set_blocks
CREATE TABLE IF NOT EXISTS `gift_set_blocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gift_sets_id` bigint(20) unsigned DEFAULT NULL,
  `list_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gift_set_blocks_gift_sets_id_foreign` (`gift_sets_id`),
  KEY `gift_set_blocks_products_id_foreign` (`products_id`),
  CONSTRAINT `gift_set_blocks_gift_sets_id_foreign` FOREIGN KEY (`gift_sets_id`) REFERENCES `gift_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gift_set_blocks_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gift_set_blocks: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `gift_set_blocks` DISABLE KEYS */;
INSERT INTO `gift_set_blocks` (`id`, `gift_sets_id`, `list_title`, `products_id`, `created_at`, `updated_at`) VALUES
	(109, 37, 'Комплект №1 для ребенка', 11, '2022-01-20 22:36:24', '2022-01-20 22:36:24'),
	(110, 37, 'Комплект №2 для ребенка', 13, '2022-01-20 22:36:24', '2022-01-20 22:36:24'),
	(111, 37, 'Комплект №3', 12, '2022-01-20 22:36:24', '2022-01-20 22:36:24'),
	(112, 37, 'Комплект №4', 15, '2022-01-20 22:36:25', '2022-01-20 22:36:25');
/*!40000 ALTER TABLE `gift_set_blocks` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.gift_set_block_items
CREATE TABLE IF NOT EXISTS `gift_set_block_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gift_set_blocks_id` bigint(20) unsigned DEFAULT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gift_set_block_items_gift_set_blocks_id_foreign` (`gift_set_blocks_id`),
  CONSTRAINT `gift_set_block_items_gift_set_blocks_id_foreign` FOREIGN KEY (`gift_set_blocks_id`) REFERENCES `gift_set_blocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.gift_set_block_items: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `gift_set_block_items` DISABLE KEYS */;
INSERT INTO `gift_set_block_items` (`id`, `gift_set_blocks_id`, `item`, `value`, `created_at`, `updated_at`) VALUES
	(58, 111, 'Стойка под штангу с подстраховкой', '340 руб', '2022-01-20 22:36:24', '2022-01-20 22:36:24'),
	(59, 111, 'Скамья для жима лежа', '275 руб', '2022-01-20 22:36:24', '2022-01-20 22:36:24'),
	(60, 111, 'Штанга наборная Iron King весом 74,5 кг', '710 руб', '2022-01-20 22:36:25', '2022-01-20 22:36:25');
/*!40000 ALTER TABLE `gift_set_block_items` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.guarantees
CREATE TABLE IF NOT EXISTS `guarantees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guarantees_file_id_foreign` (`file_id`),
  CONSTRAINT `guarantees_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.guarantees: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `guarantees` DISABLE KEYS */;
INSERT INTO `guarantees` (`id`, `title`, `file_id`, `description`, `created_at`, `updated_at`) VALUES
	(42, 'Гарантия', 25, 'Мы уверены в качестве своей продукции и на каждый товар предоставляется гарантия сроком на 2 года', '2022-01-20 13:42:42', '2022-01-20 13:42:42'),
	(43, 'Возврат или обмен', 26, 'Если не подошел цвет или появилась другая причина для возврата, то в течение 14 дней товар можно вернуть или обменять на другу модель', '2022-01-20 13:42:42', '2022-01-20 13:42:42');
/*!40000 ALTER TABLE `guarantees` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.how_we_work_items
CREATE TABLE IF NOT EXISTS `how_we_work_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `how_we_work_items_file_id_foreign` (`file_id`),
  CONSTRAINT `how_we_work_items_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.how_we_work_items: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `how_we_work_items` DISABLE KEYS */;
INSERT INTO `how_we_work_items` (`id`, `title`, `file_id`, `description`, `created_at`, `updated_at`) VALUES
	(11, 'Ваш заказ', 30, 'Выбираете товар и\nделаете заказ', '2022-01-17 18:29:28', '2022-01-17 18:29:28'),
	(12, 'Доставка', 18, 'После подтверждения менеджером Ваш заказ отправляется в доставку', '2022-01-17 18:29:28', '2022-01-17 18:29:28'),
	(13, 'Оплата', 31, 'Вы получаете товар, после этого производите оплату', '2022-01-17 18:29:28', '2022-01-17 18:29:28'),
	(14, 'Поздравляем!', 32, 'Теперь Вы можете заниматься спортом, не выходя из дома', '2022-01-17 18:29:28', '2022-01-17 18:29:28');
/*!40000 ALTER TABLE `how_we_work_items` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.how_we_work_titles
CREATE TABLE IF NOT EXISTS `how_we_work_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.how_we_work_titles: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `how_we_work_titles` DISABLE KEYS */;
INSERT INTO `how_we_work_titles` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(12, 'Как мы работаем', '2022-01-17 18:29:28', '2022-01-17 18:29:28');
/*!40000 ALTER TABLE `how_we_work_titles` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.hurry_up_to_buys
CREATE TABLE IF NOT EXISTS `hurry_up_to_buys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_count` smallint(6) DEFAULT NULL,
  `button_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.hurry_up_to_buys: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `hurry_up_to_buys` DISABLE KEYS */;
INSERT INTO `hurry_up_to_buys` (`id`, `title`, `gift_count`, `button_title`, `created_at`, `updated_at`) VALUES
	(2, 'Успей купить <br> пока есть в наличии!', 14, 'Зафиксировать подарок на 3 дня', '2022-01-20 08:51:23', '2022-01-20 08:51:23');
/*!40000 ALTER TABLE `hurry_up_to_buys` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.migrations: ~46 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2021_07_05_203200_create_file_models_table', 2),
	(98, '2014_10_12_000000_create_users_table', 3),
	(99, '2014_10_12_100000_create_password_resets_table', 3),
	(100, '2019_08_19_000000_create_failed_jobs_table', 3),
	(101, '2021_07_05_204516_create_files_table', 3),
	(103, '2021_08_19_125435_create_guarantees_table', 4),
	(104, '2021_09_02_073901_create_catalogs_table', 5),
	(105, '2021_09_02_074806_create_catalog_items_table', 6),
	(107, '2021_09_04_130738_create_text_blocks_table', 7),
	(108, '2021_09_04_200157_create_benefits_table', 8),
	(109, '2021_09_05_113720_create_reviews_titles_table', 9),
	(110, '2021_09_05_155148_create_text_reviews_table', 10),
	(111, '2021_09_05_195123_create_video_reviews_table', 11),
	(112, '2021_09_06_070903_create_audio_reviews_table', 12),
	(113, '2021_09_07_112641_create_how_we_work_titles_table', 13),
	(114, '2021_09_07_112940_create_how_we_work_items_table', 14),
	(115, '2021_09_07_151407_create_delivery_blocks_table', 15),
	(116, '2021_09_07_152950_create_delivery_type_pays_table', 16),
	(120, '2021_09_07_192418_create_delivery_prices_table', 17),
	(121, '2021_09_07_193045_create_delivery_all_cities_table', 17),
	(123, '2021_09_07_193533_create_delivery_price_items_table', 18),
	(129, '2021_09_09_090157_create_delivery_work_regions_table', 19),
	(130, '2021_09_09_090230_create_delivery_work_days_table', 19),
	(131, '2021_09_09_131128_create_delivery_points_table', 19),
	(133, '2021_09_09_130739_create_delivery_addresses_table', 20),
	(134, '2021_09_09_192743_create_gallery_titles_table', 21),
	(153, '2021_09_09_192806_create_gallery_images_table', 22),
	(162, '2021_12_15_210051_create_products_table', 23),
	(163, '2021_12_22_080917_create_product_features_table', 23),
	(164, '2021_12_22_083513_create_product_addition_infos_table', 23),
	(165, '2021_12_23_143615_create_product_addition_info_items_table', 23),
	(166, '2021_12_23_144606_create_product_videos_table', 23),
	(167, '2021_12_23_145127_create_product_related_products_table', 23),
	(168, '2021_12_23_145736_create_product_sets_table', 23),
	(169, '2021_12_23_145955_create_product_galleries_table', 23),
	(172, '2021_12_30_175417_create_bestsellers_table', 24),
	(173, '2021_12_30_180905_create_bestseller_products_table', 24),
	(177, '2021_12_31_114528_create_gifts_table', 25),
	(178, '2021_12_31_121148_create_gift_prices_table', 25),
	(179, '2021_12_31_121515_create_gift_products_table', 25),
	(184, '2022_01_04_163603_create_сategories_table', 26),
	(188, '2022_01_08_153920_create_product_categories_table', 27),
	(189, '2022_01_08_210913_create_site_menus_table', 28),
	(190, '2022_01_09_110611_create_social_links_table', 29),
	(192, '2022_01_10_081538_create_payments_table', 30),
	(194, '2022_01_10_105433_create_settings_sites_table', 31),
	(197, '2022_01_12_151755_create_pages_table', 32),
	(198, '2022_01_12_152018_create_page_blocks_table', 32),
	(199, '2022_01_14_175414_create_gift_sets_table', 33),
	(200, '2022_01_14_180526_create_gift_set_blocks_table', 33),
	(201, '2022_01_14_180844_create_gift_set_block_items_table', 33),
	(202, '2022_01_20_075131_create_hurry_up_to_buys_table', 34),
	(203, '2022_01_29_103535_create_notifications_table', 35);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.notifications: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `title`, `link`, `type`, `status`, `created_at`, `updated_at`) VALUES
	(32, 'New audio review', 'http://127.0.0.1:8000/admin/update/audio-review/31', NULL, 'review', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(33, 'New text review', 'http://127.0.0.1:8000/admin/update/text-review/16', NULL, 'review', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(34, 'New video review', 'http://127.0.0.1:8000/admin/update/video-review/8', NULL, 'review', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(35, 'New text review', 'http://127.0.0.1:8000/admin/update/text-review/17', NULL, 'review', '2022-02-01 19:33:37', '2022-02-01 19:33:37'),
	(36, 'New video review', 'http://127.0.0.1:8000/admin/update/video-review/9', NULL, 'review', '2022-02-01 19:33:37', '2022-02-01 19:33:37'),
	(37, 'New text review', 'http://127.0.0.1:8000/admin/update/text-review/18', NULL, 'review', '2022-02-01 20:06:49', '2022-02-01 20:06:49'),
	(38, 'New text review', 'http://127.0.0.1:8000/admin/update/text-review/19', NULL, 'review', '2022-02-01 20:06:59', '2022-02-01 20:06:59'),
	(39, 'New text review', 'http://127.0.0.1:8000/admin/update/text-review/20', NULL, 'review', '2022-02-01 20:08:30', '2022-02-01 20:08:30'),
	(40, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:15:16', '2022-02-23 15:15:16'),
	(41, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:34:20', '2022-02-23 15:34:20'),
	(42, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:36:10', '2022-02-23 15:36:10'),
	(43, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:41:03', '2022-02-23 15:41:03'),
	(44, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:44:27', '2022-02-23 15:44:27'),
	(45, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:46:32', '2022-02-23 15:46:32'),
	(46, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-02-23 15:47:37', '2022-02-23 15:47:37'),
	(47, 'Новый заказ. Проверьте почту', NULL, NULL, 'order', '2022-03-09 15:59:14', '2022-03-09 15:59:14');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.pages: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
	(12, 'Главная', NULL, '2022-01-19 17:06:26', '2022-01-19 17:06:26'),
	(13, 'Страница товара', 'product/', '2022-02-05 13:00:00', '2022-02-05 13:30:13'),
	(14, 'Корзина', 'cart/', '2022-02-20 08:35:50', '2022-02-20 08:38:55');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.page_blocks
CREATE TABLE IF NOT EXISTS `page_blocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pages_id` bigint(20) unsigned DEFAULT NULL,
  `type_block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_blocks_pages_id_foreign` (`pages_id`),
  CONSTRAINT `page_blocks_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.page_blocks: ~19 rows (приблизительно)
/*!40000 ALTER TABLE `page_blocks` DISABLE KEYS */;
INSERT INTO `page_blocks` (`id`, `pages_id`, `type_block`, `block_id`) VALUES
	(190, 13, 'Consultation', NULL),
	(191, 13, 'HowWeWork', NULL),
	(192, 13, 'Delivery', NULL),
	(193, 13, 'Gallery', NULL),
	(194, 12, 'Banner', NULL),
	(195, 12, 'Benefits', NULL),
	(196, 12, 'TextBlockFields', 6),
	(197, 12, 'Gift', NULL),
	(198, 12, 'HurryUpToBuy', NULL),
	(199, 12, 'Catalog', 9),
	(200, 12, 'Catalog', 10),
	(201, 12, 'Guarantees', NULL),
	(202, 12, 'Bestseller', 3),
	(203, 12, 'Bestseller', 4),
	(204, 12, 'GiftSet', NULL),
	(205, 12, 'Review', NULL),
	(206, 12, 'HowWeWork', NULL),
	(207, 12, 'Delivery', NULL),
	(208, 12, 'Gallery', NULL),
	(211, 14, 'Delivery', NULL);
/*!40000 ALTER TABLE `page_blocks` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_file_id_foreign` (`file_id`),
  CONSTRAINT `payments_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.payments: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `file_id`) VALUES
	(5, 33),
	(6, 34),
	(7, 35),
	(8, 36),
	(9, 37),
	(10, 38);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` int(11) DEFAULT NULL,
  `regular_price` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `features_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_products_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `related_products_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_file_id_foreign` (`file_id`),
  CONSTRAINT `products_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.products: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `price`, `regular_price`, `weight`, `length`, `width`, `height`, `dimensions`, `file_id`, `draft`, `features_title`, `description_title`, `description`, `related_products_title`, `related_products_description`, `created_at`, `updated_at`) VALUES
	(11, 'Турник на стену МК Уралспорт WorkOut домашний (гриф гладкий)', 'turnik-na-stenu-mk-uralsport-workout-domashnij-grif-gladkij', 'Артикул 1', 110, NULL, NULL, NULL, NULL, NULL, '', 27, 0, 'Особенности', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоия', '', '', '2022-01-17 18:07:43', '2022-01-17 18:07:43'),
	(12, 'Комплект Старт+штанга 74,5кг', 'komplekt-start-shtanga-74-5kg', 'komplekt', 1200, 1000, NULL, NULL, NULL, NULL, '', 39, 0, 'Особенности', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоия', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоиях', '2022-01-20 15:39:18', '2022-02-05 15:32:55'),
	(13, 'Стойка под штангу с подстраховкой Axioma разборная, белая', 'stojka-pod-shtangu-s-podstrahovkoj-axioma-razbornaya-belaya', 'Стойка под штангу', 370, 340, NULL, NULL, NULL, NULL, '', 41, 0, 'Особенности', 'Внимание', 'Размещайте детский спортивный комплекс подальше от шкафов или других предметов сострыми углами, а\r\nтакже окон.\r\nПомните, что под снарядами обязательно должны быть гимнастические маты.\r\nУстанавливайте спортивную конструкцию, четко следуя инструкции. Если вы не уверены, что сумеете\r\nправильно совершить монтаж, обратитесь за помощью к специалистам.\r\n\r\nПервое время наблюдайте за занятиями ребенка, пока он в полной мере не освоится на спортивной\r\nплощадке.\r\nВремя от времени проверяйте, чтобы все составные части конструкции были прочно закреплены.\r\nПокупайте детский спортивный комплекс только у надежных, проверенных производителей', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоиях', '2022-01-20 15:56:42', '2022-02-05 15:45:46'),
	(14, 'Штанга наборная Iron King весом 74,5 кг', 'shtanga-nabornaya-iron-king-vesom-74-5-kg', 'Штанга 74,5 кг', 710, NULL, NULL, NULL, NULL, NULL, '', 43, 0, 'Особенности', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоия', '', '', '2022-01-20 16:03:23', '2022-01-20 16:03:23'),
	(15, 'Велотренажер мини DFC MINI Bike B8107 электропривод педалей', 'velotrenazher-mini-dfc-mini-bike-b8107-elektroprivod-pedalej', 'B8107', 499, NULL, NULL, NULL, NULL, NULL, '', 45, 0, 'Особенности', '', '', 'Сопутствущие товары для занятий спортом', 'Гантели являтся универсальным, эффективным и очень удобным инвентарем для силовых тренировок и наращивания мышц в домашних услвоия', '2022-01-20 16:15:01', '2022-01-20 16:15:01');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_addition_infos
CREATE TABLE IF NOT EXISTS `product_addition_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_addition_infos_products_id_foreign` (`products_id`),
  CONSTRAINT `product_addition_infos_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_addition_infos: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `product_addition_infos` DISABLE KEYS */;
INSERT INTO `product_addition_infos` (`id`, `products_id`, `title`) VALUES
	(1, 11, 'Габариты'),
	(2, 11, 'Комплектация турника'),
	(3, 11, 'Характеристики'),
	(7, 14, 'Габариты'),
	(8, 14, 'Комплектация'),
	(9, 15, 'Характеристики'),
	(10, 15, 'Информация'),
	(13, 12, 'Информация'),
	(20, 13, 'Комплектация'),
	(21, 13, 'Характеристики'),
	(22, 13, 'Информация');
/*!40000 ALTER TABLE `product_addition_infos` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_addition_info_items
CREATE TABLE IF NOT EXISTS `product_addition_info_items` (
  `product_addition_infos_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  KEY `product_addition_info_items_product_addition_infos_id_foreign` (`product_addition_infos_id`),
  CONSTRAINT `product_addition_info_items_product_addition_infos_id_foreign` FOREIGN KEY (`product_addition_infos_id`) REFERENCES `product_addition_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_addition_info_items: ~34 rows (приблизительно)
/*!40000 ALTER TABLE `product_addition_info_items` DISABLE KEYS */;
INSERT INTO `product_addition_info_items` (`product_addition_infos_id`, `title`, `value`) VALUES
	(1, 'Ширина перекладины, см:', '110'),
	(1, 'Вынос перекладины от стены, см:', '44'),
	(1, 'Высота кронштейна, см:', '33'),
	(2, 'Болт 8x40 -', '8шт'),
	(2, 'Гайка M8 -', '4шт'),
	(2, 'Дюбель универсальный 10x60 -', '4шт'),
	(2, 'Шуруп для крепления 8x60 -', '4шт'),
	(3, 'Тип:', 'настенный'),
	(3, 'Вес тренажёра, кг:', '7'),
	(3, 'Максимальная допустимая нагрузка, кг:', '350'),
	(3, 'Конструкция:', 'разборная'),
	(3, 'Покраска:', 'порошковая'),
	(3, 'Кольцо для подвеса доп. оборудования:', '2'),
	(7, 'Диаметр грифа, см:', '25'),
	(8, 'Гриф длиной', '1,5м'),
	(8, 'Диск 15кг -', '2шт.'),
	(8, 'Диск 10кг -', '2шт.'),
	(8, 'Диск 5кг -', '2шт.'),
	(9, 'Тип:', 'мини велотренажер'),
	(9, 'Цвет:', 'черный'),
	(9, 'Материал:', 'материал сталь, порошковая окраска'),
	(10, 'Бренд:', 'ДРИАДА-СПОРТ'),
	(10, 'Артикул:', 'B8107'),
	(10, 'Гарантия:', '12 мес.'),
	(13, 'Информация', 'Axioma'),
	(13, 'Артикул:', 'gkit5'),
	(20, 'Боковые основания стойки -', '2шт'),
	(20, 'Опоры для штанги -', '2 шт'),
	(21, 'Тип:', 'многофункциональный'),
	(21, 'Конструкция:', 'разборная'),
	(21, 'Цвет:', 'белый'),
	(22, 'Артикул:', 'Гантель разборная, обрезиненные диски, 10 кг'),
	(22, 'Цвет:', 'черный'),
	(22, 'Материал:', 'железо');
/*!40000 ALTER TABLE `product_addition_info_items` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `сategories_id` bigint(20) unsigned DEFAULT NULL,
  KEY `product_categories_products_id_foreign` (`products_id`),
  KEY `product_categories_сategories_id_foreign` (`сategories_id`),
  CONSTRAINT `product_categories_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_categories_сategories_id_foreign` FOREIGN KEY (`сategories_id`) REFERENCES `сategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_categories: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` (`products_id`, `сategories_id`) VALUES
	(11, 17),
	(14, 17),
	(14, 20),
	(14, 24),
	(15, 18),
	(15, 20),
	(12, 17),
	(13, 18);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_features
CREATE TABLE IF NOT EXISTS `product_features` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `features` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  KEY `product_features_products_id_foreign` (`products_id`),
  CONSTRAINT `product_features_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_features: ~23 rows (приблизительно)
/*!40000 ALTER TABLE `product_features` DISABLE KEYS */;
INSERT INTO `product_features` (`products_id`, `features`) VALUES
	(11, 'Прямой гладкий гриф'),
	(11, 'Усиленная труба увеличенного размера (32 мм)'),
	(11, 'Кольца для подвеса боксерского мешка или груши весом до 60 кг.'),
	(11, 'Тренажер сделан из прочной стальной трубы'),
	(14, 'Гриф длиной 1,5м'),
	(14, 'Фиксируется двумя замками гайками'),
	(14, 'Штанга активно используется и для домашних тренировок, и для занятий в спортивном зале.'),
	(14, 'Подходит для профессионалов'),
	(15, 'Мини велотренажер для домашнего использования.'),
	(15, 'Модель с электроприводом и дистанционным управлением с помощью пульта.'),
	(15, 'Подходит для разработки нижних и верхних конечностей, и для реабилитации больных с опорно-двигательным аппаратом.'),
	(12, 'Большая нагрузка'),
	(12, 'Усиленная труба увеличенного размера (32 мм)'),
	(12, 'Кольца для подвеса боксерского мешка или груши весом до 60 кг.'),
	(12, 'Тренажер сделан из прочной стальной трубы'),
	(12, 'Размер профиля: 50х50/60х40 мм'),
	(13, 'Расстояние между стойками: 80-150 см'),
	(13, 'Высота стоек: 90-153 см'),
	(13, 'Высота страховочных упоров: 55-75 см'),
	(13, 'Допустимая нагрузка: 600 кг'),
	(13, 'Размер профиля: 50х50/60х40 мм'),
	(13, 'Толщина металла: 2-8 мм'),
	(13, 'Упаковка: Пятислойный картон.');
/*!40000 ALTER TABLE `product_features` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_galleries
CREATE TABLE IF NOT EXISTS `product_galleries` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  KEY `product_galleries_products_id_foreign` (`products_id`),
  KEY `product_galleries_file_id_foreign` (`file_id`),
  CONSTRAINT `product_galleries_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_galleries_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_galleries: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `product_galleries` DISABLE KEYS */;
INSERT INTO `product_galleries` (`products_id`, `file_id`) VALUES
	(11, 28),
	(11, 29),
	(14, 44),
	(15, 46),
	(15, 47),
	(12, 40),
	(13, 42),
	(13, 40);
/*!40000 ALTER TABLE `product_galleries` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_related_products
CREATE TABLE IF NOT EXISTS `product_related_products` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `related_product_id` int(11) DEFAULT NULL,
  KEY `product_related_products_products_id_foreign` (`products_id`),
  CONSTRAINT `product_related_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_related_products: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `product_related_products` DISABLE KEYS */;
INSERT INTO `product_related_products` (`products_id`, `related_product_id`) VALUES
	(12, 14),
	(12, 13),
	(12, 11),
	(13, 15),
	(13, 12);
/*!40000 ALTER TABLE `product_related_products` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_sets
CREATE TABLE IF NOT EXISTS `product_sets` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `product_set` int(11) DEFAULT NULL,
  KEY `product_sets_products_id_foreign` (`products_id`),
  CONSTRAINT `product_sets_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_sets: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `product_sets` DISABLE KEYS */;
INSERT INTO `product_sets` (`products_id`, `product_set`) VALUES
	(12, 11),
	(12, 14),
	(13, 14);
/*!40000 ALTER TABLE `product_sets` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.product_videos
CREATE TABLE IF NOT EXISTS `product_videos` (
  `products_id` bigint(20) unsigned DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `product_videos_products_id_foreign` (`products_id`),
  CONSTRAINT `product_videos_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.product_videos: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `product_videos` DISABLE KEYS */;
INSERT INTO `product_videos` (`products_id`, `link`) VALUES
	(11, 'https://youtu.be/9P8kUeU0bJI'),
	(11, 'https://youtu.be/zRdZ5dF4od0'),
	(11, 'https://youtu.be/UAIpGTHALV8'),
	(11, 'https://youtu.be/SubSLe-qFAU'),
	(12, 'https://www.youtube.com/watch?v=Jw-7Ux4le5o'),
	(12, 'https://youtu.be/zRdZ5dF4od0'),
	(12, 'https://www.youtube.com/watch?v=sG1Kr0zTZDc'),
	(13, 'https://www.youtube.com/watch?v=Jw-7Ux4le5o'),
	(13, 'https://youtu.be/zRdZ5dF4od0'),
	(13, 'https://youtu.be/UAIpGTHALV8');
/*!40000 ALTER TABLE `product_videos` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.reviews_titles
CREATE TABLE IF NOT EXISTS `reviews_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `title_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.reviews_titles: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `reviews_titles` DISABLE KEYS */;
INSERT INTO `reviews_titles` (`id`, `title`, `subtitle`, `title_text`, `title_video`, `title_audio`, `created_at`, `updated_at`) VALUES
	(4, 'Отзывы', 'Оставьте и Вы свой видеоотзыв и получите <span>петли TRX бесплатно</span>', 'Отзывы', 'Видеоотзывы', 'Аудиоотзывы', '2022-01-21 10:20:22', '2022-01-21 10:20:22');
/*!40000 ALTER TABLE `reviews_titles` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.settings_sites
CREATE TABLE IF NOT EXISTS `settings_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `header_text` text COLLATE utf8mb4_unicode_ci,
  `work_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_under_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_above_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_above_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_text_block` text COLLATE utf8mb4_unicode_ci,
  `right_text_block` text COLLATE utf8mb4_unicode_ci,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_sites_file_id_foreign` (`file_id`),
  CONSTRAINT `settings_sites_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.settings_sites: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `settings_sites` DISABLE KEYS */;
INSERT INTO `settings_sites` (`id`, `file_id`, `header_text`, `work_time`, `phone`, `email`, `text_under_email`, `title_above_number`, `subtitle_above_number`, `left_text_block`, `right_text_block`, `copyright`) VALUES
	(4, 17, '<p>Нужны товары для тяжелой атлетики?</p>\n<span>Вы 100% на нужном сайте!</span>', 'C 8:00 до 23:00 ежедневно', '375 29 127 02 16', 'gelezo@climland.by', 'Viber, Telegram, WhatsApp (+375 29 127 02 16)', 'Если Вам нужна консультация', 'Оставьте свой номер телефона и мы Вам перезвоним!', 'ИП Шакун Алексей Михайлович\n220037, г. Минск, ул. Бумажкова, д. 37а, кв. 68\nУНП 191652405\nр/с BY67 MTBK 3013 0001 0933 0003 0037 (BYN)\nЗАО “МТББанк”, MTBKBY22, код 117, РКЦ №3\nг. Минск, ул. Короля, 51', 'Копия чека\nСвидетельство от 27 июня 2012 года\nвыдано Минским горисполкомом\nТорговый реестр : №408523 от 16.03.2019г.\nViber, Telegram, WhatsApp (+375291270216)\nИнформация о товаре носит информативный характер, собрана из различных открытых источников и может отличаться. Для уточнения точного описания товара, звоните по телефонам указанным на сайте.', '© 2021 Железо.бел');
/*!40000 ALTER TABLE `settings_sites` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.site_menus
CREATE TABLE IF NOT EXISTS `site_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_menus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.site_menus: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `site_menus` DISABLE KEYS */;
INSERT INTO `site_menus` (`id`, `title`, `url`, `site_menus_id`) VALUES
	(77, 'Стойки под штангу', '#', NULL),
	(78, 'Обрезиненные', '#', 77),
	(79, 'Ab coaster', '#', 78),
	(80, 'Adidas', '#', 78),
	(81, 'Разборные', '#', 77),
	(82, 'Обрезиненные', '#', 77),
	(83, 'Композитные', '#', 77),
	(84, 'Скамьи', '#', NULL),
	(85, 'Штанги в сборе', '#', NULL),
	(86, 'Обрезиненные', '#', 85),
	(87, 'Разборные', '#', 85),
	(88, 'Обрезиненные', '#', 87),
	(89, 'Обрезиненные', '#', 87);
/*!40000 ALTER TABLE `site_menus` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.social_links
CREATE TABLE IF NOT EXISTS `social_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_links_file_id_foreign` (`file_id`),
  CONSTRAINT `social_links_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.social_links: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` (`id`, `link`, `file_id`) VALUES
	(8, 'd', 16),
	(9, 's', 5);
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.text_blocks
CREATE TABLE IF NOT EXISTS `text_blocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.text_blocks: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `text_blocks` DISABLE KEYS */;
INSERT INTO `text_blocks` (`id`, `title`, `draft`, `description`, `created_at`, `updated_at`) VALUES
	(6, 'Магазин товаров для тяжелой атлетики', 0, 'Железо.бел - это место, где вы можете выгодно купить тренажеры, товары для спорта и активного отдыха. Предположим, вы решили, что для поддержания физической формы вам необходимо приобрести беговую дорожку и две гантели. За все вместе придется заплатить минимум 750 рублей. Если учесть, что фитнес-центры обычно предлагают абонементы на 8 посещений в месяц, то ваш личный инвентарь окупится примерно через год. За все вместе придется заплатить минимум 750 рублей. Если учесть, что фитнес-центры обычно предлагают абонементы на 8 посещений в месяц, то ваш личный инвентарь окупится примерно через год.', '2021-09-04 19:15:40', '2022-01-19 18:36:37');
/*!40000 ALTER TABLE `text_blocks` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.text_reviews
CREATE TABLE IF NOT EXISTS `text_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `text_reviews_file_id_foreign` (`file_id`),
  CONSTRAINT `text_reviews_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.text_reviews: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `text_reviews` DISABLE KEYS */;
INSERT INTO `text_reviews` (`id`, `person_name`, `draft`, `file_id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Александр', 0, 27, 'Очень хорошая стойка под штангу. Всем рекомендую интернет магазин железо.бел', '2022-01-17 18:23:39', '2022-01-17 18:23:39'),
	(2, 'Сергей', 0, 28, 'Спасибо железо.бел за оперативную доставку набора гантелей. Буду и далее покупать спортивные товары в вашем магазине.', '2022-01-17 18:24:19', '2022-01-17 18:24:19'),
	(3, 'Александр', 0, 14, 'Спасибо Железо.бел большое за помощь в выборе и оперативну доставку! Буду обращаться еще!', '2022-01-26 21:28:54', '2022-01-26 21:28:54'),
	(4, 'Александр', 0, 14, 'Спасибо Железо.бел большое за помощь в выборе и оперативну доставку! Буду обращаться еще!', '2022-01-26 21:29:24', '2022-01-26 21:29:24'),
	(16, 'Vitalii', 1, 108, 'some review', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(17, 'Vitalii', 1, 109, 'test review', '2022-02-01 19:33:37', '2022-02-01 19:33:37'),
	(18, 'eeee', 1, 110, 'sdf', '2022-02-01 20:06:49', '2022-02-01 20:06:49');
/*!40000 ALTER TABLE `text_reviews` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_rules_unique` (`rules`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `rules`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', 'all', NULL, '$2y$10$bqwC2ly70/UV4pfCRM4r4.PZ3rRqZCkzla6d6CpZ8S7VQ1YGxW1hy', NULL, '2021-07-04 00:00:00', '2021-07-04 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.video_reviews
CREATE TABLE IF NOT EXISTS `video_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.video_reviews: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `video_reviews` DISABLE KEYS */;
INSERT INTO `video_reviews` (`id`, `draft`, `person_name`, `video_url`, `review`, `created_at`, `updated_at`) VALUES
	(3, 0, 'Александр', 'https://youtu.be/3TJP5a3pBME', 'Турник 3 в 1', '2022-01-17 18:25:10', '2022-01-17 18:25:10'),
	(4, 0, 'Наталья', 'https://youtu.be/3TJP5a3pBME', 'Скамья', '2022-01-17 18:25:53', '2022-01-17 18:25:53'),
	(5, 0, 'Алена', 'https://youtu.be/3TJP5a3pBME', 'Спасибо большое за помощь в выборе и оперативну доставку! Буду обращаться еще!', '2022-01-26 21:30:22', '2022-01-26 21:30:22'),
	(6, 0, 'Алена', 'https://youtu.be/3TJP5a3pBME', 'Спасибо большое за помощь в выборе и оперативну доставку! Буду обращаться еще!', '2022-01-26 21:30:47', '2022-01-26 21:30:47'),
	(8, 1, 'Vitalii', 'https://www.youtube.com/watch?v=Vwh1hqBTXqs&list=RDgt2KODmaAMI&index=20', 'some review', '2022-02-01 19:20:58', '2022-02-01 19:20:58'),
	(9, 1, 'Vitalii', 'https://www.youtube.com/watch?v=F3N7_oRdZ2E', 'test review', '2022-02-01 19:33:37', '2022-02-01 19:33:37');
/*!40000 ALTER TABLE `video_reviews` ENABLE KEYS */;

-- Дамп структуры для таблица laravelvadminproject.сategories
CREATE TABLE IF NOT EXISTS `сategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `сategories_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `сategories_slug_unique` (`slug`),
  KEY `сategories_сategories_id_foreign` (`сategories_id`),
  CONSTRAINT `сategories_сategories_id_foreign` FOREIGN KEY (`сategories_id`) REFERENCES `сategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы laravelvadminproject.сategories: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `сategories` DISABLE KEYS */;
INSERT INTO `сategories` (`id`, `slug`, `title`, `сategories_id`, `created_at`, `updated_at`) VALUES
	(16, 'turniki', 'Турники', NULL, '2022-01-17 17:47:13', '2022-01-17 17:47:13'),
	(17, 'turnik-nastennyy', 'Турник настенный', 16, '2022-01-17 17:48:01', '2022-01-17 17:48:01'),
	(18, 'turnik-2v1-brusya', 'Турник 2в1 Брусья', 16, '2022-01-17 17:48:25', '2022-01-17 17:48:25'),
	(19, 'turnik-3v1-brusya-press', 'Турник 3в1 Брусья-Пресс', 16, '2022-01-17 17:48:58', '2022-01-17 17:48:58'),
	(20, 'turnik-4v1-brusya-press', 'Турник 4в1 Брусья-Пресс', 16, '2022-01-17 17:49:43', '2022-01-17 17:49:43'),
	(21, 'trenazhery', 'Тренажёры', NULL, '2022-01-17 17:50:42', '2022-01-17 17:50:42'),
	(22, 'brusya', 'Брусья', 21, '2022-01-17 17:51:01', '2022-01-17 17:51:01'),
	(23, 'skami-dlya-pressa', 'Скамьи для пресса', 21, '2022-01-17 17:51:28', '2022-01-17 17:51:28'),
	(24, 'trenazhery-dlya-fitnesa', 'Тренажеры для фитнеса', 21, '2022-01-17 17:52:38', '2022-01-17 17:52:38'),
	(25, 'inversionye-stol', 'Инверсионые столы', 21, '2022-01-17 17:53:09', '2022-01-17 17:53:09'),
	(26, 'brusya-nastennye', 'Брусья настенные', 22, '2022-01-17 17:54:33', '2022-01-17 17:54:33'),
	(27, 'brusya-skladnye', 'Брусья складные', 22, '2022-01-17 17:55:03', '2022-01-17 17:55:03'),
	(28, 'hajletsy', 'Хайлетсы', 22, '2022-01-17 17:55:30', '2022-01-17 17:55:30');
/*!40000 ALTER TABLE `сategories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
