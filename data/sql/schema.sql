CREATE TABLE alumno (id BIGINT AUTO_INCREMENT, user_id BIGINT UNIQUE NOT NULL, carrera text NOT NULL, matricula VARCHAR(10) NOT NULL, grupo_id BIGINT, INDEX user_id_idx (user_id), INDEX grupo_id_idx (grupo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE alumno_quiz (id BIGINT AUTO_INCREMENT, alumno_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX alumno_quiz_index_idx (alumno_id, quiz_id), INDEX alumno_id_idx (alumno_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE carrera (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE grupo (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, modulo_id BIGINT NOT NULL, tutor_id BIGINT NOT NULL, INDEX modulo_id_idx (modulo_id), INDEX tutor_id_idx (tutor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE laboratorio (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, capacidad BIGINT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE laboratorio_quiz (id BIGINT AUTO_INCREMENT, laboratorio_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX laboratorio_quiz_index_idx (laboratorio_id, quiz_id), INDEX laboratorio_id_idx (laboratorio_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE lesson (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, descripcion text NOT NULL, modulo_id BIGINT NOT NULL, INDEX modulo_id_idx (modulo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE modulo (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE quiz (id BIGINT AUTO_INCREMENT, fecha_at DATE NOT NULL, hora_ini TIME NOT NULL, hora_fin TIME NOT NULL, cupo BIGINT NOT NULL, lesson_id BIGINT NOT NULL, INDEX lesson_id_idx (lesson_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tutor (id BIGINT AUTO_INCREMENT, nombre text NOT NULL, apellido text NOT NULL, email text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tutor_quiz (id BIGINT AUTO_INCREMENT, tutor_id BIGINT NOT NULL, quiz_id BIGINT NOT NULL, UNIQUE INDEX tutor_quiz_index_idx (tutor_id, quiz_id), INDEX tutor_id_idx (tutor_id), INDEX quiz_id_idx (quiz_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE alumno ADD CONSTRAINT alumno_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE alumno ADD CONSTRAINT alumno_grupo_id_grupo_id FOREIGN KEY (grupo_id) REFERENCES grupo(id) ON DELETE CASCADE;
ALTER TABLE alumno_quiz ADD CONSTRAINT alumno_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
ALTER TABLE alumno_quiz ADD CONSTRAINT alumno_quiz_alumno_id_alumno_id FOREIGN KEY (alumno_id) REFERENCES alumno(id) ON DELETE CASCADE;
ALTER TABLE grupo ADD CONSTRAINT grupo_tutor_id_tutor_id FOREIGN KEY (tutor_id) REFERENCES tutor(id) ON DELETE CASCADE;
ALTER TABLE grupo ADD CONSTRAINT grupo_modulo_id_modulo_id FOREIGN KEY (modulo_id) REFERENCES modulo(id) ON DELETE CASCADE;
ALTER TABLE laboratorio_quiz ADD CONSTRAINT laboratorio_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
ALTER TABLE laboratorio_quiz ADD CONSTRAINT laboratorio_quiz_laboratorio_id_laboratorio_id FOREIGN KEY (laboratorio_id) REFERENCES laboratorio(id) ON DELETE CASCADE;
ALTER TABLE lesson ADD CONSTRAINT lesson_modulo_id_modulo_id FOREIGN KEY (modulo_id) REFERENCES modulo(id) ON DELETE CASCADE;
ALTER TABLE quiz ADD CONSTRAINT quiz_lesson_id_lesson_id FOREIGN KEY (lesson_id) REFERENCES lesson(id) ON DELETE CASCADE;
ALTER TABLE tutor_quiz ADD CONSTRAINT tutor_quiz_tutor_id_tutor_id FOREIGN KEY (tutor_id) REFERENCES tutor(id) ON DELETE CASCADE;
ALTER TABLE tutor_quiz ADD CONSTRAINT tutor_quiz_quiz_id_quiz_id FOREIGN KEY (quiz_id) REFERENCES quiz(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
