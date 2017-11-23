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
    creation DATE,
    datadue DATE
);

CREATE TABLE listitems(
    id INTEGER,
    listID INTEGER REFERENCES todolists,
    descr TEXT,
    solved INTEGER,
    assignee TEXT REFERENCES users.username,
    PRIMARY KEY(id, listID)
)

CREATE TABLE categories(
    category TEXT,
    listID integer,
    PRIMARY KEY(category, listID)
)
