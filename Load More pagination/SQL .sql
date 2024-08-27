CREATE DATABASE your_database_name;
USE your_database_name;
CREATE TABLE your_table_name (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Insert some example data
INSERT INTO your_table_name (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO your_table_name (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO your_table_name (name, email) VALUES ('Emily Johnson', 'emily.johnson@example.com');
-- Repeat as necessary to create enough records for pagination
