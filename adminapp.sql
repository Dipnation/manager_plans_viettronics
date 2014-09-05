SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` text NOT NULL,
  `unit_des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(50) DEFAULT 'avatar-default.jpg',
  `unit_id` int(11) NOT NULL,
  `status` int(5) DEFAULT '1',
  PRIMARY KEY (`id`),
	KEY `unit_id` (`unit_id`),
	CONSTRAINT `fk_unit_id1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `account_online`;
CREATE TABLE `account_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
	`unit_id` int(11) NOT NULL,
	`time_login` datetime NOT NULL,
  PRIMARY KEY (`id`),
	KEY `account_id1` (`account_id`),
	KEY `unit_id1` (`unit_id`),
	CONSTRAINT `fk_user_online` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT `fk_unit_online` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `unit`
-- ----------------------------


DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`unit_id` int(11) NOT NULL,
  `job_name` text NOT NULL,
  `job_des` text NOT NULL,
  PRIMARY KEY (`id`),
	KEY `unit_id1` (`unit_id`),
	CONSTRAINT `fk_unit_id2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `job_detail`;
CREATE TABLE `job_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`job_id` int(11) NOT NULL,
  `jobd_name` text NOT NULL,
  `jobd_des` text NOT NULL,
	`jobd_timestart` datetime NOT NULL,
	`jobd_timeend` datetime NOT NULL,
	`jobd_note` text NOT NULL,
	`account_manager` int(11) NOT NULL,
	`account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	KEY `job_id` (`job_id`),
	KEY `account_id` (`account_id`),
	CONSTRAINT `fk_job_id` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT `fk_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `account` VALUES ('1','admin','c0b38c91fc630782af1935721b3ce95c','Phạm Tất Đạt','tatdat171@gmail.com','avatar-1.jpg','1','3'), ('2','tienmanh','25f9e794323b453885f5181f1b624d0b','Bùi Tiến Mạnh','manhnb@gmail.com','avatar-2.jpg','2','1'), ('3','nganlove68','e10adc3949ba59abbe56e057f20f883e','Nguyễn Thị Ngân','ngant@gmail.com','avatar-3.jpg','1','1'), ('4','thaont','e10adc3949ba59abbe56e057f20f883e','Nguyễn Thị Thảo','thaont@gmail.com','avatar-4.jpg','1','1'), ('5','thongbm','e10adc3949ba59abbe56e057f20f883e','Bùi Minh Thông','thongbm@gmail.com','avatar-5.jpg','3','1'), ('6','phamtatdat','e10adc3949ba59abbe56e057f20f883e','Phạm Tất Đạt','kunny171@gmail.com','avatar-6.jpg','1','1'), ('7','sennguyen','e10adc3949ba59abbe56e057f20f883e','Nguyễn Thị Sen','sennt@gmail.com','avatar-7.jpg','2','2');
INSERT INTO `unit` VALUES ('1','Cục Thuế','Cục Thuế'), ('2','Cục Xuất Nhập Khẩu','Cục Xuất Nhập Khẩu'), ('3','Cục Hải Quan','Cục Hải Quan'), ('4','Cục Tổng Ngành','Cục Tổng Ngành');
