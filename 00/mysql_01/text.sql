/*
Navicat MySQL Data Transfer

Source Server         : 118
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : text

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-02 13:14:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_pl
-- ----------------------------
DROP TABLE IF EXISTS `t_pl`;
CREATE TABLE `t_pl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `wzid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_pl
-- ----------------------------
INSERT INTO `t_pl` VALUES ('1', '游客', '<p>你不是SB</p>', '1');
INSERT INTO `t_pl` VALUES ('2', '王经纬', '但是覅哦哦的是你 等级考试绝地逢生', '4');
INSERT INTO `t_pl` VALUES ('4', '王经纬', '这票文章写得实在是太好了，我自愧不如。我恨自愧不如', '2');
INSERT INTO `t_pl` VALUES ('5', '王经纬', '我来发表一篇评论', '3');
INSERT INTO `t_pl` VALUES ('16', '王经纬', '这一篇写得相当不错', '2');
INSERT INTO `t_pl` VALUES ('17', '王经纬', '这一篇写得真是好', '2');
INSERT INTO `t_pl` VALUES ('18', '王经纬', '<p>这是我见过的写得最好的文章</p>', '1');
INSERT INTO `t_pl` VALUES ('19', '王经纬', '<pre>php是世界上最好的语言\r\nC++是世界上第二好的语言\r\n</pre>', '3');
INSERT INTO `t_pl` VALUES ('22', '王大壮', '<p>我叫王大壮</p>', '1');
INSERT INTO `t_pl` VALUES ('25', '王经', '', '2');
INSERT INTO `t_pl` VALUES ('27', '王经纬', '<p>分开之后另一年的春天，记忆像下雪一样溶解。</p>', '18');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `resignname` varchar(20) DEFAULT NULL,
  `resignpsd` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', '王经纬', '123');
INSERT INTO `t_user` VALUES ('2', '王大壮', '233');

-- ----------------------------
-- Table structure for t_wz
-- ----------------------------
DROP TABLE IF EXISTS `t_wz`;
CREATE TABLE `t_wz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `content` mediumtext,
  `kind` varchar(20) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_wz
-- ----------------------------
INSERT INTO `t_wz` VALUES ('1', '我的天空', '王经纬', '<p>&nbsp; 今天是晴天，星期一，我一个人出去买东西，买了好多好多款</p><p>但是我碰到了一个人，他说他是我熟人。</p><p>&nbsp; 明天我继续去买东西，我又发现了许多人啊，我真的真的好开</p><p>啊！</p>', '项目', '2009-01-01 10:10:10');
INSERT INTO `t_wz` VALUES ('2', '我的世界', '王经纬', '电话你撒ui地方是不风格的三跪九叩部分都是根据地方上班广东佛山广东佛山个地方数据库', '新闻', '2010-08-09 10:10:10');
INSERT INTO `t_wz` VALUES ('3', '平凡的你', '王经纬', '对方公司的控股方但是感觉的方式会计分多少 ', '新闻', '2011-09-09 10:10:10');
INSERT INTO `t_wz` VALUES ('4', '的萨芬广泛的', '王经纬', '分公司的歌对方是个健康的房是刚开始的风景附近开了但是不能高科技发第三个房间看电视健康个地方数据库个地方就开始不能感觉到发送给对方就开始你看过发的数据库富家大室尽快给对方手机卡个地方监控设备你感觉地方三个地方就是不赶快发多少规范觉得是接口规范圣诞节广泛的技术概念净空法师国际快递放假开个包间范德萨更加快乐的方式', '项目', '2016-02-05 09:55:33');
INSERT INTO `t_wz` VALUES ('18', '哇和你的方式', '王经纬', '<p>发第三个公司的飞机卡付款了冬季施工分</p><p>铁打的流水，手打的我自己</p>', '情感', '2016-02-21 21:38:25');
INSERT INTO `t_wz` VALUES ('28', '范德萨发', '王大壮', '<p>范德萨发的撒娇哦付款呢电视剧咖啡大家看撒</p>', '情感', '2016-02-23 17:14:03');
INSERT INTO `t_wz` VALUES ('29', '发电设备发的哈睡觉发动机撒', '王大壮', '<p>范德萨发电视剧啊废话啊是的好的撒辅导活动萨芬V还是大范德萨啊放假打算vb回复独家试爱富华大厦vba分大家撒V发的撒酒疯vb的事啊</p>', '情感', '2016-02-23 17:14:25');
INSERT INTO `t_wz` VALUES ('33', '了考虑考虑；模拟', '王经纬', '<ul><li>&nbsp;尽快回来</li><li>加快了；吗</li><li>目录；吗了；看</li><li>接口；吗；卡梅伦了；k</li></ul>', '情感', '2016-02-25 16:10:32');
