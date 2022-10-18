/*
Navicat MySQL Data Transfer

Source Server         : Gogetsaving Live
Source Server Version : 50739
Source Host           : 67.227.174.66:3306
Source Database       : gogetsaving_wp121

Target Server Type    : MYSQL
Target Server Version : 50739
File Encoding         : 65001

Date: 2022-10-07 02:44:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wpmo_login_history`
-- ----------------------------
DROP TABLE IF EXISTS `wpmo_login_history`;
CREATE TABLE `wpmo_login_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `domain_url` longtext CHARACTER SET latin1,
  `user_id` bigint(20) DEFAULT NULL,
  `login_count` bigint(20) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- ----------------------------
-- Records of wpmo_login_history
-- ----------------------------
INSERT INTO `wpmo_login_history` VALUES ('8', '/wp-login.php', '1', '1', '2022-10-06', '1');
INSERT INTO `wpmo_login_history` VALUES ('9', '/au/wp-login.php', '1', '1', '2022-10-06', '1');
INSERT INTO `wpmo_login_history` VALUES ('10', '/au/wp-login.php', '1', '1', '2022-10-05', '1');
INSERT INTO `wpmo_login_history` VALUES ('11', '/au/wp-login.php', '1', '1', '2022-10-05', '1');
INSERT INTO `wpmo_login_history` VALUES ('12', '/wp-login.php', '1', '1', '2022-10-06', '1');
INSERT INTO `wpmo_login_history` VALUES ('13', '/nz/wp-login.php', '1', '1', '2022-10-06', '1');
