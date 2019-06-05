CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(32) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email)
);