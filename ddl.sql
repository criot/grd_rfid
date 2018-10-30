CREATE TABLE `grd_rfid`.`users` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `first_name` VARCHAR (30) NOT NULL , 
        `userid` VARCHAR (30) DEFAULT NULL ,
        `password` VARCHAR (30) DEFAULT NULL ,
        `user_type` VARCHAR (20) NOT NULL ,
        `no_of_vehicles` INT DEFAULT NULL ,  
        `created_at` DATETIME NOT NULL , 
        `created_by` INT NOT NULL , 
        PRIMARY KEY(`id`),
        UNIQUE(userid)
) ENGINE = InnoDB;

INSERT INTO users ( `first_name`,`user_type`, `no_of_vehicles`, `created_at`, `created_by`) VALUES
        ('Navaneeth', 'STUDENT', 2, '2018-10-05 00:00:00', '0'),
        ('Nivu', 'STAFF', 3, '2018-10-05 00:00:00', '0');

INSERT INTO users ( `first_name`,`user_type`, `userid`, `password`, `created_at`, `created_by`) VALUES
        ('John', 'SECURITY', 'security1', 'security1', '2018-10-05 00:00:00', '0');

CREATE TABLE grd_rfid.vehicles (
        id INT NOT NULL AUTO_INCREMENT, 
        user_id INT NOT NULL, 
        rfid VARCHAR (30) NOT NULL, 
        vehicle_no VARCHAR (30) NOT NULL , 
        PRIMARY KEY (id), 
        UNIQUE (rfid),
        UNIQUE (vehicle_no),
        FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE = InnoDB;


CREATE TABLE grd_rfid.in_out_entry(
        id INT NOT NULL AUTO_INCREMENT,
        gate_keeper_id INT NOT NULL, 
        reader_id INT NOT NULL,
        vehicle_id INT NOT NULL, 
        vehicle_entry VARCHAR (10) NOT NULL, 
        gate_time DATETIME NOT NULL, 
        PRIMARY KEY (id),
        FOREIGN KEY (vehicle_id) REFERENCES vehicles (id),
        FOREIGN KEY (gate_keeper_id) REFERENCES users(id)
) ENGINE = InnoDB;