DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS todolists;
DROP TABLE IF EXISTS listitems;

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
	  descrList TEXT,
    creation DATE,
    category TEXT
);

CREATE TABLE listitems(
    id INTEGER,
    listID INTEGER REFERENCES todolists,
    descrItem TEXT,
    solved INTEGER,
    assignee TEXT REFERENCES users,
	  datedue DATE,
    PRIMARY KEY(id, listID)
);
