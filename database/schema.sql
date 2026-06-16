CREATE DATABASE IF NOT EXISTS kamruzzaman_site
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE kamruzzaman_site;

CREATE TABLE IF NOT EXISTS admin_users (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(140) NOT NULL,
  email VARCHAR(190) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY admin_users_email_unique (email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS submissions (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  tracking_code VARCHAR(32) NOT NULL,
  type ENUM('complaint','help','question') NOT NULL,
  status ENUM('received','reviewing','in_progress','resolved','closed') NOT NULL DEFAULT 'received',
  name VARCHAR(140) NOT NULL,
  phone VARCHAR(24) NOT NULL,
  email VARCHAR(190) NULL,
  nid VARCHAR(40) NULL,
  upazila VARCHAR(60) NOT NULL,
  address VARCHAR(255) NULL,
  subject VARCHAR(180) NOT NULL,
  message TEXT NOT NULL,
  public_note TEXT NULL,
  internal_note TEXT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY submissions_tracking_code_unique (tracking_code),
  KEY submissions_status_created_idx (status, created_at),
  KEY submissions_type_created_idx (type, created_at)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS submission_files (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  submission_id BIGINT UNSIGNED NOT NULL,
  original_name VARCHAR(255) NOT NULL,
  stored_name VARCHAR(255) NOT NULL,
  mime_type VARCHAR(120) NOT NULL,
  file_size INT UNSIGNED NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY submission_files_stored_unique (stored_name),
  CONSTRAINT submission_files_submission_fk FOREIGN KEY (submission_id)
    REFERENCES submissions (id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS submission_status_history (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  submission_id BIGINT UNSIGNED NOT NULL,
  old_status VARCHAR(32) NULL,
  new_status VARCHAR(32) NOT NULL,
  public_note TEXT NULL,
  internal_note TEXT NULL,
  changed_by INT UNSIGNED NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY submission_history_submission_idx (submission_id, created_at),
  CONSTRAINT submission_history_submission_fk FOREIGN KEY (submission_id)
    REFERENCES submissions (id) ON DELETE CASCADE,
  CONSTRAINT submission_history_admin_fk FOREIGN KEY (changed_by)
    REFERENCES admin_users (id) ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT INTO admin_users (name, email, password_hash)
VALUES (
  'Site Admin',
  'admin@kamruzzaman.local',
  '$2y$10$.xSq7jw6n1/6P96FyrRj4uuVnw4Dn6Jrtn4GbY78qjqpjlfh6vpRq'
)
ON DUPLICATE KEY UPDATE name = VALUES(name);
