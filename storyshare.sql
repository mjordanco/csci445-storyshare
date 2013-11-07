CREATE DATABASE IF NOT EXISTS storyshare;

USE storyshare;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS prompts;
DROP TABLE IF EXISTS stories;
DROP TABLE IF EXISTS trophies;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS prompt_category;
DROP TABLE IF EXISTS story_category;

CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	username TEXT,
	firstname TEXT,
	lastname TEXT,
	password TEXT
);

CREATE TABLE prompts (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name TEXT,
	prompt TEXT,
	category TEXT,
	user_id INTEGER,
	points INTEGER,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE stories (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name TEXT,
	story TEXT,
	prompt_id INTEGER,
	user_id INTEGER,
	points INTEGER,
	FOREIGN KEY (prompt_id) REFERENCES prompts(id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE trophies (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	type TEXT,
	user_id INTEGER,
	story_id INTEGER,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	FOREIGN KEY (story_id) REFERENCES stories(id) ON DELETE CASCADE
);

CREATE TABLE categories (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name TEXT,
	description TEXT
);

CREATE TABLE prompt_category (
	prompt_id INTEGER,
	category_id INTEGER,
	FOREIGN KEY (prompt_id) REFERENCES prompts(id) ON DELETE CASCADE,
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE story_category (
	story_id INTEGER,
	category_id INTEGER,
	FOREIGN KEY (story_id) REFERENCES stories(id) ON DELETE CASCADE,
	FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);
