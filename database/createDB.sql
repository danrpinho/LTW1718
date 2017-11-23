CREATE TABLE users(
    username TEXT PRIMARY KEY,
    fullname TEXT,
    pword TEXT,
    joined DATE
);

CREATE TABLE todolists(
    listID INTEGER PRIMARY KEY,
    username TEXT REFERENCES users,
    title TEXT,
    creation DATE
);

CREATE TABLE listitems(
    id INTEGER,
    listID INTEGER REFERENCES todolists,
    descr TEXT,
    solved INTEGER,
    PRIMARY KEY(id, listID)
)