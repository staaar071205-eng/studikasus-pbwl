CREATE DATABASE IF NOT EXISTS dbakademik
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE dbakademik;

CREATE TABLE tb_mhsw (
    mhsw_id     INT UNSIGNED NOT NULL AUTO_INCREMENT,
    mhsw_nim    VARCHAR(25)  NOT NULL,
    mhsw_nama   VARCHAR(100) NOT NULL,
    mhsw_alamat TEXT,
    PRIMARY KEY (mhsw_id),
    UNIQUE KEY uq_mhsw_nim (mhsw_nim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;