-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2020 at 01:46 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.11-4+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmangofinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `prefix_customer`
--

CREATE TABLE `prefix_customer` (
  `id` int(11) NOT NULL,
  `cust_no` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cust_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cust_dob` int(11) DEFAULT NULL,
  `custsex_id` int(11) NOT NULL,
  `cust_address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cust_phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cust_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cust_occup` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `custmarried_id` int(11) NOT NULL,
  `cust_heir` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cust_heirrel` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cust_lengthres` int(11) DEFAULT NULL,
  `cust_since` int(11) DEFAULT NULL,
  `custsick_id` int(11) DEFAULT NULL,
  `cust_lastsub` int(11) DEFAULT NULL,
  `cust_active` int(1) NOT NULL DEFAULT '0',
  `cust_lastupd` int(11) DEFAULT NULL,
  `cust_pic` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fk_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_customer`
--

INSERT INTO `prefix_customer` (`id`, `cust_no`, `cust_name`, `cust_dob`, `custsex_id`, `cust_address`, `cust_phone`, `cust_email`, `cust_occup`, `custmarried_id`, `cust_heir`, `cust_heirrel`, `cust_lengthres`, `cust_since`, `custsick_id`, `cust_lastsub`, `cust_active`, `cust_lastupd`, `cust_pic`, `fk_users_id`) VALUES
(1, '001/2016', 'John Wycliff', -1262307600, 1, 'Yorkshire', '031 12 1384', '', 'Theologian', 1, '', '', NULL, 1140000000, 0, 1630718000, 1, 1457431040, 'uploads/photos/customers/cust1_146x190.jpg', 1),
(2, '002/2006', 'Jan Hus', 78793200, 1, 'Prague', '0607 1415', '', 'Reformer', 2, 'Joh. Joseph Hu&szlig;', 'Father', NULL, 1141776000, 0, 1456268400, 1, 1457431296, 'uploads/photos/customers/cust2_146x190.jpg', 1),
(3, '003/2006', 'Martin Luther', 437266800, 1, 'Geneva', '018 02 1546', '', 'Reformer', 2, 'Katharina von Bora', 'Wife', NULL, 1141884000, 5, 1475963995, 1, 1507576835, 'uploads/photos/customers/cust3_146x190.jpg', 1),
(4, '004/2006', 'Huldrych Zwingli', 441759600, 1, 'Zurich', '011 10 1531', '', 'Reformer', 2, 'Anna Reinhart', 'Wife', NULL, 1155552000, 0, 1507500000, 1, 1457433917, 'uploads/photos/customers/cust4_146x190.jpg', 1),
(5, '005/2006', 'Martin Bucer', 689814000, 1, 'Strasbourg', '010 31551', '', 'Reformer', 2, 'Elisabeth Silbereisen', 'Wife', NULL, 1159440000, 0, 1426990400, 1, 1457434157, 'uploads/photos/customers/cust5_146x190.jpg', 1),
(6, '006/2015', 'Philip Melanchthon', 856047600, 1, 'Wittenberg', '019 041560', '', 'Reformer', 2, 'Katharina Krapp', 'Wife', NULL, 1163328000, 0, 1622942000, 1, 1457434738, 'uploads/photos/customers/cust6_146x190.jpg', 1),
(7, '007/2006', 'Heinrich Bullinger', -2065654800, 1, 'Zurich', '017 091575', '', 'Reformer', 2, 'Anna Adlischweiler', 'Wife', NULL, 1167216000, 0, 1456190000, 1, 1457434831, 'uploads/photos/customers/cust7_146x190.jpg', 1),
(8, '008/2006', 'Johannes Calvin', -1908579600, 1, 'Geneva', '027 051564', '', 'Reformer', 2, 'Idelette de Bure', 'Wife', NULL, 1171104000, 0, 1425077995, 1, 1458667201, 'uploads/photos/customers/cust8_146x190.jpg', 1),
(9, '009/2006', 'John Knox', -1767229200, 1, 'Edinburgh', '024 111572', '', 'Reformer', 1, '', '', NULL, 1174992000, 0, 1430446400, 1, 1457435038, 'uploads/photos/customers/cust9_146x190.jpg', 1),
(10, '010/2006', 'Caspar Olevian', -1053824400, 1, 'Heidelberg', '015 031587', '', 'Reformer', 2, 'Philippine von Metz', 'Wife', NULL, 1178880000, 0, 1508104800, 1, 1457435215, 'uploads/photos/customers/cust10_146x190.jpg', 1),
(11, '011/2006', 'Nydius Melvinus', -341802000, 3, 'Kiziba Kikyusa Archdeaconry', '0772-968414', 'huxpoll@yahoo.com', 'Preacher', 2, 'Mrs. Luna Mwamiza', 'Wife', NULL, 1182768000, 1, 1402174400, 0, 1454656213, NULL, 1),
(12, '012/2006', 'Joshua Vandenburg  ', -552448800, 1, 'Kiziba Kikyusa Arch', '0772-551662', '', 'Clergy Man', 2, '', '', NULL, 1186656000, 0, 1469138400, 1, 1420070400, NULL, 1),
(13, '013/2006', 'Melania Mitchem  ', 158364000, 1, 'Kalere', '0782-380513', '', 'Clergy', 1, '', '', NULL, 1190544000, 0, 1413902400, 0, 1420070400, NULL, 1),
(14, '014/2006', 'Clemmie Ellithorpe  ', -929930400, 1, 'Kazinga Butuntumula', '021513', '', 'Clergy Man', 2, '', '', NULL, 1194432000, 0, 1469138400, 1, 1469178601, NULL, 1),
(15, '015/2006', 'Kristofer Artis  ', -90000, 1, 'Kisenyi', '0', '', '', 0, '', '', NULL, 1198320000, 0, 1508104800, 1, 1452688368, NULL, 1),
(16, '016/2007', 'Lulu Obando  ', -440989200, 7, 'Sempa Parish ', '0782-096008', '', 'Clergy Man', 2, '', '', NULL, 1202208000, 0, 1436424400, 0, 1587103716, NULL, 1),
(17, '017/2006', 'Kai Soriano  ', -86403600, 1, 'Luteete', '02314 549945', '', 'Pastor / Teacher', 2, '', '', NULL, 1206096000, 0, 1437358400, 1, 1453822238, NULL, 1),
(18, '018/2006', 'Lynne Pratico  ', 160182000, 1, 'Bwaziba', '0891 128461', '', 'Clergy / Farmer', 2, '', '', NULL, 1209984000, 0, 1418222400, 0, 1453145549, NULL, 1),
(19, '019/2006', 'Noella Holyfield  ', -633578400, 1, 'Kasana -Kiwogozi', '0772-984673', '', 'Clergy Man', 2, '', '', NULL, 1213872000, 0, 1439086400, 1, 1420070400, NULL, 1),
(20, '020/2006', 'Berry Steve  ', -256525200, 1, 'Bombo', '0782-453477', '', 'Clergy Man', 2, '', '', NULL, 1217760000, 0, 1507672800, 1, 1427241600, NULL, 2),
(21, '021/2006', 'Gregorio Schurr  ', -479527200, 1, 'Kasiso', '0772-532964', '', 'Clergy Man', 2, '', '', NULL, 1221648000, 0, 1440814400, 1, 1420070400, NULL, 1),
(22, '022/2006', 'Arnetta Lobato', -744170400, 2, 'Bakijulura', '0785 368641', '', 'Retired', 3, '', '', NULL, 1225536000, 1, 1424991595, 1, 1458718116, NULL, 1),
(23, '023/2006', 'Ayana Mohammed  ', -368762400, 1, 'St. Mark Luweero', '0772-183125', '', 'Clergy Man', 2, '', '', NULL, 1229424000, 0, 1442542400, 1, 1420070400, NULL, 1),
(24, '024/2006', 'Conrad Keitt  ', -748404000, 1, 'Namusale', NULL, '', 'Clergy Man', 2, '', '', NULL, 1233312000, 0, 1443406400, 1, 1420070400, NULL, 1),
(25, '025/2006', 'Stephine Leitner  ', -559875600, 1, 'Buwana', '0773142217', '', 'Clergy Man', 2, '', '', NULL, 1237200000, 0, 1444270400, 0, 1458639837, NULL, 1),
(26, '026/2007', 'Tequila Lino  ', -597549600, 1, 'Sekamuli Area', '0782-880521', '', 'Clergy Man', 2, '', '', NULL, 1241088000, 0, 1445134400, 1, 1420070400, NULL, 1),
(27, '027/2007', 'Deena Hawes  ', -932349600, 1, 'Zirobwe', NULL, '', 'Clergy Man', 2, '', '', NULL, 1244976000, 0, 1445998400, 1, 1420070400, NULL, 1),
(28, '028/2006', 'Kellye Whitley  ', -363924000, 1, 'Lukomera', '0779-253864', '', 'Clergy Man / Teacher', 2, '', '', NULL, 1248864000, 0, 1446862400, 0, 1507628187, NULL, 1),
(29, '029/2007', 'Judi Spillman  ', -573703200, 1, 'Balitta- Lwogi', '0782-559766', '', 'Clergy Man', 2, '', '', NULL, 1252752000, 0, 1447726400, 1, 1420070400, NULL, 1),
(30, '030/2006', 'Lion of Juda Secondary School', -3600, 6, 'Luweero', '0251-1213159', '', '', 0, 'Dr. Raul Philips', 'Headmaster', NULL, 1256640000, 0, 1507672800, 1, 1454954625, NULL, 1),
(31, '031/2006', 'Robena Burget  ', -90000, 5, 'Kasana', '02589 452103', '', 'Clergy Man', 2, '', '', NULL, 1260528000, 0, 1449454400, 0, 1454655778, NULL, 1),
(32, '032/2006', 'Milda Mcamis  ', -427860000, 1, 'Bweyeeyo-Luweero', NULL, '', 'Clergy Man', 2, '', '', NULL, 1264416000, 0, 1450318400, 1, 1420070400, NULL, 1),
(33, '033/2006', 'Alec Kearl  ', -336794400, 1, 'Nakaseke', '0773-974456', '', 'Pastor / Teacher', 2, '', '', NULL, 1268304000, 0, 1451182400, 1, 1427241600, NULL, 3),
(34, '034/2006', 'Ngoc Alcantar  ', -185335200, 1, 'Kasana Kvule-Luweero', NULL, '', 'Clergy Man', 2, '', '', NULL, 1272192000, 0, 1452046400, 1, 1420070400, NULL, 1),
(35, '035/2006', 'Sharen Harr  ', -33271200, 2, 'Luweero Town Council', '0772-442574', '', 'Accounts Clerk', 2, '', '', NULL, 1276080000, 0, 1452910400, 1, 1420070400, NULL, 1),
(36, '036/2006', 'Kryshtam Rebem  ', -320115600, 2, 'Kungu-Busula', '09125 - 54138', '', '', 2, '', '', NULL, 1279968000, 0, 1453774400, 1, 1454959237, NULL, 1),
(37, '037/2006', 'Ronni Knoles  ', -213069600, 1, 'Kungu-Busula', '0772-365951', '', 'Social Worker', 2, '', '', NULL, 1283856000, 0, 1454638400, 1, 1420070400, NULL, 1),
(38, '038/2006', 'Ela Denmark  ', 401230800, 2, 'Kungu-Busula', NULL, '', 'Counsellor / Volunteer', 1, '', '', NULL, 1287744000, 0, 1455502400, 1, 1420070400, NULL, 1),
(39, '039/2006', 'Grace Hamer  ', 55717200, 1, 'Busula', '0701-855942', '', 'Road Supervisor', 1, '', '', NULL, 1291632000, 0, 1456366400, 1, 1420070400, NULL, 1),
(40, '040/2006', 'Emma Bermea  ', -340855200, 2, 'Wobulenzi', NULL, '', 'Teacher', 2, '', '', NULL, 1295520000, 0, 1457230400, 1, 1420070400, NULL, 1),
(41, '041/2006', 'Rosana Breit  ', 534549600, 1, 'Busula', NULL, '', 'Student', 1, '', '', NULL, 1299408000, 0, 1458094400, 1, 1420070400, NULL, 1),
(42, '042/2006', 'Evelynn Mickles  ', 292543200, 2, 'Kungu-Busula', NULL, '', 'Trader - Retail', 2, '', '', NULL, 1303296000, 0, 1458958400, 1, 1420070400, NULL, 1),
(43, '043/2006', 'Tonie Maroney  ', 141858000, 2, 'Bendegere Namusaale', NULL, '', 'Customer Care Manager', 2, '', '', NULL, 1307184000, 0, 1459822400, 1, 1420070400, NULL, 1),
(44, '044/2006', 'Fallon Rosendahl  ', -46231200, 1, 'Buwana Kinyogoga', NULL, '', 'Clergy Man', 2, '', '', NULL, 1311072000, 0, 1460686400, 0, 1427241600, NULL, 3),
(45, '045/2006', 'Renato Loudon  ', -361072800, 1, 'Kaswa- Busula', '0774-764113', '', 'Lay-Reader', 2, '', '', NULL, 1314960000, 0, 1461550400, 1, 1420070400, NULL, 1),
(46, '046/2006', 'Garth Swartwood  ', -184298400, 2, 'Kikoma C/U Wobulenzi Tc', NULL, '', 'Lay-Reader', 2, '', '', NULL, 1318848000, 0, 1462414400, 1, 1420070400, NULL, 1),
(47, '047/2006', 'Joannie Gust  ', 75589200, 2, 'Kikoma Wobulenzi', NULL, '', 'Peasant - Farmer', 2, '', '', NULL, 1322736000, 0, 1463278400, 1, 1420070400, NULL, 1),
(48, '048/2006', 'Fermina Collazo  ', -240890400, 2, 'Kikona Wobulenzi Central', NULL, '', 'Peasant / Farmer', 2, '', '', NULL, 1326624000, 0, 1464142400, 1, 1420070400, NULL, 1),
(49, '049/2006', 'Lavenia Byler  ', -252468000, 1, 'Kayindu C/U', '0785-772868', '', 'Lay-Reader', 2, '', '', NULL, 1330512000, 0, 1465006400, 1, 1420070400, NULL, 1),
(50, '050/2006', 'Patrick Mukasa', 167439600, 1, 'Katuugo Parish', '0782-447156', '', 'Lay-Reader / Tailor', 2, '', '', NULL, 1334400000, 0, 1507672800, 1, 1460549411, NULL, 1),
(51, '051/2008', 'Alicia Wehner  ', -207453600, 2, 'Waluleeta Makulubita', '0782-461460', '', 'Trainer / Social Worker', 2, '', '', NULL, 1338288000, 0, 1466734400, 1, 1420070400, NULL, 1),
(52, '052/2006', 'Ocie Edds  ', -605412000, 1, 'Administrator Luweero Diocese', NULL, '', 'Diocesan Bishop', 2, '', '', NULL, 1342176000, 0, 1467598400, 1, 1420070400, NULL, 1),
(53, '053/2006', 'Darcy Read  ', 309736800, 2, 'Luwero TC', NULL, '', 'Secretary', 1, '', '', NULL, 1346064000, 0, 1468462400, 1, 1420070400, NULL, 1),
(54, '054/2006', 'Augustina Shuman  ', -244605600, 2, 'Kaswa- Busula', NULL, '', 'Lay-Reader', 1, '', '', NULL, 1349952000, 0, 1469326400, 1, 1420070400, NULL, 1),
(55, '055/2009', 'Catherine Adler  ', -3600, 3, 'Luweero Diocese', '0785 368641', '', '', 3, '', '', NULL, 1353840000, 3, 1470190400, 1, 1454572218, NULL, 1),
(56, '056/2007', 'Shanae Bello  ', 77144400, 2, 'Luweero Boys School', NULL, '', 'Teacher', 1, '', '', NULL, 1357728000, 0, 1471054400, 1, 1420070400, NULL, 1),
(57, '057/2006', 'Ferne Munson  ', -7200, 1, 'Bweyeyo', NULL, '', 'Lay-Reader', 2, '', '', NULL, 1361616000, 0, 1471918400, 0, 1427241600, NULL, 3),
(58, '058/2006', 'Ja Nordby  ', -7200, 2, 'Kungu- Kikoma', NULL, '', 'Housewife', 2, '', '', NULL, 1365504000, 0, 1472782400, 1, 1420070400, NULL, 1),
(59, '059/2006', 'Illa Penaflor  ', -179632800, 2, 'Kiwogozi', '0772-662202', '', 'Teacher / MP', 0, '', '', NULL, 1369392000, 0, 1473646400, 1, 1420070400, NULL, 1),
(60, '060/2007', 'Annabelle Bradham  ', -455763600, 5, 'Kiwoko Arch', '0772-657419', '', 'Clergy Man', 2, '', '', NULL, 1373280000, 0, 1474510400, 1, 1454655767, NULL, 1),
(61, '061/2006', 'Tanner Wake  ', -539143200, 1, 'Bukalabi Parish', '0752-631706', '', 'Clergy Man', 2, '', '', NULL, 1377168000, 0, 1475374400, 1, 1420070400, NULL, 1),
(62, '062/2007', 'Cristobal Passman  ', -399088800, 2, 'Luteete Arch', NULL, '', 'Housewife', 2, '', '', NULL, 1381056000, 0, 1476238400, 1, 1420070400, NULL, 1),
(63, '063/2007', 'Rosita Pankratz  ', -394077600, 2, 'Ndejje Village', NULL, '', 'Peasant / Farmer', 2, '', '', NULL, 1384944000, 0, 1477102400, 1, 1420070400, NULL, 1),
(64, '064/2007', 'Angila Gauldin  ', 404949600, 2, 'Nalinya Lwantale Girls P/S', NULL, '', 'Teacher', 1, '', '', NULL, 1388832000, 0, 1477966400, 1, 1420070400, NULL, 1),
(65, '065/2007', 'Jerrica Darnell  ', 534981600, 1, 'Ndejje- Sambwe', NULL, '', 'Student', 1, '', '', NULL, 1392720000, 0, 1478830400, 1, 1420070400, NULL, 1),
(66, '066/2007', 'Paul Mushrush  ', 513554400, 2, 'Ndejje - Sambwe', NULL, '', '', 1, '', '', NULL, 1396608000, 0, 1479694400, 1, 1420070400, NULL, 1),
(67, '067/1970', 'Daren Konkol', -3600, 1, 'Entebbe', '0201 456316', 'konkol@yahoo.com', '', 2, '', '', NULL, 1400496000, 0, 1424905195, 1, 1457078853, NULL, 1),
(68, '068/2007', 'Kristin Lippard  ', 967323600, 2, 'Ndejje- Sambwe', NULL, '', '', 1, '', '', NULL, 1404384000, 0, 1481422400, 1, 1420070400, NULL, 1),
(69, '069/2007', 'Frederic Marchese  ', 510012000, 1, 'Ndejje- Sambwe', NULL, '', '', 1, '', '', NULL, 1408272000, 0, 1482286400, 1, 1420070400, NULL, 1),
(70, '070/2007', 'Gaynelle Busbee  ', -90000, 0, 'Kikoma Wobulenzi', '0566121212', '', 'Service Provider', 2, '', '', NULL, 1412160000, 0, 1483150400, 0, 1453146345, NULL, 1),
(71, '071/2007', 'Remona Sheffler  ', -75693600, 2, 'Kisaawe Muyenga Wobulenzi', NULL, '', 'Teacher', 1, '', '', NULL, 1416048000, 0, 1484014400, 0, 1427241600, NULL, 3),
(72, '072/2006', 'Federica Iliff  ', -115261200, 2, 'Luweero Child Devt Centre', '02589 452103', '', 'Peasant', 1, '', '', NULL, 1419936000, 0, 1517879600, 1, 1455023003, NULL, 1),
(73, '073/2008', 'Chan Milby  ', 864252000, 2, 'St.Peters-Kisugu', NULL, '', '', 1, '', '', NULL, 1423824000, 0, 1485742400, 1, 1420070400, NULL, 1),
(74, '074/2007', 'Piedad Mcgonigal  ', -208231200, 2, 'Ndejje Arch', NULL, '', 'Health Coordinator', 2, '', '', NULL, 1427712000, 0, 1486606400, 1, 1420070400, NULL, 1),
(75, '075/1970', 'Rhonda Pierpont  ', -3600, 2, 'Nakasongola', '0215161', '', '', 0, '', '', NULL, 1431600000, 0, 1487470400, 1, 1460789669, NULL, 1),
(76, '076/2007', 'Celinda Dulac  ', -45194400, 1, 'Luweerotc- Kizito Zone', '0712-219411', '', 'Clergy Man / Teacher', 2, '', '', NULL, 1435488000, 0, 1488334400, 1, 1420070400, NULL, 1),
(77, '077/2007', 'Edmond Kneeland  ', 120348000, 2, 'Luweero', NULL, '', 'Secretary', 2, '', '', NULL, 1439376000, 0, 1489198400, 1, 1420070400, NULL, 1),
(78, '078/2007', 'Lyndia Kump  ', -872301600, 2, 'C/O DCA Kampala', NULL, '', 'Nurse', 1, '', '', NULL, 1443264000, 0, 1490062400, 1, 1420070400, NULL, 1),
(79, '079/2007', 'Michael Poovey  ', -358740000, 2, 'Luweero Diocese', NULL, '', 'CBO Trainer', 2, '', '', NULL, 1447152000, 0, 1490926400, 1, 1420070400, NULL, 1),
(80, '080/2007', 'Omega Prochnow  ', -121312800, 2, 'Luweero Diocese', '0782-352335', '', 'Nurse', 2, '', '', NULL, 1451040000, 0, 1491790400, 1, 1420070400, NULL, 1),
(81, '081/2007', 'Sheri Stuck  ', -873770400, 1, 'Kiteredde Buyuki Katikamu', NULL, '', 'Peasant / Farmer', 2, '', '', NULL, 1454928000, 0, 1492654400, 1, 1420070400, NULL, 1),
(82, '082/2007', 'Shellie Bromley  ', -24544800, 1, 'Kangulumira- Mpologoma ', NULL, '', 'Teacher', 2, '', '', NULL, 1458816000, 0, 1493518400, 0, 1420070400, NULL, 1),
(83, '083/2007', 'Joshua Meiser  ', -1036803600, 1, 'Kikasa Wobulenzi Cetral', '0790-562315', '', 'Building Contractor', 2, 'Anne Meiser', 'Wife', NULL, 1462704000, 0, 1494382400, 1, 1445425402, NULL, 1),
(84, '084/2007', 'Jean Piehl  ', 135727200, 1, 'Wobulenzi-Kigulu', NULL, '', '', 2, '', '', NULL, 1466592000, 0, 1495246400, 1, 1420070400, NULL, 1),
(85, '085/2007', 'Lovella Canaday  ', 399934800, 1, 'Kiwoko - Kasana ', NULL, '', 'Primary Teacher', 1, '', '', NULL, 1470480000, 0, 1496110400, 1, 1420070400, NULL, 1),
(86, '086/2007', 'Val Cauley  ', 200955600, 2, 'Luweero T/C', '0772-688874', '', 'Social Worker', 1, '', '', NULL, 1474368000, 0, 1496974400, 1, 1420070400, NULL, 1),
(87, '087/2008', 'Michale Belvin  ', -600228000, 3, 'Kyatagali - Mabuye -Kamira', NULL, '', 'Lay-Reader / Peasant', 2, '', '', NULL, 1478256000, 0, 1497838400, 1, 1420070400, NULL, 1),
(88, '088/2007', 'Vernon Shade  ', 252630000, 2, 'Kagoma', '0', '', 'Social Worker', 2, '', '', NULL, 1482144000, 0, 1498702400, 1, 1460387555, NULL, 1),
(89, '089/2007', 'Susie Cratty  ', 72054000, 2, 'Katikamu P/S', '0782-158039', '', 'Teacher', 2, '', '', NULL, 1486032000, 0, 1499566400, 1, 1427241600, NULL, 2),
(90, '090/2007', 'Sima Cunningham  ', 188690400, 1, 'Luweero Town Council', '0772-305106', '', 'Social Worker', 1, '', '', NULL, 1489920000, 0, 1500430400, 1, 1420070400, NULL, 1),
(91, '091/2007', 'Leonel Weitzman  ', -164941200, 1, 'Katikamu Trinity Church', '0774068617', '', 'Lay-Reader', 2, '', '', NULL, 1493808000, 0, 1501294400, 1, 1427241600, NULL, 2),
(92, '092/2007', 'Corine Hansell  ', 135986400, 2, 'Katikamu- Sebamala', '0782-485545', '', 'Teacher', 2, '', '', NULL, 1497696000, 0, 1502158400, 1, 1420070400, NULL, 1),
(93, '093/2008', 'Beatrice Cortez  ', 166744800, 1, 'Kibula LC1 Kabakeddi Parish', NULL, '', 'Lay-Reader', 2, '', '', NULL, 1501584000, 0, 1503022400, 1, 1420070400, NULL, 1),
(94, '094/2007', 'Lore Keltz  ', 16837200, 1, 'Katikamu', '0772-670909', '', 'Clergy Man', 2, '', '', NULL, 1505472000, 0, 1503886400, 1, 1420070400, NULL, 1),
(95, '095/2007', 'Eda Edmonson  ', 261352800, 1, 'Kasoma Zone', '0772-641144', '', 'Health Worker', 1, '', '', NULL, 1509360000, 0, 1504750400, 1, 1420070400, NULL, 1),
(96, '096/2007', 'Clotilde Fuqua  ', -83210400, 1, 'Kangulumira- Mpologoma ', '0773-266136', '', 'Business Man', 2, '', '', NULL, 1513248000, 0, 1505614400, 1, 1420070400, NULL, 1),
(97, '097/2007', 'Rosamaria Hardeman  ', -7200, 1, 'Sempa C/U', '0772964823', '', 'Lay-Reader', 2, '', '', NULL, 1517136000, 0, 1506478400, 1, 1420070400, NULL, 1),
(98, '098/2007', 'Wilfred Dinger  ', 24094800, 1, 'Nalulya Butuntumula Luweero Diocese', '0782-424243', '', 'Lay-Reader', 1, '', '', NULL, 1521024000, 0, 1507342400, 1, 1420070400, NULL, 1),
(99, '099/2007', 'Minh Myrie  ', -161920800, 1, 'Mulilo Zone', NULL, '', 'Tailor', 2, '', '', NULL, 1524912000, 0, 1508206400, 1, 1420070400, NULL, 1),
(100, '100/2007', 'Sherly Boudreau', 313974000, 2, 'Kasana T/C', '0782-415747', '', 'Child Development Officer', 1, 'Hans Wurst', '', NULL, 1528800000, 0, 1587061800, 1, 1456493050, NULL, 1),
(101, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(202, '102/2020', 'karupu', 1587061800, 1, 'g', '7774644555', 'pandi@gmail.com', 'gagagaa', 1, 'agaga', 'agagag', NULL, 1587061800, 1, 1587061800, 1, 1587103737, 'uploads/photos/customers/cust202_146x190.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_docprefix`
--

CREATE TABLE `prefix_docprefix` (
  `id` int(11) NOT NULL,
  `doctype` enum('employee','customer') NOT NULL DEFAULT 'employee',
  `prefix` varchar(15) NOT NULL,
  `start` int(255) NOT NULL DEFAULT '1000',
  `current` int(255) NOT NULL DEFAULT '1000',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `fk_users_id` int(11) NOT NULL,
  `dels` enum('1','0') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix_docprefix`
--

INSERT INTO `prefix_docprefix` (`id`, `doctype`, `prefix`, `start`, `current`, `status`, `fk_users_id`, `dels`, `cdate`, `mdate`) VALUES
(1, 'customer', 'CUSTOMER', 1000, 1000, '1', 0, '0', 1554959938, 1580129126),
(2, 'employee', 'EMPLOYEE', 1000, 1006, '1', 0, '0', 1554959938, 1587278903);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_employee`
--

CREATE TABLE `prefix_employee` (
  `id` int(11) NOT NULL,
  `fk_users_id` int(11) NOT NULL,
  `empl_no` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_dob` date DEFAULT NULL,
  `emplsex` enum('male','female','others') COLLATE utf8_bin NOT NULL DEFAULT 'male',
  `fk_employeestatus_id` int(11) NOT NULL,
  `empl_position` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_salary` decimal(10,5) DEFAULT NULL,
  `empl_address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_phone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `empl_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `empl_in` datetime DEFAULT NULL,
  `empl_out` int(11) DEFAULT NULL,
  `empl_lastupd` int(11) DEFAULT NULL,
  `empl_active` int(1) NOT NULL DEFAULT '0',
  `empl_pic` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_employee`
--

INSERT INTO `prefix_employee` (`id`, `fk_users_id`, `empl_no`, `empl_name`, `empl_dob`, `emplsex`, `fk_employeestatus_id`, `empl_position`, `empl_salary`, `empl_address`, `empl_phone`, `empl_email`, `empl_in`, `empl_out`, `empl_lastupd`, `empl_active`, `empl_pic`, `status`, `dels`, `cdate`, `mdate`) VALUES
(1, 1, 'EMPLOYEE1003', 'vvjfjfq', '2020-01-04', 'male', 1, '', '43454.58000', 'jhg jkggk k g', '9999999999', '', '2020-04-18 22:41:39', NULL, NULL, 0, '1587229899-empl_pic.jpg', '0', '0', 0, 0),
(2, 1, 'EMPLOYEE1004', 'Prabha', '2010-07-07', 'male', 1, 'Head Manager', '59000.00000', '19th, cross street, Main road, Madurai', '9436363636', 'prabha@gmail.com', '2020-04-19 11:39:19', NULL, NULL, 0, '1587278386-empl_pic.jpg', '1', '1', 0, 0),
(3, 1, 'EMPLOYEE1005', 'Pandikumar', '0000-00-00', 'male', 1, '', '887.00000', 'jhgfjk fk fj hgd fd', '9999999998', '', '2020-04-19 12:18:23', NULL, NULL, 0, '1587278940-empl_pic.jpg', '1', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_employeestatus`
--

CREATE TABLE `prefix_employeestatus` (
  `id` int(11) NOT NULL,
  `statusname` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_employeestatus`
--

INSERT INTO `prefix_employeestatus` (`id`, `statusname`, `status`, `dels`) VALUES
(1, 'Single', '1', '0'),
(2, 'Married', '1', '0'),
(3, 'Widowed', '1', '0'),
(4, 'Divorced', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_loans`
--

CREATE TABLE `prefix_loans` (
  `id` int(11) NOT NULL,
  `fk_customer_id` int(11) NOT NULL,
  `fk_loanstatus_id` int(11) NOT NULL,
  `loan_no` varchar(20) COLLATE utf8_bin NOT NULL,
  `loan_date` int(15) NOT NULL,
  `loan_dateout` int(11) NOT NULL,
  `loan_issued` int(2) NOT NULL,
  `loan_principal` int(11) NOT NULL,
  `loan_principalapproved` int(11) NOT NULL,
  `loan_interest` float NOT NULL,
  `loan_appfee_receipt` int(11) NOT NULL,
  `loan_fee` int(11) NOT NULL,
  `loan_fee_receipt` int(11) NOT NULL,
  `loan_insurance` int(11) NOT NULL,
  `loan_insurance_receipt` int(11) NOT NULL,
  `loan_rate` decimal(11,0) NOT NULL,
  `loan_period` int(11) NOT NULL,
  `loan_repaytotal` int(11) NOT NULL,
  `loan_purpose` varchar(250) COLLATE utf8_bin NOT NULL,
  `loan_guarant1` int(11) NOT NULL,
  `loan_guarant2` int(11) NOT NULL,
  `loan_guarant3` int(11) NOT NULL,
  `loan_feepaid` int(1) NOT NULL DEFAULT '0',
  `loan_created` int(15) DEFAULT NULL,
  `loan_xtra1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `loan_xtraFee1` int(11) DEFAULT NULL,
  `fk_users_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_loans`
--

INSERT INTO `prefix_loans` (`id`, `fk_customer_id`, `fk_loanstatus_id`, `loan_no`, `loan_date`, `loan_dateout`, `loan_issued`, `loan_principal`, `loan_principalapproved`, `loan_interest`, `loan_appfee_receipt`, `loan_fee`, `loan_fee_receipt`, `loan_insurance`, `loan_insurance_receipt`, `loan_rate`, `loan_period`, `loan_repaytotal`, `loan_purpose`, `loan_guarant1`, `loan_guarant2`, `loan_guarant3`, `loan_feepaid`, `loan_created`, `loan_xtra1`, `loan_xtraFee1`, `fk_users_id`) VALUES
(1, 100, 2, 'L-100/2007-1', 1439935200, 1439935200, 1, 850000, 0, 2.5, 1234, 8500, 87874, 0, 0, '162917', 6, 977500, 'To buy land plot', 1, 2, 3, 0, 1439993579, NULL, NULL, 1),
(2, 1, 4, 'L-001/2016-1', 1452812400, 1454108400, 1, 600000, 600000, 2.5, 1483, 6000, 1484, 0, 0, '65000', 12, 780000, 'Printing Cost', 3, 4, 200, 0, 1453118784, NULL, NULL, 1),
(4, 5, 2, 'L-005/2006-1', 1454194800, 1460498400, 1, 800000, 700000, 3, 8501, 8000, 646, 0, 0, '104000', 10, 1040000, 'Aquisition of a plot', 2, 4, 26, 0, 1456487835, NULL, NULL, 1),
(5, 20, 2, 'L-020/2006-1', 1454540400, 1460498400, 1, 900000, 750000, 2, 18, 7500, 65456, 11250, 65456, '168000', 6, 1008000, 'Business Boost', 63, 120, 11, 0, 1456491502, NULL, NULL, 1),
(6, 65, 1, 'L-065/2007-1', 1460325600, 0, 0, 1250000, 0, 3, 551, 12500, 0, 0, 0, '245500', 6, 1475000, 'Roofing', 75, 22, 37, 0, 1460388152, NULL, NULL, 1),
(8, 17, 2, 'L-017/2006-1', 1460412000, 1460412000, 1, 560000, 400000, 3, 4664, 5600, 6846, 0, 0, '41800', 22, 929600, 'Buying farm land', 58, 31, 100, 0, 1460473263, 'Gertrud', NULL, 1),
(9, 50, 2, 'L-050/2006-1', 1461103200, 1461708000, 1, 1200000, 900000, 3, 9876, 9000, 6556, 13500, 6556, '236000', 6, 1416000, 'Business investment', 1, 2, 3, 0, 1460549998, '', NULL, 1),
(10, 40, 3, 'L-040/2006-1', 1462053600, 0, 0, 1100000, 0, 3, 991, 11000, 0, 16500, 0, '253000', 5, 1265000, 'Chicken feeds', 1, 4, 6, 0, 1460550227, '', NULL, 1),
(11, 40, 1, 'L-040/2006-2', 1462140000, 0, 0, 1100000, 0, 3, 8486, 11000, 0, 16500, 0, '253000', 5, 1265000, 'House building', 1, 4, 9, 0, 1460550300, 'Ernie', NULL, 1),
(12, 35, 3, 'L-035/2006-1', 1464645600, 0, 0, 900000, 0, 3, 153136, 9000, 0, 13500, 0, '327000', 3, 981000, 'Construction work', 15, 41, 79, 0, 1460550528, '', NULL, 1),
(13, 19, 2, 'L-019/2006-1', 1460498400, 1461967200, 1, 3000000, 2500000, 3, 4456, 25000, 654156, 37500, 654156, '340000', 12, 4080000, 'Invest in cattle', 42, 79, 98, 0, 1460550633, 'Johanna', NULL, 1),
(14, 60, 1, 'L-060/2007-1', 1464732000, 0, 0, 600000, 0, 4, 1712, 6000, 0, 9000, 0, '124000', 6, 744000, 'School fees', 22, 40, 59, 0, 1460557716, 'Anabelle Bradham', NULL, 1),
(15, 49, 2, 'L-049/2006-1', 1461967200, 1461967200, 1, 8000000, 7600000, 3, 565, 76000, 4646, 114000, 4646, '907000', 12, 10880000, 'Building', 40, 60, 79, 0, 1460557834, 'Nobbi', 5000, 1),
(16, 45, 2, 'L-045/2006-1', 1467151200, 1467410400, 1, 9000000, 9000000, 4, 514641, 90000, 654654, 135000, 654654, '923000', 16, 14760000, 'Buying plot of land', 60, 62, 40, 0, 1460558956, '', NULL, 1),
(17, 75, 2, 'L-075/1970-1', 1460757600, 1461448800, 1, 8000000, 5000000, 3, 564, 50000, 2344, 75000, 2344, '1573000', 6, 9440000, 'Buying land', 94, 97, 22, 0, 1460789883, '', 5000, 1),
(18, 10, 2, 'L-010/2006-1', 1507586400, 1507672800, 1, 1200000, 800000, 2.5, 560, 10000, 800000, 12000, 800000, '150000', 10, 1500000, 'Land aqcuisition', 98, 20, 5, 0, 1507629416, 'Amada Olevian', 1000, 1),
(19, 15, 1, 'L-015/2006-1', 1508104800, 0, 0, 600000, 0, 2.3, 123, 7500, 0, 9000, 0, '133800', 5, 669000, 'School fees', 95, 66, 23, 0, 1508150253, '', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_loanstatus`
--

CREATE TABLE `prefix_loanstatus` (
  `id` int(11) NOT NULL,
  `statusname` varchar(50) COLLATE utf8_bin NOT NULL,
  `status_short` varchar(8) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_loanstatus`
--

INSERT INTO `prefix_loanstatus` (`id`, `statusname`, `status_short`) VALUES
(1, 'Pending', 'LST_PEN'),
(2, 'Approved', 'LST_APP'),
(3, 'Refused', 'LST_REF'),
(4, 'Abandoned', 'LST_ABN'),
(5, 'Cleared', 'LST_CLR');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_ltrans`
--

CREATE TABLE `prefix_ltrans` (
  `id` int(11) NOT NULL,
  `fk_loans_id` int(11) NOT NULL,
  `ltrans_due` int(11) DEFAULT NULL,
  `ltrans_date` int(15) DEFAULT NULL,
  `ltrans_principaldue` int(11) DEFAULT NULL,
  `ltrans_principal` int(15) DEFAULT NULL,
  `ltrans_interestdue` int(11) DEFAULT NULL,
  `ltrans_interest` int(11) DEFAULT NULL,
  `ltrans_fined` int(1) NOT NULL DEFAULT '0',
  `ltrans_receipt` int(11) DEFAULT NULL,
  `ltrans_created` int(15) DEFAULT NULL,
  `fk_users_id` int(6) NOT NULL,
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dels` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_ltrans`
--

INSERT INTO `prefix_ltrans` (`id`, `fk_loans_id`, `ltrans_due`, `ltrans_date`, `ltrans_principaldue`, `ltrans_principal`, `ltrans_interestdue`, `ltrans_interest`, `ltrans_fined`, `ltrans_receipt`, `ltrans_created`, `fk_users_id`, `cdate`, `mdate`, `status`, `dels`) VALUES
(1, 1, 1456956000, 1458424800, 141665, 118750, 21250, 21250, 0, 1234, 1445421102, 3, 0, 0, '1', '0'),
(2, 1, 1459634400, 1461103200, 725000, 78750, 21750, 21250, 0, 5678, 1445421253, 3, 0, 0, '1', '0'),
(3, 1, 1462312800, 1587061800, 141667, 0, 21250, 45, 0, 436363, 1587103810, 1, 0, 0, '1', '0'),
(4, 1, 1464991200, 1587061800, 141667, 0, 21250, 5454, 0, 565757, 1587103825, 1, 0, 0, '1', '0'),
(5, 1, 1467669600, 1587061800, 141667, 0, 21250, 4343, 0, 43, 1587103857, 1, 0, 0, '1', '0'),
(6, 1, 1470348000, NULL, 141667, NULL, 21250, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(7, 2, 1456786800, 1459461600, 50000, 45000, 15000, 15000, 0, 78978, 1507628706, 1, 0, 0, '1', '0'),
(8, 2, 1459465200, 1463263200, 50000, 105000, 15000, 15000, 0, 123123, 1507628767, 1, 0, 0, '1', '0'),
(9, 2, 1462143600, NULL, 50000, NULL, 15000, NULL, 0, NULL, 1507628940, 1, 0, 0, '1', '0'),
(10, 2, 1464822000, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(11, 2, 1467500400, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(12, 2, 1470178800, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(13, 2, 1472857200, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(14, 2, 1475535600, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(15, 2, 1478214000, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(16, 2, 1480892400, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(17, 2, 1483570800, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(18, 2, 1486249200, NULL, 50000, NULL, 15000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(143, 8, 1463090400, NULL, 22000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(144, 8, 1465768800, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(145, 8, 1468447200, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(146, 8, 1471125600, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(147, 8, 1473804000, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(148, 8, 1476482400, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(149, 8, 1479160800, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(150, 8, 1481839200, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(151, 8, 1484517600, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(152, 8, 1487196000, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(153, 8, 1489874400, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(154, 8, 1492552800, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(155, 8, 1495231200, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(156, 8, 1497909600, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(157, 8, 1500588000, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(158, 8, 1503266400, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(159, 8, 1505944800, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(160, 8, 1508623200, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(161, 8, 1511301600, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(162, 8, 1513980000, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(163, 8, 1516658400, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(164, 8, 1519336800, NULL, 18000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(185, 4, 1463176800, 1460498400, 70000, 49000, 21000, 21000, 0, 1689, 1460539919, 1, 0, 0, '1', '0'),
(186, 4, 1465855200, NULL, 70000, NULL, 18900, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(187, 4, 1468533600, NULL, 70000, NULL, 16800, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(188, 4, 1471212000, NULL, 70000, NULL, 14700, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(189, 4, 1473890400, NULL, 70000, NULL, 12600, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(190, 4, 1476568800, NULL, 70000, NULL, 10500, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(191, 4, 1479247200, NULL, 70000, NULL, 8400, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(192, 4, 1481925600, NULL, 70000, NULL, 6300, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(193, 4, 1484604000, NULL, 70000, NULL, 4200, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(194, 4, 1487282400, NULL, 70000, NULL, 2100, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(201, 5, 1463176800, 1460498400, 125000, 85000, 15000, 15000, 0, 999, 1460547290, 1, 0, 0, '1', '0'),
(202, 5, 1465855200, 1460498400, 133000, 86700, 13300, 13300, 0, 888, 1460547333, 1, 0, 0, '1', '0'),
(203, 5, 1468533600, 1460498400, 143300, 143300, 11566, 11566, 0, 1010, 1460547431, 1, 0, 0, '1', '0'),
(204, 5, 1471212000, 1460498400, 145000, 171300, 8700, 8700, 0, 180, 1460547469, 1, 0, 0, '1', '0'),
(205, 5, 1473890400, 1460498400, 131700, 134726, 5274, 5274, 0, 15, 1460547566, 1, 0, 0, '1', '0'),
(206, 5, 1476568800, NULL, 128974, NULL, 2579, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(207, 9, 1464386400, 1507672800, 150000, 193000, 27000, 27000, 0, 13546, 1507732124, 1, 0, 0, '1', '0'),
(208, 9, 1467064800, 1507672800, 150000, 0, 22500, 20000, 0, 21, 1507740798, 1, 0, 0, '1', '0'),
(209, 9, 1469743200, NULL, 150000, NULL, 18000, NULL, 1, NULL, 1507740867, 1, 0, 0, '1', '0'),
(210, 9, 1472421600, NULL, 150000, NULL, 13500, NULL, 1, NULL, 1507748327, 1, 0, 0, '1', '0'),
(211, 9, 1475100000, NULL, 150000, NULL, 9000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(212, 9, 1477778400, NULL, 150000, NULL, 4500, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(213, 13, 1464645600, NULL, 212000, NULL, 75000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(214, 13, 1467324000, NULL, 208000, NULL, 68640, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(215, 13, 1470002400, NULL, 208000, NULL, 62400, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(216, 13, 1472680800, NULL, 208000, NULL, 56160, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(217, 13, 1475359200, NULL, 208000, NULL, 49920, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(218, 13, 1478037600, NULL, 208000, NULL, 43680, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(219, 13, 1480716000, NULL, 208000, NULL, 37440, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(220, 13, 1483394400, NULL, 208000, NULL, 31200, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(221, 13, 1486072800, NULL, 208000, NULL, 24960, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(222, 13, 1488751200, NULL, 208000, NULL, 18720, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(223, 13, 1491429600, NULL, 208000, NULL, 12480, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(224, 13, 1494108000, NULL, 208000, NULL, 6240, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(225, 15, 1464645600, NULL, 637000, NULL, 228000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(226, 15, 1467324000, NULL, 633000, NULL, 208890, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(227, 15, 1470002400, NULL, 633000, NULL, 189900, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(228, 15, 1472680800, NULL, 633000, NULL, 170910, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(229, 15, 1475359200, NULL, 633000, NULL, 151920, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(230, 15, 1478037600, NULL, 633000, NULL, 132930, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(231, 15, 1480716000, NULL, 633000, NULL, 113940, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(232, 15, 1483394400, NULL, 633000, NULL, 94950, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(233, 15, 1486072800, NULL, 633000, NULL, 75960, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(234, 15, 1488751200, NULL, 633000, NULL, 56970, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(235, 15, 1491429600, NULL, 633000, NULL, 37980, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(236, 15, 1494108000, NULL, 633000, NULL, 18990, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(237, 16, 1470088800, NULL, 555000, NULL, 360000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(238, 16, 1472767200, NULL, 563000, NULL, 337800, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(239, 16, 1475445600, NULL, 563000, NULL, 315280, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(240, 16, 1478124000, NULL, 563000, NULL, 292760, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(241, 16, 1480802400, NULL, 563000, NULL, 270240, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(242, 16, 1483480800, NULL, 563000, NULL, 247720, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(243, 16, 1486159200, NULL, 563000, NULL, 225200, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(244, 16, 1488837600, NULL, 563000, NULL, 202680, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(245, 16, 1491516000, NULL, 563000, NULL, 180160, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(246, 16, 1494194400, NULL, 563000, NULL, 157640, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(247, 16, 1496872800, NULL, 563000, NULL, 135120, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(248, 16, 1499551200, NULL, 563000, NULL, 112600, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(249, 16, 1502229600, NULL, 563000, NULL, 90080, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(250, 16, 1504908000, NULL, 563000, NULL, 67560, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(251, 16, 1507586400, NULL, 563000, NULL, 45040, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(252, 16, 1510264800, NULL, 563000, NULL, 22520, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(253, 17, 1464127200, 1464127200, 835000, 650000, 150000, 150000, 0, 123, 1460790208, 1, 0, 0, '1', '0'),
(254, 17, 1466805600, 1465336800, 870000, 1069500, 130500, 130500, 0, 999, 1460790288, 1, 0, 0, '1', '0'),
(255, 17, 1469484000, NULL, 820500, NULL, 98415, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(256, 17, 1472162400, NULL, 820000, NULL, 73800, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(257, 17, 1474840800, NULL, 820000, NULL, 49200, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(258, 17, 1477519200, NULL, 820000, NULL, 24600, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(259, 18, 1510351200, NULL, 80000, NULL, 20000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(260, 18, 1513029600, NULL, 80000, NULL, 18000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(261, 18, 1515708000, NULL, 80000, NULL, 16000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(262, 18, 1518386400, NULL, 80000, NULL, 14000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(263, 18, 1521064800, NULL, 80000, NULL, 12000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(264, 18, 1523743200, NULL, 80000, NULL, 10000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(265, 18, 1526421600, NULL, 80000, NULL, 8000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(266, 18, 1529100000, NULL, 80000, NULL, 6000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(267, 18, 1531778400, NULL, 80000, NULL, 4000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0'),
(268, 18, 1534456800, NULL, 80000, NULL, 2000, NULL, 0, NULL, NULL, 1, 0, 0, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_settings`
--

CREATE TABLE `prefix_settings` (
  `id` int(11) NOT NULL,
  `set_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `set_short` varchar(8) COLLATE utf8_bin NOT NULL,
  `set_value` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prefix_settings`
--

INSERT INTO `prefix_settings` (`id`, `set_name`, `set_short`, `set_value`) VALUES
(1, 'Minimum Savings Balance', 'SET_MSB', '5000'),
(2, 'Minimum Loan Principal', 'SET_MLP', '500000'),
(3, 'Maximum Loan Principal', 'SET_XLP', '10000000'),
(4, 'Currency Abbreviation', 'SET_CUR', 'UGX'),
(5, 'Auto-fine Defaulters', 'SET_AUF', ''),
(6, 'Account Deactivation', 'SET_DEA', ''),
(7, 'Dashboard Left', 'SET_DBL', 'dashboard/dash_subscr.php'),
(8, 'Dashboard Right', 'SET_DBR', 'dashboard/dash_loandefaults.php'),
(9, 'Interest Calculation', 'SET_ICL', 'modules/mod_inter_float.php'),
(10, 'Guarantor Limit', 'SET_GUA', '3'),
(11, 'Minimum Membership', 'SET_MEM', '6'),
(12, 'Maximum Principal-Savings Ratio', 'SET_PSR', ''),
(13, 'Customer Number Format', 'SET_CNO', '%N%/%Y'),
(14, 'Employee Number Format', 'SET_ENO', '%N'),
(15, 'Additional Field Loans', 'SET_XL1', 'Spouse'),
(16, 'Fixed Savings', 'SET_SFX', '1'),
(17, 'Customer Search by ID', 'SET_CSI', '0'),
(18, 'Use Fixed Deposits for Fine', 'SET_F4F', '1');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_usergroups`
--

CREATE TABLE `prefix_usergroups` (
  `id` int(11) NOT NULL,
  `groupname` varchar(50) DEFAULT NULL,
  `permission_admin` int(11) NOT NULL DEFAULT '0',
  `permission_delete` int(11) NOT NULL DEFAULT '0',
  `permission_report` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `fk_users_id` int(11) NOT NULL,
  `dels` enum('1','0') NOT NULL DEFAULT '0',
  `cdate` int(15) NOT NULL,
  `mdate` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefix_usergroups`
--

INSERT INTO `prefix_usergroups` (`id`, `groupname`, `permission_admin`, `permission_delete`, `permission_report`, `status`, `fk_users_id`, `dels`, `cdate`, `mdate`) VALUES
(1, 'admin', 1, 1, 1, '1', 0, '0', 0, 0),
(2, 'Management', 0, 0, 0, '0', 0, '0', 0, 0),
(3, 'Employee', 0, 0, 0, '0', 0, '0', 0, 0),
(4, 'Ext-Admin', 0, 0, 0, '0', 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_users`
--

CREATE TABLE `prefix_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `fk_employees_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_usergroups_id` int(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `pwdresetdate` datetime NOT NULL,
  `dels` enum('0','1') NOT NULL DEFAULT '0',
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  `devicetoken` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix_users`
--

INSERT INTO `prefix_users` (`id`, `fullname`, `fk_employees_id`, `username`, `password`, `fk_usergroups_id`, `status`, `pwdresetdate`, `dels`, `cdate`, `mdate`, `devicetoken`) VALUES
(1, 'admin', 0, 'admin', '373e615ce10a76ade195d57ce541b82e', 1, '1', '0000-00-00 00:00:00', '0', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefix_customer`
--
ALTER TABLE `prefix_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_docprefix`
--
ALTER TABLE `prefix_docprefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_employee`
--
ALTER TABLE `prefix_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_employeestatus`
--
ALTER TABLE `prefix_employeestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_loans`
--
ALTER TABLE `prefix_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_loanstatus`
--
ALTER TABLE `prefix_loanstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_ltrans`
--
ALTER TABLE `prefix_ltrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_settings`
--
ALTER TABLE `prefix_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_usergroups`
--
ALTER TABLE `prefix_usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_users`
--
ALTER TABLE `prefix_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prefix_customer`
--
ALTER TABLE `prefix_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `prefix_docprefix`
--
ALTER TABLE `prefix_docprefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prefix_employee`
--
ALTER TABLE `prefix_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prefix_employeestatus`
--
ALTER TABLE `prefix_employeestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prefix_loans`
--
ALTER TABLE `prefix_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `prefix_loanstatus`
--
ALTER TABLE `prefix_loanstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prefix_ltrans`
--
ALTER TABLE `prefix_ltrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
--
-- AUTO_INCREMENT for table `prefix_settings`
--
ALTER TABLE `prefix_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `prefix_usergroups`
--
ALTER TABLE `prefix_usergroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prefix_users`
--
ALTER TABLE `prefix_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
