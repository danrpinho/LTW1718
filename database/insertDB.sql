PRAGMA foreign_keys=ON;

INSERT INTO "users" VALUES ('teste', 'Teste', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'teste@gmail.com', '2017-11-27');
INSERT INTO "users" VALUES ('jonas', 'Joao', 'ec4f9521638a016fe1652021b9e2877ad1d5cde8', 'jonas@hotmail.com', '2107-11-25');
INSERT INTO "users" VALUES ('evo', 'Fernando', '1bda07870e85c5b0a56c55b25b8de246f03470e7', 'evolution@gmail.com', '2017-11-26');


INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo', 'Verificacao', '2017-11-26', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo2', 'Verificacao2', '2017-11-27', 'Personal');
INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo3', 'Verificacao3', '2017-11-26', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'jonas', 'Exemplo', 'Verificacao2', '2017-11-27', 'Personal');
INSERT INTO "todolists" VALUES ( NULL, 'jonas', 'Exemplo2', 'Verificacao3', '2017-11-26', 'Job');

INSERT INTO "listitems" VALUES ( 1, 1, 'Verificar se aparece', 0, 'jonas', '2017-12-01');
INSERT INTO "listitems" VALUES ( 2, 1, 'Verificar se aparece2', 0, 'teste', '2017-12-02');
