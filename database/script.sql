
DROP DATABASE IF EXISTS tmplaravel;

CREATE DATABASE IF NOT EXISTS `laravel_1` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `laravel_1`;

DROP TABLE IF EXISTS news_categories;
CREATE TABLE news_categories (
id BIGINT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(155) NOT NULL UNIQUE,
description VARCHAR(1024));

DROP TABLE IF EXISTS news;
CREATE TABLE news (
id SERIAL PRIMARY KEY,
category_id BIGINT,
name VARCHAR(255) NOT NULL,
description TEXT,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
CONSTRAINT categories_fk
FOREIGN KEY(category_id) REFERENCES news_categories(id)
);

INSERT INTO news_categories (name,description) VALUES 
('Наука и технологии','Новости науки, хайтек рынка, перспективные технологии и удивительные факты вокруг нас'),
('Политика','Актуальная информация о политике в стране и мире. Узнайте всё о жизни власти в статьях и видео.'),
('Экономика',' Последние новости экономики и финансов в России и за рубежом. Факты, события, статистика, интервью и комментарии экспертов'),
('Медицина и здравоохранение','Самые свежие новости о событиях в мировой и российской медицине, здравоохранении. Лечение в России и за рубежом. Открытия ученых.'),
('Искусство, кино и прочая фигня','Читайте свежие новости культуры: о новинках кино, культурных событиях в регионах, фестивалях и литературных премиях.');

INSERT INTO news(category_id,name,description) 
SELECT id,'a','b' FROM news_categories ORDER BY id;

CREATE OR REPLACE VIEW v_news AS 
SELECT n.id,
	   c.name as category,
       n.name as title,
       n.description,
       n.created_at
FROM news n 
INNER JOIN news_categories c ON n.category_id=c.id


