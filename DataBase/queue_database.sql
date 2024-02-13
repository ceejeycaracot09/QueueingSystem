CREATE TABLE `admin` (
    `username` varchar(10),
    `password` varchar(25)
);

CREATE TABLE `user_table` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `id_num` varchar(10),
    `password` varchar(255),
    `fullname` varchar(300),
    `office` varchar(300),
    `window` int(1),
    `campus` varchar(300),
    `created_on` datetime,
    `updated_on` datetime
);

CREATE TABLE `transaction_table` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `client_type` varchar(255),
    `id_num` varchar(10),
    `fullname` varchar(300),
    `mobile_num` varchar(20),
    `email` varchar(255),
    `transaction_department` varchar(255),
    `transaction_id` int,
    `created_on` datetime,
    `updated_on` datetime
);

CREATE TABLE `transaction_type` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `department` varchar(255),
    `created_on` datetime,
    `updated_on` datetime
);

CREATE TABLE `transaction_list` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `transaction_num` int,
    `transaction` varchar(255),
    `created_on` datetime,
    `updated_on` datetime
);
