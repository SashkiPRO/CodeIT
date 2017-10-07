<?php 
require_once 'functions.php';
createTable('country','country_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (country_id)' );
  initCountries();
  createTable('user', ' id int(11) NOT NULL AUTO_INCREMENT,
  real_name varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  date_birth date DEFAULT NULL,
  timestamp int(11) DEFAULT NULL,
  country_id int(11) DEFAULT NULL,
  login varchar(50) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY FK_user_country_country_id (country_id),
  CONSTRAINT FK_user_country_country_id FOREIGN KEY (country_id) REFERENCES country (country_id)');

echo '<p><a href="login.php">login</a><p>';
?>