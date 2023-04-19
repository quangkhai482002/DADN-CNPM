SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;







CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `CCCD` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `farm` (
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





CREATE TABLE `subfarm` (
  `subfarm_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `subfarm_name` varchar(255) NOT NULL,
  `plant_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `subfarm_id` int(11) NOT NULL,
  `device_name` enum('den','bom nuoc','cam bien anh sang','cam bien nhiet do, do am','cam bien do am dat'),
  `device_type` enum('input device','output device'),
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `date_type` enum('everyday','once every 2 days','once every 3 days','once every 4 days','once every 5 days') DEFAULT 'everyday',
  `time_start` text NOT NULL,
  `time_end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





CREATE TABLE `history` (
  `action_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `device_id` int(11) NOT NULL,
  `actor` enum('system','user','admin') DEFAULT 'system',
  `activity` enum('turn on','turn off') 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





CREATE TABLE `statistic` (
  `action_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `device_id` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




--
-- key
--


  ALTER TABLE `user`
	ADD PRIMARY KEY (`user_id`);

  ALTER TABLE `farm`
	ADD PRIMARY KEY (`farm_id`);

  ALTER TABLE `subfarm`
	ADD PRIMARY KEY (`subfarm_id`);

  ALTER TABLE `device`
	ADD PRIMARY KEY (`device_id`);

  ALTER TABLE `schedule`
	ADD PRIMARY KEY (`schedule_id`);

  ALTER TABLE `history`
	ADD PRIMARY KEY (`action_time`);

  ALTER TABLE `statistic`
	ADD PRIMARY KEY (`action_time`);


--
-- foreign key
--


  ALTER TABLE `farm`
	ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `subfarm`
	ADD CONSTRAINT `subfarm_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `device`
	ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`subfarm_id`) REFERENCES `subfarm` (`subfarm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `schedule`
	ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `history`
	ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `statistic`
	ADD CONSTRAINT `statistic_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;