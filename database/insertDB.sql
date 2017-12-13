PRAGMA foreign_keys=ON;

INSERT INTO "users" VALUES ('teste', 'Teste', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'teste@gmail.com', '2017-11-27');
INSERT INTO "users" VALUES ('jonas', 'Joao', 'ec4f9521638a016fe1652021b9e2877ad1d5cde8', 'jonas@hotmail.com', '2107-11-25');
INSERT INTO "users" VALUES ('evo', 'Fernando', '1bda07870e85c5b0a56c55b25b8de246f03470e7', 'evolution@gmail.com', '2017-11-26');
INSERT INTO "users" VALUES ('luis', 'Luis', 'b179ae09587be854f415902818a2eaa5220dbb49', 'up201404302@fe.up.pt.com', '2017-11-13');
INSERT INTO "users" VALUES ('francisco', 'Francisco', '017796fb0f96deec8b28d92dd0d4706d2ed0923e', 'up201503481@fe.up.pt.com', '2017-11-13');
INSERT INTO "users" VALUES ('daniel', 'Daniel', '50a60f7d12e6116a56f9ed780962dda233fa1850', 'up201505302@fe.up.pt.com', '2017-11-13');
INSERT INTO "users" VALUES ('restivo', 'Andre Restivo', '30aa1c780df178e97c86631a6639d9c1d9b923a5', 'arestivo@fe.up.pt.com', '2017-11-13');


INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo', 'Verificacao', '2017-11-26', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo2', 'Verificacao2', '2017-11-27', 'Personal');
INSERT INTO "todolists" VALUES ( NULL, 'teste', 'Exemplo3', 'Verificacao3', '2017-11-26', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'jonas', 'Exemplo', 'Verificacao2', '2017-11-27', 'Personal');
INSERT INTO "todolists" VALUES ( NULL, 'jonas', 'Exemplo2', 'Verificacao3', '2017-11-26', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'luis', 'TrabalhoPLOG', 'Puzzle', '2017-12-08', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'luis', 'TrabalhoLTW', 'ToDoLists', '2017-12-10', 'Job');
INSERT INTO "todolists" VALUES ( NULL, 'luis', 'MarioGame', 'Fun', '2017-12-13', 'Personal');
INSERT INTO "todolists" VALUES ( NULL, 'francisco', 'ExameLTW', 'Estudar', '2017-12-10', 'Exame');
INSERT INTO "todolists" VALUES ( NULL, 'francisco', 'ExameESOF', 'Estudar', '2017-12-11', 'Exame');
INSERT INTO "todolists" VALUES ( NULL, 'daniel', 'ExameRCOM', 'Estudar', '2017-12-10', 'Exame');
INSERT INTO "todolists" VALUES ( NULL, 'daniel', 'TrabalhoPLOG', 'Estudar', '2017-12-11', 'Exame');

INSERT INTO "listitems" VALUES ( 1, 1, 'Verificar se aparece', 0, 'jonas', '2017-12-01');
INSERT INTO "listitems" VALUES ( 2, 1, 'Verificar se aparece2', 0, 'teste', '2017-12-02');
INSERT INTO "listitems" VALUES ( 1, 7, 'Definir Estrutura', 1, 'luis', '2017-12-10');
INSERT INTO "listitems" VALUES ( 2, 7, 'Escrever HTML', 1, 'luis', '2017-12-10');
INSERT INTO "listitems" VALUES ( 3, 7, 'Comecar a Fazer o CSS', 1, 'daniel', '2017-12-10');
INSERT INTO "listitems" VALUES ( 4, 7, 'Fazer AXAJ ao Adicionar Item', 1, 'francisco', '2017-12-11');
INSERT INTO "listitems" VALUES ( 5, 7, 'Item Aparece na Sidebar', 1, 'luis', '2017-12-11');
INSERT INTO "listitems" VALUES ( 6, 7, 'Verificacao de Formulario', 1, 'francisco', '2017-12-12');
INSERT INTO "listitems" VALUES ( 7, 7, 'Tratar da Seguranca do Site', 1, 'daniel', '2017-12-12');
INSERT INTO "listitems" VALUES ( 8, 7, 'Fazer Relatorio', 1, 'daniel', '2017-12-12');
INSERT INTO "listitems" VALUES ( 9, 7, 'Apresentacao', 1, 'restivo', '2017-12-14');
INSERT INTO "listitems" VALUES ( 1, 6, 'Fazer o Protocolo FTP', 1, 'luis', '2017-12-08');
INSERT INTO "listitems" VALUES ( 2, 6, 'Fazer Experiencias', 1, 'luis', '2017-12-10');
INSERT INTO "listitems" VALUES ( 1, 8, 'Verificar Estado do Codigo', 0, 'luis', '2017-12-20');
INSERT INTO "listitems" VALUES ( 1, 9, 'Rever Materia', 0, 'francisco', '2018-01-15');
INSERT INTO "listitems" VALUES ( 1, 10, 'Rever Materia', 0, 'francisco', '2018-01-04');
INSERT INTO "listitems" VALUES ( 1, 11, 'Rever Materia', 0, 'daniel', '2018-01-07');
INSERT INTO "listitems" VALUES ( 1, 12, 'Fazer Restricoes', 0, 'daniel', '2017-12-22');
