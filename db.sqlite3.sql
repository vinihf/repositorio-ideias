CREATE DATABASE 'REPOSITORIO'

CREATE TABLE IF NOT EXISTS "criador_artefatos" (
	"id"	integer NOT NULL,
	"artefato_text"	varchar(40) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "criador_avaliacao" (
	"id"	integer NOT NULL,
	"avaliacao_text"	varchar(50) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "criador_disciplina" (
	"id"	integer NOT NULL,
	"disciplina_text"	varchar(50) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "criador_materiais" (
	"id"	integer NOT NULL,
	"material_text"	varchar(40) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "criador_organizacao" (
	"id"	integer NOT NULL,
	"em_grupo"	bool NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "criador_projeto" (
	"id"	integer NOT NULL,
	"titulo"	varchar(100) NOT NULL,
	"questao_motriz"	varchar(60) NOT NULL,
	"ancora"	varchar(320) NOT NULL,
	"desc_organizacao"	varchar(500) NOT NULL,
	"desc_avaliacao"	varchar(500) NOT NULL,
	"referencias"	varchar(1000) NOT NULL,
	"avaliacao_id"	bigint NOT NULL,
	"disciplina_id"	bigint NOT NULL,
	"organizacao_id"	bigint NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("avaliacao_id") REFERENCES "criador_avaliacao"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("disciplina_id") REFERENCES "criador_disciplina"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("organizacao_id") REFERENCES "criador_organizacao"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "criador_projeto_artefatos" (
	"id"	integer NOT NULL,
	"projeto_id"	bigint NOT NULL,
	"artefatos_id"	bigint NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("artefatos_id") REFERENCES "criador_artefatos"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("projeto_id") REFERENCES "criador_projeto"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "criador_projeto_materiais" (
	"id"	integer NOT NULL,
	"projeto_id"	bigint NOT NULL,
	"materiais_id"	bigint NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("materiais_id") REFERENCES "criador_materiais"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("projeto_id") REFERENCES "criador_projeto"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "criador_projeto_tema" (
	"id"	integer NOT NULL,
	"projeto_id"	bigint NOT NULL,
	"tema_id"	bigint NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("projeto_id") REFERENCES "criador_projeto"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("tema_id") REFERENCES "criador_tema"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "criador_tema" (
	"id"	integer NOT NULL,
	"tema_text"	varchar(50) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "criador_artefatos" VALUES (1,'Software funcional');
INSERT INTO "criador_artefatos" VALUES (2,'Artigo científico');
INSERT INTO "criador_artefatos" VALUES (3,'Revisão sistemática');
INSERT INTO "criador_artefatos" VALUES (4,'Protótipo');
INSERT INTO "criador_avaliacao" VALUES (1,'Gamificação');
INSERT INTO "criador_avaliacao" VALUES (2,'Avaliação de artefatos');
INSERT INTO "criador_avaliacao" VALUES (3,'Número de tarefas concluídas');
INSERT INTO "criador_avaliacao" VALUES (4,'Complexidade dos resultados');
INSERT INTO "criador_disciplina" VALUES (1,'Fundamentos da Computação');
INSERT INTO "criador_disciplina" VALUES (2,'Programação');
INSERT INTO "criador_disciplina" VALUES (3,'Banco de Dados');
INSERT INTO "criador_disciplina" VALUES (4,'Redes de Computadores');
INSERT INTO "criador_materiais" VALUES (1,'Computador');
INSERT INTO "criador_materiais" VALUES (2,'Impressora');
INSERT INTO "criador_materiais" VALUES (3,'Internet');
INSERT INTO "criador_materiais" VALUES (4,'Caderno de campo');
INSERT INTO "criador_tema" VALUES (1,'1 Erradicação da pobreza');
INSERT INTO "criador_tema" VALUES (2,'2 Fome zero e agricultura sustentável');
INSERT INTO "criador_tema" VALUES (3,'3 Saúde e bem-estar');
INSERT INTO "criador_tema" VALUES (4,'4 Educação de qualidade');
CREATE INDEX IF NOT EXISTS "criador_projeto_artefatos_artefatos_id_1a5a9183" ON "criador_projeto_artefatos" (
	"artefatos_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_artefatos_projeto_id_4ea87d99" ON "criador_projeto_artefatos" (
	"projeto_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "criador_projeto_artefatos_projeto_id_artefatos_id_070e69a2_uniq" ON "criador_projeto_artefatos" (
	"projeto_id",
	"artefatos_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_avaliacao_id_6cf34fc5" ON "criador_projeto" (
	"avaliacao_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_disciplina_id_8c25e520" ON "criador_projeto" (
	"disciplina_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_materiais_materiais_id_35db0090" ON "criador_projeto_materiais" (
	"materiais_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_materiais_projeto_id_732377a4" ON "criador_projeto_materiais" (
	"projeto_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "criador_projeto_materiais_projeto_id_materiais_id_9bf9fdd9_uniq" ON "criador_projeto_materiais" (
	"projeto_id",
	"materiais_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_organizacao_id_2af47485" ON "criador_projeto" (
	"organizacao_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_tema_projeto_id_1dc0abf5" ON "criador_projeto_tema" (
	"projeto_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "criador_projeto_tema_projeto_id_tema_id_83c231d2_uniq" ON "criador_projeto_tema" (
	"projeto_id",
	"tema_id"
);
CREATE INDEX IF NOT EXISTS "criador_projeto_tema_tema_id_1c217235" ON "criador_projeto_tema" (
	"tema_id"
);
COMMIT;
