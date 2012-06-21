CREATE TABLE alumno (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, apellido text NOT NULL, matricula VARCHAR(10) NOT NULL, carrera text NOT NULL, grupo_id BIGINT NOT NULL, INDEX grupo_id_idx (grupo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE alumno_quiz (id BIGINT AUTO_INCREMENT, alumno_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX alumno_quiz_index_idx (alumno_id, quiz_id), INDEX alumno_id_idx (alumno_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE grupo (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, modulo_id BIGINT NOT NULL, tutor_id BIGINT NOT NULL, INDEX modulo_id_idx (modulo_id), INDEX tutor_id_idx (tutor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE laboratorio (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, capacidad BIGINT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE laboratorio_quiz (id BIGINT AUTO_INCREMENT, laboratorio_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX laboratorio_quiz_index_idx (laboratorio_id, quiz_id), INDEX laboratorio_id_idx (laboratorio_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE modulo (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE quiz (id BIGINT AUTO_INCREMENT, fecha_at DATE NOT NULL, hora_ini TIME NOT NULL, hora_fin TIME NOT NULL, cupo BIGINT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tutor (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, apellido text NOT NULL, email text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tutor_quiz (id BIGINT AUTO_INCREMENT, tutor_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX tutor_quiz_index_idx (tutor_id, quiz_id), INDEX tutor_id_idx (tutor_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE alumno ADD CONSTRAINT alumno_grupo_id_grupo_id FOREIGN KEY (grupo_id) REFERENCES grupo(id) ON DELETE CASCADE;
ALTER TABLE alumno_quiz ADD CONSTRAINT alumno_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
ALTER TABLE alumno_quiz ADD CONSTRAINT alumno_quiz_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE grupo ADD CONSTRAINT grupo_tutor_id_tutor_id FOREIGN KEY (tutor_id) REFERENCES tutor(id) ON DELETE CASCADE;
ALTER TABLE grupo ADD CONSTRAINT grupo_modulo_id_modulo_id FOREIGN KEY (modulo_id) REFERENCES modulo(id) ON DELETE CASCADE;
ALTER TABLE laboratorio_quiz ADD CONSTRAINT laboratorio_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
ALTER TABLE laboratorio_quiz ADD CONSTRAINT laboratorio_quiz_laboratorio_id_laboratorio_id FOREIGN KEY (laboratorio_id) REFERENCES laboratorio(id) ON DELETE CASCADE;
ALTER TABLE tutor_quiz ADD CONSTRAINT tutor_quiz_tutor_id_tutor_id FOREIGN KEY (tutor_id) REFERENCES tutor(id) ON DELETE CASCADE;
ALTER TABLE tutor_quiz ADD CONSTRAINT tutor_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
