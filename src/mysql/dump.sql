use feegow;

CREATE TABLE IF NOT EXISTS `feegow`.`appointments` (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    specialty_id INT UNSIGNED NOT NULL, 
    professional_id INT UNSIGNED NOT NULL, 
    name VARCHAR(255) NOT NULL, 
    cpf CHAR(14) NOT NULL, 
    source_id INT UNSIGNED NOT NULL, 
    birthdate DATE NOT NULL,
    date_time DATE NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

GRANT ALL ON feegow.* TO 'root'@'%' IDENTIFIED BY 'senhaFeegow2022';
FLUSH PRIVILEGES;