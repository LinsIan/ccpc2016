-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jul 10, 2012, 03:15 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `ccpc`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `bulletin`
-- 

CREATE TABLE `bulletin` (
  `id` int(11) NOT NULL auto_increment,
  `time` varchar(20) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

-- 
-- 列出以下資料庫的數據： `bulletin`
-- 

INSERT INTO `bulletin` VALUES (1, '3/28', '<span style="color: red;">2012 中區大專院校程式設計競賽</span> 現已開放報名。');
INSERT INTO `bulletin` VALUES (2, '3/28', '報名時間為即日起至4/18日，欲報從速!');
INSERT INTO `bulletin` VALUES (3, '3/28', '報名採計方式︰若該校報名隊伍超過四隊，擇依匯款時間採前四隊，並退款給後報的隊伍');
INSERT INTO `bulletin` VALUES (5, '4/13', '報名截止日為<span style="color: red;">4月18日(星期三)</span>，時間已經剩下不到一週了。獎金優渥，請想參加的同學們儘快報名噢! ');
INSERT INTO `bulletin` VALUES (7, '4/14', '競賽總隊伍數只取先報名的前<span style="color: red;">20隊</span>，請有興趣的隊伍儘速報名，以免向隅。');
INSERT INTO `bulletin` VALUES (8, '4/15', '系所:<span style="color: red;"> [彰化師範大學資訊工程學系] </span>報名隊伍已達上限。');
INSERT INTO `bulletin` VALUES (9, '4/18', '系所:<span style="color: red;"> [國立成功大學資訊工程學系] </span>報名隊伍已達上限。');
INSERT INTO `bulletin` VALUES (10, '4/18', '由於本週是大部分學校的期中考周，為了方便各位同學能有更充裕的時間報名，因此報名截止日將延至<span style="color: red;">4/20(日)</span>。');
INSERT INTO `bulletin` VALUES (11, '4/19', '隊伍編號#8因逾期未繳費，已被取消資格。');
INSERT INTO `bulletin` VALUES (12, '4/21', '我們的報名已正式截止，尚未繳費的隊伍請在4/23前繳費完畢，並在4/25前寄至主辦單位信箱，謝謝。');
INSERT INTO `bulletin` VALUES (13, '4/21', '下週日(4/29)就是競賽日了，各位隊伍最近請密切注意首頁上的公告，有任何注意事項皆會發布在此。競賽地點為<span style="color: red;"> 彰化師範大學進德校區 圖書館五樓(電算中心)</span>，詳細位址請參考導覽列上的「交通資訊」及「地圖」。');
INSERT INTO `bulletin` VALUES (14, '4/23', '修改部份活動流程的細節，請各位參賽者稍微注意一下。');
INSERT INTO `bulletin` VALUES (15, '4/27', '賽前通知已寄至各隊伍的報名信箱，請各隊記得收信。');
INSERT INTO `bulletin` VALUES (16, '4/27', '2012中區程式設計競賽即將於4/29(日)舉辦。這周天氣不是很穩定，各位參賽者前來時可以多帶件外套，以免著涼。參賽者<span style="color: red;">報到時請準備學生證或附照片的證件</span>，報到時會一併給繳費收據。');
INSERT INTO `bulletin` VALUES (17, '4/27', '若有搭公車或計程車需求的參賽者，可先參考<a class="inlinebox" href="./img/traffic.jpg">此份資料</a>，資料內有公車站至學校的路線圖及計程車電話。');
INSERT INTO `bulletin` VALUES (18, '4/30', '本次競賽的名次已公佈在「競賽結果」中。');
INSERT INTO `bulletin` VALUES (19, '4/30', '本次競賽的試題本已公佈在「活動花絮」中。');
INSERT INTO `bulletin` VALUES (20, '5/8', '本次競賽的照片已公佈在「活動花絮」中。');
INSERT INTO `bulletin` VALUES (21, '5/10', '「活動花絮」有更高解析度的相片可供下載，目前提供 1296x864 及 2592x1728 版本的照片下載。');

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `id` int(10) NOT NULL auto_increment,
  `stud_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `stud_id` varchar(30) collate utf8_unicode_ci NOT NULL,
  `team_id` int(10) NOT NULL,
  PRIMARY KEY  (`id`,`stud_name`,`stud_id`),
  UNIQUE KEY `stud_name` (`stud_name`,`stud_id`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=100 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES (1, '李政懋', 'S0054004', 1);
INSERT INTO `member` VALUES (2, '謝曉湖', 'S0054013', 1);
INSERT INTO `member` VALUES (3, '林政宏', 'S0054024', 1);
INSERT INTO `member` VALUES (4, '李政其', 'B9915004', 2);
INSERT INTO `member` VALUES (5, '李書廷', 'B9915007', 2);
INSERT INTO `member` VALUES (6, '曾宇正', 'B9915009', 2);
INSERT INTO `member` VALUES (7, '洪仕軒', 'B9915005', 3);
INSERT INTO `member` VALUES (8, '王鏡霖', 'B9915006', 3);
INSERT INTO `member` VALUES (9, '顏天明', 'B9915044', 3);
INSERT INTO `member` VALUES (11, '郭人維', '995002518', 4);
INSERT INTO `member` VALUES (12, '梁世平', '498720923', 5);
INSERT INTO `member` VALUES (13, '林秉睿', '498720240', 5);
INSERT INTO `member` VALUES (14, '金翼', '498721000', 5);
INSERT INTO `member` VALUES (66, '林婷涵', 'F74971099', 6);
INSERT INTO `member` VALUES (65, '黃品介', 'F74976196', 6);
INSERT INTO `member` VALUES (64, '李冠賢', 'F74976269', 6);
INSERT INTO `member` VALUES (26, '陳庭偉', 'S9954036', 7);
INSERT INTO `member` VALUES (25, '蔡承達', 'S9954034', 7);
INSERT INTO `member` VALUES (24, '張維元', 'S9954016', 7);
INSERT INTO `member` VALUES (99, '吳駿平', '39917059', 21);
INSERT INTO `member` VALUES (98, '張翔承', '39917091', 21);
INSERT INTO `member` VALUES (97, '莊侑錡', '39917022', 21);
INSERT INTO `member` VALUES (30, '陳皇綸', 'S9954030', 9);
INSERT INTO `member` VALUES (31, '林祺傑', 'S9954032', 9);
INSERT INTO `member` VALUES (32, '楊鎧謙', 'S9954019', 9);
INSERT INTO `member` VALUES (33, '黃勁博', '400410056', 10);
INSERT INTO `member` VALUES (34, '徐上晴', '400410058', 10);
INSERT INTO `member` VALUES (35, '蔣佳紋', '400410030', 10);
INSERT INTO `member` VALUES (50, '孫維嶸', 'D9829101', 11);
INSERT INTO `member` VALUES (49, '彭語柔', 'D9828999', 11);
INSERT INTO `member` VALUES (48, '呂蘊宸', 'D9829025', 11);
INSERT INTO `member` VALUES (39, '王俊凱', '9860041', 12);
INSERT INTO `member` VALUES (40, '邱毅鋒', '98610015', 12);
INSERT INTO `member` VALUES (41, '徐豪駿', '98610044', 12);
INSERT INTO `member` VALUES (51, '郭至軒', 'F74976324', 13);
INSERT INTO `member` VALUES (52, '曾楷涵', 'F74982278', 13);
INSERT INTO `member` VALUES (53, '尤聖棨', 'F74986133', 13);
INSERT INTO `member` VALUES (54, '楊宜澤', '9762114', 14);
INSERT INTO `member` VALUES (55, '楊易霖', '9960105', 15);
INSERT INTO `member` VALUES (56, '魏偉哲', '9960117', 15);
INSERT INTO `member` VALUES (57, '潘玫樺', '9960125', 15);
INSERT INTO `member` VALUES (58, '邱俊運', 'F74992184', 16);
INSERT INTO `member` VALUES (59, '許冠崙', 'F74996235', 16);
INSERT INTO `member` VALUES (60, '陸品丞', 'F74996405', 16);
INSERT INTO `member` VALUES (67, '王英旭', 'F74971722', 17);
INSERT INTO `member` VALUES (68, '呂宜龍', 'F74991073', 17);
INSERT INTO `member` VALUES (69, '詹尚倫', 'F74991081', 17);
INSERT INTO `member` VALUES (70, '楊翔雲', '4100056008', 18);
INSERT INTO `member` VALUES (71, '方翊宸', '4100056009', 18);
INSERT INTO `member` VALUES (72, '林竣惟', '4100056010', 18);
INSERT INTO `member` VALUES (73, '蔡政廷', 'AM992073', 19);
INSERT INTO `member` VALUES (74, '王士豪', 'AM992122', 19);
INSERT INTO `member` VALUES (75, '邱景憶', '99406112', 20);
INSERT INTO `member` VALUES (76, '劉宇倫', '99406009', 20);

-- --------------------------------------------------------

-- 
-- 資料表格式： `message`
-- 

CREATE TABLE `message` (
  `msg_id` int(10) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `post_ip` varchar(15) collate utf8_unicode_ci NOT NULL,
  `post_date` varchar(20) collate utf8_unicode_ci NOT NULL,
  `reply` text collate utf8_unicode_ci NOT NULL,
  KEY `msg_id` (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- 列出以下資料庫的數據： `message`
-- 

INSERT INTO `message` VALUES (1, 'longbiau', '活動流程時間', '請問流程時間是否有誤？我看比賽開始只有五點到五點半共半小時而已，而進場卻要五小時。', '10.83.3.67', '2012-03-28 16:29:23', '謝謝提醒，已更正!');
INSERT INTO `message` VALUES (2, 'xx', '請問可以跨校組隊嗎？', '請問可以跨校組隊嗎？', '1.34.12.95', '2012-03-28 18:14:33', '因為考慮到每系有名額限制，所以不開放跨校組隊。');
INSERT INTO `message` VALUES (3, '用功', '關於題目?', '題目賽後會公佈嗎？', '27.243.30.1', '2012-03-28 23:56:41', '會的，敬請期待!');
INSERT INTO `message` VALUES (4, 'Vincent', '特殊系籍問題', '如果是逢甲大學資訊電機學院不分系榮譽班的學生，大二分流到資電學院五系，請問可以組隊以不分系的名義報名嗎? ', '140.134.18.147', '2012-04-10 14:30:47', '可以，但請務必確認隊員都曾是不分系榮譽班的學生~');
INSERT INTO `message` VALUES (5, ' Vincent', '系所欄位不夠用..', '我輸入本系全稱"資訊電機學院不分系榮譽班"，系統顯示系所名稱需要長於兩個字以上，目前暫時輸入簡稱"資電學院不分系榮譽班"，請這個能夠修正嗎?', '114.46.142.128', '2012-04-15 15:43:45', '已經為您修正! 不好意思');
INSERT INTO `message` VALUES (6, 'Vincent', 'JDK ver', '請問伺服器的JDK版本是1.6還是1.7呢？\n賽場提供的IDE是1.7版本的\n', '120.107.175.11', '2012-04-29 17:39:34', '是1.7版本的噢');
INSERT INTO `message` VALUES (7, 'longbiau', '心得文', '      此文是我以身為選手的主觀立場發表參加中程盃的心得。\n\n      首先要感謝主辦單位為我們準備了一個競賽的舞台，讓每個隊伍有機會表現自己的能力。在賽前還發E-mail貼心地叮嚀選手需要準備證件、雨具和保暖衣物，可見您們的用心和對選手們的重視。\n\n      再來要感謝每位在場的工作人員們，謝謝你們撥出時間為我們服務，讓整個競賽過程中維持著良好的品質和秩序，相信你們的付出是值得的。', '10.83.3.67', '2012-05-03 16:13:47', '謝謝您對中程盃所有工作人員的鼓勵。');
INSERT INTO `message` VALUES (8, 'longbiau', '心得文', '      接著是現場解題板使用了笑臉便利貼代替了氣球，我真的覺得蠻有趣的，也確實傳達了該有的解題訊息。\n\n      關於題目的I/O過於複雜的問題相信許多選手們都反應過了，應當讓選手把心思專注於演算法的設計而非無關緊要的I/O空白和文字，若不慎co錯字，那沒必要的penalty和debug時著眼的方向，對於隊伍而言都是相當痛的。\n\n      還有就是競賽環境的問題，蠻建議將場地提供的機器環境事先明確標示在官方網頁上，如硬體環境(CPU,RAM)、軟體環境(OS,IDE、Compiler、pc^2等的確切版本)。', '10.83.3.67', '2012-05-03 16:14:13', '最近在主辦單位在整理回饋單也有聽到許多不同的聲音，氣球和便利貼都各有人支持。主辦單位用這樣的方式也是希望能在沉悶的比賽中增添一點小趣味。大家喜歡的話那是在好不過的了!\r\n\r\n您的建議我們虛心領教了，在IO複雜的問題主辦單位會特別重視。因為歷次比賽題目來源皆是交由本系教授命題，我們會在下屆籌劃時，特別提醒命題教授注意這個方面。');
INSERT INTO `message` VALUES (9, 'longbiau', '心得文', '      整體而言CCPC辦得相當出色，我個人希望CCPC可以繼續傳承下去！\n\n      最後我向主辦單位的幹部們致上敬意，也再向全體人員們致上謝意！', '10.83.3.67', '2012-05-03 16:14:25', '謝謝您的肯定，我們承諾往後的中程盃一定會越來越好!');

-- --------------------------------------------------------

-- 
-- 資料表格式： `team`
-- 

CREATE TABLE `team` (
  `team_id` int(10) NOT NULL auto_increment,
  `team_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `university` varchar(50) collate utf8_unicode_ci NOT NULL,
  `department` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `cellphone` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `register_ip` varchar(15) collate utf8_unicode_ci NOT NULL default '0.0.0.0',
  `register_date` varchar(20) collate utf8_unicode_ci NOT NULL,
  `is_paid` enum('0','1') collate utf8_unicode_ci NOT NULL default '0',
  `remit_account` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`team_id`,`team_name`,`university`,`department`,`email`),
  UNIQUE KEY `team_name` (`team_name`,`university`,`department`,`email`),
  UNIQUE KEY `email` (`email`,`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

-- 
-- 列出以下資料庫的數據： `team`
-- 

INSERT INTO `team` VALUES (1, '酷斯拉我同學', '國立彰化師範大學', '資訊工程學系', 'longbiau@hotmail.com', '0988214857', 'zxcvfdsaqwer', '120.107.192.220', '2012-04-06 12:43:47', '1', '李政懋');
INSERT INTO `team` VALUES (2, '不要緊張', '國立台灣科技大學', '資訊工程系', 'nucleargod823543@gmail.com', '0910774969', 'ntustcsie', '140.118.234.158', '2012-04-06 18:17:13', '1', '李政其');
INSERT INTO `team` VALUES (3, 'Jojllman', '國立台灣科技大學', '資訊工程系', 'B9915005@mail.ntust.edu.tw', '0917039133', 'ntustcsie', '140.118.234.158', '2012-04-06 18:24:39', '1', '洪仕軒');
INSERT INTO `team` VALUES (4, 'HITORI_bocchiwasabishii', '國立中央大學', '資訊工程學系', 'inker610566@yahoo.com.tw', '0972117046', 'worship', '140.115.213.26', '2012-04-07 23:14:58', '1', '郭人維');
INSERT INTO `team` VALUES (5, '氣球不是這樣拿的', '私立靜宜大學', '資訊工程學系', 'cahry12@gmail.com', '0975016397', '70812345', '140.128.9.102', '2012-04-12 14:03:43', '1', '梁世平');
INSERT INTO `team` VALUES (6, 'リラックマ', '國立成功大學', '資訊工程學系', 'ivyyhere@gmail.com', '0920560001', 'ifcifc', '114.39.191.147', '2012-04-18 00:59:47', '1', '林婷涵');
INSERT INTO `team` VALUES (7, '資源回收筒', '國立彰化師範大學', '資訊工程系', 'v123582@gmail.com', '0963243850', '000000', '114.41.210.213', '2012-04-14 23:49:18', '1', '');
INSERT INTO `team` VALUES (21, 'NEMU團隊', '國立勤益科技大學', '資訊工程系', 's39917059@student.ncut.edu.tw', '0926894861', '23924505', '140.128.87.191', '2012-04-20 19:36:11', '1', '張翔承');
INSERT INTO `team` VALUES (9, 'Huang Lun', '國立彰化師範大學', '資訊工程學系', 'odek53r@gmail.com', '0937394098', 'abcd12', '120.107.179.252', '2012-04-15 00:27:17', '1', '');
INSERT INTO `team` VALUES (10, '上紋力永遠隊', '國立中正大學', '資訊工程系', 'iceman1216i@gmail.com', '0911498396', 'csie2012', '140.123.220.127', '2012-04-15 15:26:21', '1', '黃勁博');
INSERT INTO `team` VALUES (11, 'FCU Turkeys', '逢甲大學', '資訊電機學院不分系榮譽班', 'yunchen8026@gmail.com', '0955599588', '987654321', '122.117.12.76', '2012-04-16 20:32:06', '1', '呂蘊宸');
INSERT INTO `team` VALUES (12, 'Don''t Stop', '國立彰師範大學', '資訊工程學系', 'kailight5@gmail.com', '0937278880', 'KAIm06zp4', '120.107.193.28', '2012-04-15 16:14:54', '1', '');
INSERT INTO `team` VALUES (13, 'OptimusPrime', '國立成功大學', '資訊工程學系', 'jay_s6215@hotmail.com', '0972363310', 'jay800301', '140.116.101.132', '2012-04-16 21:12:49', '1', '曾楷涵');
INSERT INTO `team` VALUES (14, 'CakeLab', '國立清華大學', '資訊工程學系', 'lubrige2@gmail.com', '0918967867', 'th13td', '111.251.193.77', '2012-04-16 22:56:45', '1', '楊宜澤');
INSERT INTO `team` VALUES (15, 'XDD', '國立清華大學', '電機資訊學院學士班', 'forst.and.flame11235@gmail.com', '0934189510', '123456789abc', '140.114.200.13', '2012-04-16 23:32:02', '1', '楊易霖');
INSERT INTO `team` VALUES (16, '249PF', '國立成功大學', '資訊工程學系', 'yl931905@gmail.com', '0933434913', 'a3454574', '111.255.191.223', '2012-04-17 21:55:13', '1', '邱俊運');
INSERT INTO `team` VALUES (17, 'First kill', '國立成功大學', '資訊工程學系', 'daniel199010@yahoo.com.tw', '0933933942', 'ultimate123', '140.116.103.170', '2012-04-18 02:41:31', '1', '王英旭');
INSERT INTO `team` VALUES (18, 'HelpMe', '國立中興大學', '資訊科學與工程學系', 'morris821028@gmail.com', '0921953021', '203583', '140.120.222.65', '2012-04-18 08:25:29', '1', '楊翔雲');
INSERT INTO `team` VALUES (19, 'Jackpot', '私立真理大學', '資訊工程系', 'eoyfmosd@yahoo.com.tw', '0983486685', '0983486685', '210.60.11.229', '2012-04-18 15:35:50', '1', '蔡政廷');
INSERT INTO `team` VALUES (20, '答案全隊', '私立建國科技大學', '資訊管理系', 'aak20a@yahoo.com.tw', '0923604978', 'a0147258369', '111.253.49.95', '2012-04-19 18:00:06', '1', '邱景憶');
