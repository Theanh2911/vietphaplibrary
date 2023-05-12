
CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `account` (`username`, `password`, `role`, `name`) VALUES
('TheAnh', '123', 'admin', 'Nguyễn Thế Anh'),
('TrungHieu', '123', 'admin', 'Lê Chu Trung Hiếu'),
('ThanhTung', '123', 'admin', 'Nguyễn Thanh Tùng'),
('TueMinh', '123', 'admin', 'Nguyễn Tuệ Minh'),
('User', '123', 'user', 'user');


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Tiếng Pháp'),
(2, 'Thực hành cơ sở dữ liệu'),
(3, 'Triết học'),
(4, 'Bóng đá 1');



CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `createddate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `comments` (`id`, `content`, `createddate`, `createdBy`, `post_id`) VALUES
(2, 'qua tuyet voi', '2022-05-30 19:42:37', 'user', 5),



CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `content` longtext NOT NULL,
  `createddate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
inset into post 

INSERT INTO `post` (`id`, `title`, `content`, `createddate`, `createdBy`, `category_id`, `image`, `description`) VALUES


ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctb` (`createdBy`),
  ADD KEY `po` (`post_id`);


ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `account` (`createdBy`);


ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


ALTER TABLE `comments`
  ADD CONSTRAINT `ctb` FOREIGN KEY (`createdBy`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `po` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);


ALTER TABLE `post`
  ADD CONSTRAINT `account` FOREIGN KEY (`createdBy`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

