DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS todolists;
DROP TABLE IF EXISTS listitems;
DROP TABLE IF EXISTS categories;

CREATE TABLE users(
    username TEXT PRIMARY KEY,
    fullname TEXT,
    pword TEXT NOT NULL,
    email TEXT NOT NULL,
    joined DATE
);

CREATE TABLE todolists(
    listID INTEGER PRIMARY KEY,
    username TEXT REFERENCES users,
    title TEXT,
	descr TEXT,
    creation DATE,
);

CREATE TABLE listitems(
    id INTEGER,
    listID INTEGER REFERENCES todolists,
    descr TEXT,
    solved INTEGER,
    assignee TEXT REFERENCES users,
	datadue DATE,
    PRIMARY KEY(id, listID)
);

CREATE TABLE categories(
    category TEXT,
    listID integer,
    PRIMARY KEY(category, listID)
);
