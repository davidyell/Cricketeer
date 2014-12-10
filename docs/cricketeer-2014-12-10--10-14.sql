# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.21)
# Database: cricketeer
# Generation Time: 2014-12-10 10:14:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table batsmen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `batsmen`;

CREATE TABLE `batsmen` (
  `id` char(36) NOT NULL,
  `player_id` char(36) NOT NULL,
  `innings_id` char(36) NOT NULL,
  `runs` int(11) NOT NULL DEFAULT '0',
  `balls` int(11) NOT NULL DEFAULT '0',
  `strike_rate` float(10,2) NOT NULL DEFAULT '0.00',
  `fours` int(11) NOT NULL DEFAULT '0',
  `sixes` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_batsmen_player_id_idx` (`player_id`),
  KEY `fk_batsmen_innings_id_idx` (`innings_id`),
  CONSTRAINT `fk_batsmen_innings_id` FOREIGN KEY (`innings_id`) REFERENCES `innings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_batsmen_player_id` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `batsmen` WRITE;
/*!40000 ALTER TABLE `batsmen` DISABLE KEYS */;

INSERT INTO `batsmen` (`id`, `player_id`, `innings_id`, `runs`, `balls`, `strike_rate`, `fours`, `sixes`, `created`, `modified`)
VALUES
	('0156a985-8e36-47df-8797-a3b27c5ab2cf','55a96292-8644-4686-8209-ab48e7eb31e0','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',44,38,115.79,6,1,'2014-11-13 14:40:56','2014-12-04 10:54:55'),
	('06313c79-7a4c-4990-a7d0-d63611d6e19a','04ae289c-9c90-4b7e-8cbe-f5068e727908','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',34,47,72.34,2,0,'2014-11-11 11:00:39','2014-12-05 12:22:02'),
	('06b53c2a-e14a-4bc1-adf1-f0c9bc99e664','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',114,87,131.03,7,4,'2014-11-11 14:45:45','2014-12-05 12:22:02'),
	('07ebddc4-45e5-46c2-98a4-1d5898c247cf','34778d6a-c734-4849-bc0f-3bbb5ee2815a','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',44,38,115.79,6,1,'2014-12-04 10:54:55','2014-12-04 10:54:55'),
	('0a52ef10-9d93-4f27-8952-b05a1d2d5046','34778d6a-c734-4849-bc0f-3bbb5ee2815a','841fce60-0178-450f-99e8-ad1670f5c84f',83,99,83.84,6,3,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('0c344b2d-7b40-45fb-9ac0-4946df77584b','7da86b45-89f6-4cca-bf25-e8131df7c863','23a28ffc-4827-40e7-928f-5e80e33ad42e',94,153,61.44,7,1,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('127bbb4b-3395-4157-b277-5c70c2b15a23','58d058a8-bc24-4b9b-ad9c-5908102005af','5267764a-01a6-4a1c-8cfb-40c762c64454',95,145,65.52,8,1,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('156cf82e-4dfc-4ec8-b6da-04c8643e5012','b47bd34e-4a47-4f52-944a-6fb0adee1972','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',124,96,129.17,8,5,'2014-11-11 11:01:12','2014-12-05 12:22:02'),
	('176e65b5-8be8-46bd-a59f-9b14f05661d2','b47bd34e-4a47-4f52-944a-6fb0adee1972','23a28ffc-4827-40e7-928f-5e80e33ad42e',64,78,82.05,6,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('21c25ece-bb02-461e-9e18-994bd15b1049','9434775d-3bbf-40b2-a15c-14f2fd115ff0','5267764a-01a6-4a1c-8cfb-40c762c64454',63,85,74.12,4,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('230c4982-8889-48c4-a8f7-e94e868d3c62','58d058a8-bc24-4b9b-ad9c-5908102005af','ca098580-87f0-4f06-b3af-225d9946926b',44,87,50.57,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('23cb2abe-b294-49a8-aa30-d9a7d1902999','7191769f-cf4c-48b1-8913-77c503d23da1','f5692e57-31a0-4f94-a303-e8540081eebb',32,55,58.18,5,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('25657d21-21ce-40a3-bb76-90fb77184198','3767383d-efa0-4c42-bb06-d29561650ab4','841fce60-0178-450f-99e8-ad1670f5c84f',67,58,115.52,9,2,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('26d823fb-2331-41ae-866e-1d121202d446','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',45,40,112.50,4,2,'2014-11-13 09:55:24','2014-12-05 12:22:02'),
	('27b06f20-762c-4166-b93b-7e67c137123f','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','f5692e57-31a0-4f94-a303-e8540081eebb',55,68,80.88,4,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('2a9ccb5a-35f6-4c79-a0e4-7944cf83fd48','0858597c-0299-4d14-aa17-6a5424b9b14b','23a28ffc-4827-40e7-928f-5e80e33ad42e',34,47,72.34,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('2b2134e8-248d-429a-84d9-879f27a6fe0d','604cb429-d66f-4af3-8757-e162ca592e41','5267764a-01a6-4a1c-8cfb-40c762c64454',22,41,53.66,3,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('2bb1a8fb-6534-436a-ba24-8475f63c7e58','31504635-25f4-4a5f-a133-dae79d29c194','5267764a-01a6-4a1c-8cfb-40c762c64454',6,11,54.55,0,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('2cb9f8e3-cef2-4b2b-8d14-513d2151be78','643cd5ae-fa38-476b-9557-b1a110ff866c','841fce60-0178-450f-99e8-ad1670f5c84f',33,40,82.50,5,0,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('2cc027d5-0274-4e31-a713-0110a4190a0b','d59140ba-7426-4570-a217-43b44cb07474','23a28ffc-4827-40e7-928f-5e80e33ad42e',9,14,64.29,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3b856b6f-b5b3-434e-b80a-751bfabf536c','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ca098580-87f0-4f06-b3af-225d9946926b',87,99,87.88,4,1,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3d211562-3cc8-4d20-a039-6252081363ee','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','841fce60-0178-450f-99e8-ad1670f5c84f',25,32,78.13,2,0,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('4045a271-7255-4a82-82d0-27d817917f52','03a152b6-6c79-40f1-af1e-0751a6af60ba','ca098580-87f0-4f06-b3af-225d9946926b',14,16,87.50,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('410f7842-9ab0-4efe-b329-3a5441fd6123','ba5126f3-67ea-4797-a390-3c45f3fd1185','841fce60-0178-450f-99e8-ad1670f5c84f',66,83,79.52,6,1,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('41629641-4cb0-4e49-8157-c9f84f5e4241','d59140ba-7426-4570-a217-43b44cb07474','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',14,21,66.67,1,0,'2014-11-11 12:31:19','2014-12-05 12:22:02'),
	('43a8a197-3316-47e8-bf69-984452e6e4b6','7da86b45-89f6-4cca-bf25-e8131df7c863','f5692e57-31a0-4f94-a303-e8540081eebb',67,89,75.28,5,1,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('44618e2f-6b33-4464-955f-ac7aa75dede4','55a96292-8644-4686-8209-ab48e7eb31e0','841fce60-0178-450f-99e8-ad1670f5c84f',34,46,73.91,3,2,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('47bb8a7a-88c1-41d3-9282-8de3c9c64267','7da86b45-89f6-4cca-bf25-e8131df7c863','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',96,79,121.52,7,3,'2014-11-11 10:59:49','2014-12-05 12:22:02'),
	('4fa3194f-af4b-4915-ab74-8625b3f9e34f','6f38fbc8-fe09-4628-94d1-847453f6da05','ca098580-87f0-4f06-b3af-225d9946926b',56,69,81.16,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('500deeac-ef6c-4589-b15a-101ca7068a15','87c90006-0abb-492a-8756-4e46b9408106','ca098580-87f0-4f06-b3af-225d9946926b',11,25,44.00,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('5620d9f8-61db-495e-b0ee-1b0d77e91f92','318ee263-4442-4820-b2b5-903c6294fdcb','23a28ffc-4827-40e7-928f-5e80e33ad42e',78,110,70.91,7,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('597bc745-6f1b-4c8f-8f62-f1645d5ef90e','6263861c-5f99-4f19-86ef-8de61e459a1e','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',44,38,115.79,6,1,'2014-12-04 10:49:08','2014-12-04 10:54:55'),
	('5d929588-e205-4192-a2af-1b2613444daa','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','f5692e57-31a0-4f94-a303-e8540081eebb',23,43,53.49,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('5da1801b-facc-4d73-85bd-00933d04b327','cac70db7-d83f-4357-a986-234fe483d361','841fce60-0178-450f-99e8-ad1670f5c84f',65,72,90.28,5,1,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('6373cd0c-ab8c-4821-a2bd-da90a91017e3','6263861c-5f99-4f19-86ef-8de61e459a1e','841fce60-0178-450f-99e8-ad1670f5c84f',69,72,95.83,6,2,'2014-11-12 16:57:56','2014-12-05 12:22:02'),
	('694273ba-9f65-49ad-a5a9-1dc0ba834417','318ee263-4442-4820-b2b5-903c6294fdcb','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',44,54,81.48,2,0,'2014-11-13 09:55:24','2014-12-05 12:22:02'),
	('697a9ac2-5c07-4dad-9ef8-49c180bfe450','87c90006-0abb-492a-8756-4e46b9408106','5267764a-01a6-4a1c-8cfb-40c762c64454',11,19,57.89,1,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('6ad40dcd-2f40-4f0e-b79c-3de952e74a2b','47701045-d1b8-40ad-98ca-c468471d488c','5267764a-01a6-4a1c-8cfb-40c762c64454',55,89,61.80,3,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('6c78e807-b522-4946-823b-b7ad000240ed','6b896c77-1170-44f4-9e68-6390c542d921','23a28ffc-4827-40e7-928f-5e80e33ad42e',14,22,63.64,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('714153dc-5ade-4c87-a925-a0d873857c7b','539b1fd7-50a6-4e3b-9b66-c91370e3909b','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',7,14,50.00,0,0,'2014-11-11 15:52:05','2014-12-05 12:22:02'),
	('7d4b9fcc-f337-4243-8242-63ef77f3992c','604cb429-d66f-4af3-8757-e162ca592e41','ca098580-87f0-4f06-b3af-225d9946926b',14,23,60.87,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('80182e63-7c7c-4fb2-a0d8-4b443d2aca91','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','5267764a-01a6-4a1c-8cfb-40c762c64454',24,30,80.00,1,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('8027d968-7259-456b-bfdf-fc29b238eb62','0858597c-0299-4d14-aa17-6a5424b9b14b','f5692e57-31a0-4f94-a303-e8540081eebb',22,34,64.71,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('849793d3-7148-43ab-8dfd-e97e1df48dc1','539b1fd7-50a6-4e3b-9b66-c91370e3909b','93daddf5-256b-4420-b636-0db626baae72',13,23,56.52,4,0,'2014-11-13 14:40:56','2014-12-04 10:54:55'),
	('88b9b013-bfc9-4e67-bb7e-2e57e8d4e28f','7191769f-cf4c-48b1-8913-77c503d23da1','23a28ffc-4827-40e7-928f-5e80e33ad42e',3,11,27.27,0,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('8d642366-2b5a-4cb7-91fc-7b8e6a7f3490','47701045-d1b8-40ad-98ca-c468471d488c','ca098580-87f0-4f06-b3af-225d9946926b',12,16,75.00,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('98794f1e-2b51-4772-aab3-5bc9d62524af','d59140ba-7426-4570-a217-43b44cb07474','f5692e57-31a0-4f94-a303-e8540081eebb',12,19,63.16,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('9f122331-c424-4265-9e70-1c6023431c0d','1a902086-d506-4115-8fbe-88fe516eaf9f','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',45,47,95.74,2,0,'2014-11-13 09:55:24','2014-12-05 12:22:02'),
	('a021ee82-d829-4955-87a7-99722ea18311','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','23a28ffc-4827-40e7-928f-5e80e33ad42e',22,37,59.46,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('a0357617-883d-4359-ba4d-4b8dc3e5f9a4','6f38fbc8-fe09-4628-94d1-847453f6da05','5267764a-01a6-4a1c-8cfb-40c762c64454',78,99,78.79,5,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('a7baf4ef-4dd9-4564-9dfe-45254033bfb6','9434775d-3bbf-40b2-a15c-14f2fd115ff0','ca098580-87f0-4f06-b3af-225d9946926b',34,56,60.71,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('b2c9eff9-8ace-4868-85fe-b14c3d702761','04ae289c-9c90-4b7e-8cbe-f5068e727908','f5692e57-31a0-4f94-a303-e8540081eebb',8,7,114.29,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('b7783aee-aa00-411a-b5e5-2c917f605710','ea2c564d-6dda-4af4-91ea-53a16f5c827e','5267764a-01a6-4a1c-8cfb-40c762c64454',146,204,71.57,9,2,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('b90ba8cc-6976-4565-b596-a986b6069ce5','318ee263-4442-4820-b2b5-903c6294fdcb','f5692e57-31a0-4f94-a303-e8540081eebb',45,69,65.22,4,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('b99e8d68-2007-4938-9ddc-2e8e159116b7','44aa7fd1-163d-4ff7-8117-ec436c161271','5267764a-01a6-4a1c-8cfb-40c762c64454',64,98,65.31,6,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('ba5af52d-1c87-403c-ba7d-3ec9cb61e33d','1a902086-d506-4115-8fbe-88fe516eaf9f','23a28ffc-4827-40e7-928f-5e80e33ad42e',34,75,45.33,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('bf84b09a-69f6-4d5e-9c0c-3dc8d3601868','03a152b6-6c79-40f1-af1e-0751a6af60ba','5267764a-01a6-4a1c-8cfb-40c762c64454',0,1,0.00,0,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('c16e24db-89c5-4bf2-8807-7e9e8e7083ac','0858597c-0299-4d14-aa17-6a5424b9b14b','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',23,34,67.65,1,0,'2014-11-12 16:57:56','2014-12-05 12:22:02'),
	('c1d54507-b217-48b4-8c78-f0c22a6c7c33','6b896c77-1170-44f4-9e68-6390c542d921','f5692e57-31a0-4f94-a303-e8540081eebb',45,68,66.18,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('c4f20395-0643-441c-b7e5-296b52878a94','b47bd34e-4a47-4f52-944a-6fb0adee1972','f5692e57-31a0-4f94-a303-e8540081eebb',89,130,68.46,6,1,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('c66feb80-891b-4740-b038-e6c691ac025c','6b896c77-1170-44f4-9e68-6390c542d921','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',55,50,110.00,2,3,'2014-11-11 15:10:52','2014-12-05 12:22:02'),
	('c9ebab24-31b9-4d2e-be6d-4ffb257ba753','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','23a28ffc-4827-40e7-928f-5e80e33ad42e',66,70,94.29,3,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('d644cd49-149e-4535-98fc-c9505aba902c','7ffa3c2f-bfc6-4d14-95ab-98b358145124','841fce60-0178-450f-99e8-ad1670f5c84f',45,67,67.16,4,0,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('d9247b0b-805c-4520-81fe-4b4c2b1c0d38','04ae289c-9c90-4b7e-8cbe-f5068e727908','23a28ffc-4827-40e7-928f-5e80e33ad42e',4,6,66.67,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('da9a329c-7abe-4dbb-95a3-5f91a6fcab2e','44aa7fd1-163d-4ff7-8117-ec436c161271','ca098580-87f0-4f06-b3af-225d9946926b',45,67,67.16,2,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('e11dcccb-2e06-43cb-be02-dfaf25bc0fbe','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','ca098580-87f0-4f06-b3af-225d9946926b',18,23,78.26,1,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('ee0c4f44-b058-42ff-8e99-4d2c89220dc4','34778d6a-c734-4849-bc0f-3bbb5ee2815a','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',44,38,115.79,6,1,'2014-12-04 10:51:58','2014-12-04 10:51:58'),
	('f882864e-460b-42be-8836-f29c73570848','9f5f196e-2243-4bd8-90e1-3879b339a4ee','841fce60-0178-450f-99e8-ad1670f5c84f',19,22,86.36,3,0,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('fbb4600b-0308-4f11-af9b-34d4cb82d8d0','31504635-25f4-4a5f-a133-dae79d29c194','ca098580-87f0-4f06-b3af-225d9946926b',5,7,71.43,0,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('fc04c552-78de-4601-98c4-a0a0801fb8fb','fb359c6a-5ae9-4c03-8a96-20b471326f3a','841fce60-0178-450f-99e8-ad1670f5c84f',19,25,76.00,3,0,'2014-11-13 11:31:07','2014-12-05 12:22:02'),
	('fe241fc5-6a0a-44d3-b9be-89431dcf1dbb','1a902086-d506-4115-8fbe-88fe516eaf9f','f5692e57-31a0-4f94-a303-e8540081eebb',78,90,86.67,6,1,'2014-12-08 12:52:17','2014-12-08 12:52:17');

/*!40000 ALTER TABLE `batsmen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bowlers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bowlers`;

CREATE TABLE `bowlers` (
  `id` char(36) NOT NULL,
  `player_id` char(36) NOT NULL,
  `innings_id` char(36) NOT NULL,
  `overs` int(11) NOT NULL DEFAULT '0',
  `runs` int(11) NOT NULL DEFAULT '0',
  `economy` float(10,2) NOT NULL DEFAULT '0.00',
  `maidens` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bowlers_player_id_idx` (`player_id`),
  KEY `fk_bowlers_innings_id_idx` (`innings_id`),
  CONSTRAINT `fk_bowlers_innings_id` FOREIGN KEY (`innings_id`) REFERENCES `innings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bowlers_player_id` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bowlers` WRITE;
/*!40000 ALTER TABLE `bowlers` DISABLE KEYS */;

INSERT INTO `bowlers` (`id`, `player_id`, `innings_id`, `overs`, `runs`, `economy`, `maidens`, `created`, `modified`)
VALUES
	('00622628-4788-45de-b108-3d5fca5e08a4','0858597c-0299-4d14-aa17-6a5424b9b14b','841fce60-0178-450f-99e8-ad1670f5c84f',20,89,4.45,4,'2014-11-13 11:35:52','2014-12-05 12:22:02'),
	('091a7ab5-299d-43aa-a06b-ae2133e4fe4c','6263861c-5f99-4f19-86ef-8de61e459a1e','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',12,35,2.92,0,'2014-10-21 14:16:59','2014-12-05 12:22:02'),
	('18d84763-1672-4282-a756-32ca886d83d0','04ae289c-9c90-4b7e-8cbe-f5068e727908','ca098580-87f0-4f06-b3af-225d9946926b',22,84,3.82,2,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('1f528859-63e2-4881-8007-28e069f5c474','d59140ba-7426-4570-a217-43b44cb07474','5267764a-01a6-4a1c-8cfb-40c762c64454',13,47,3.62,3,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('20b22d3a-ad26-4eb4-957c-ca70cf2bc55a','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',15,89,5.93,8,'2014-11-11 10:52:40','2014-12-05 12:22:02'),
	('25cbe071-2b73-479e-bc32-ba57c7c3417a','7ffa3c2f-bfc6-4d14-95ab-98b358145124','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',23,99,4.30,4,'2014-11-13 10:11:44','2014-12-05 12:22:02'),
	('26004565-45bf-4e68-a18a-c05a94c3794a','04ae289c-9c90-4b7e-8cbe-f5068e727908','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',24,76,3.17,4,'2014-12-04 10:51:58','2014-12-04 10:51:58'),
	('2c2c51a5-f91f-4a3b-b7f0-912af34caba8','604cb429-d66f-4af3-8757-e162ca592e41','f5692e57-31a0-4f94-a303-e8540081eebb',15,73,4.87,5,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('2f1be178-ba3c-4ba7-8262-5dda6249144a','7191769f-cf4c-48b1-8913-77c503d23da1','5267764a-01a6-4a1c-8cfb-40c762c64454',14,86,6.14,4,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('35220e2d-4dce-44b8-b5ff-dbc949a80a9b','03a152b6-6c79-40f1-af1e-0751a6af60ba','23a28ffc-4827-40e7-928f-5e80e33ad42e',23,89,3.87,2,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3707bea1-f5c1-4f8d-b712-c1f5315346f1','ea2c564d-6dda-4af4-91ea-53a16f5c827e','f5692e57-31a0-4f94-a303-e8540081eebb',15,53,3.53,4,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('37ef56eb-8b48-4a1c-9ee3-259727106e68','04ae289c-9c90-4b7e-8cbe-f5068e727908','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece',24,76,3.17,4,'2014-12-04 10:54:55','2014-12-04 10:54:55'),
	('38536fdc-0d2e-4ff4-b331-3caa9cadb20e','0858597c-0299-4d14-aa17-6a5424b9b14b','5267764a-01a6-4a1c-8cfb-40c762c64454',22,67,3.05,6,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('44761419-a9c2-4599-b7ee-5df51a69f91d','03a152b6-6c79-40f1-af1e-0751a6af60ba','f5692e57-31a0-4f94-a303-e8540081eebb',23,87,3.78,6,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('4d6cd66d-77e7-4be3-bdbb-027c95b157cd','87c90006-0abb-492a-8756-4e46b9408106','f5692e57-31a0-4f94-a303-e8540081eebb',18,46,2.56,3,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('555f2f78-506e-4b7e-8c4d-b926116d00f0','d59140ba-7426-4570-a217-43b44cb07474','841fce60-0178-450f-99e8-ad1670f5c84f',15,88,5.87,3,'2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('5bed04d8-3ac8-4391-bfe3-cd85c3a5b001','7191769f-cf4c-48b1-8913-77c503d23da1','ca098580-87f0-4f06-b3af-225d9946926b',24,67,2.79,6,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('75de22fe-c660-436c-ae50-28d93df4c794','04ae289c-9c90-4b7e-8cbe-f5068e727908','5267764a-01a6-4a1c-8cfb-40c762c64454',21,89,4.24,4,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('7ae1baae-9901-4255-a152-302a4cdf63fb','d59140ba-7426-4570-a217-43b44cb07474','ca098580-87f0-4f06-b3af-225d9946926b',16,47,2.94,4,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('7c86118f-f221-4eb3-9a2e-9ad361e6f10f','fb359c6a-5ae9-4c03-8a96-20b471326f3a','f949bb45-3d8b-46f5-8967-cc1340a9c1e7',3,45,15.00,3,'2014-11-12 15:50:17','2014-12-05 12:22:02'),
	('8d72d7c5-1ae2-47b8-8261-3e7733f1650b','04ae289c-9c90-4b7e-8cbe-f5068e727908','841fce60-0178-450f-99e8-ad1670f5c84f',17,78,4.59,3,'2014-11-13 09:55:24','2014-12-05 12:22:02'),
	('8f735028-61f1-48dc-a309-4b059d572565','0858597c-0299-4d14-aa17-6a5424b9b14b','ca098580-87f0-4f06-b3af-225d9946926b',21,78,3.71,3,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('a33b6509-5b0f-4681-afbd-088d518456c0','31504635-25f4-4a5f-a133-dae79d29c194','f5692e57-31a0-4f94-a303-e8540081eebb',21,98,4.67,2,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('afb3e631-563c-4f3a-a5b0-17b66010d1b4','539b1fd7-50a6-4e3b-9b66-c91370e3909b','841fce60-0178-450f-99e8-ad1670f5c84f',20,67,3.35,5,'2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('c8e168c9-5894-4f6f-a95f-1c1a2e5685a1','31504635-25f4-4a5f-a133-dae79d29c194','23a28ffc-4827-40e7-928f-5e80e33ad42e',18,68,3.78,7,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('d2ccf142-5d39-4bdd-93da-502bbfd3b209','604cb429-d66f-4af3-8757-e162ca592e41','23a28ffc-4827-40e7-928f-5e80e33ad42e',21,74,3.52,3,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('dbc9d9d0-2bff-459f-b8ec-6d353be26055','ea2c564d-6dda-4af4-91ea-53a16f5c827e','23a28ffc-4827-40e7-928f-5e80e33ad42e',23,59,2.57,5,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('f6d882e8-6a22-403a-86f0-bfa3247619e1','78ef2b5e-a27d-4cf0-8fdf-d3a9579a5e87','93daddf5-256b-4420-b636-0db626baae72',20,78,3.90,3,'2014-11-13 14:40:56','2014-12-04 10:54:55');

/*!40000 ALTER TABLE `bowlers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table clubs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clubs`;

CREATE TABLE `clubs` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_dir` varchar(255) DEFAULT NULL,
  `league_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teams_league_id_idx` (`league_id`),
  CONSTRAINT `fk_teams_league_id` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;

INSERT INTO `clubs` (`id`, `name`, `alt_name`, `image`, `image_dir`, `league_id`, `created`, `modified`)
VALUES
	('0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','Worcestershire','Rapids','Worcestershire_County_Cricket_Club_logo.svg.png','3c419f9d-49a0-4e32-a19b-22ab8a6bc420','c2a21701-dd04-47de-8528-6813760319d3','2014-11-13 15:04:13','2014-12-01 14:48:50'),
	('365ef793-2260-458a-821c-5fb27ad13a71','Yorkshire','Vikings','Yorkshire_Cricket_logo.png','ef1034c9-482a-4b13-be82-da4ce590c3f9','c2a21701-dd04-47de-8528-6813760319d3','2014-10-06 11:42:16','2014-12-01 14:48:58'),
	('e27619ad-60f4-4c41-be2d-859cd6bd60bc','Hampshire','Royals','2014-hampshire-cricket-logo.jpg','cf52e1a9-52c7-48db-962e-436e38d6bece','c2a21701-dd04-47de-8528-6813760319d3','2014-10-06 11:42:02','2014-12-01 14:46:16');

/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dismissals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dismissals`;

CREATE TABLE `dismissals` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dismissals` WRITE;
/*!40000 ALTER TABLE `dismissals` DISABLE KEYS */;

INSERT INTO `dismissals` (`id`, `name`, `created`, `modified`)
VALUES
	('1e83a8a8-a76f-454b-95e3-db86e2611947','Hit wicket','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('2d00d137-018a-4d09-a2de-ce6dd69a33fc','Run out','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('3329f681-62fc-4f21-8165-5ec07b9cda4f','Stumped','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('5130f072-31b2-4555-8576-b6b97c1887d2','Bowled','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('5228258e-2e3f-4151-a124-e7d2ace22a14','Hit the ball twice','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('575b8e6e-a6ed-4eed-8a06-3cbb087c8a7a','Retired','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','Caught','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('afa2cc0e-655e-4a64-852e-f7c65f55adfd','Handled the ball','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('d78a9a94-4b58-4216-a9a5-4085fac8c07a','Obstructing the field','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('dc215a8e-0805-43d3-8650-5142ae724e4d','Timed out','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','Leg before','2014-09-06 11:42:00','2014-09-06 11:42:00');

/*!40000 ALTER TABLE `dismissals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table formats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `formats`;

CREATE TABLE `formats` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `formats` WRITE;
/*!40000 ALTER TABLE `formats` DISABLE KEYS */;

INSERT INTO `formats` (`id`, `name`, `description`, `created`, `modified`)
VALUES
	('67b7899f-386d-4707-b62d-86c02f36c3e4','T20','Twenty twenty match played 20 overs each side.','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('9d77b08c-8b71-4cc8-ab61-3882bc5ab4eb','One Day','A one day match played over 50 overs each.','2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('a2ff8173-00d0-4806-a9a7-b737a1398b0d','Test Match','A full five day test match','2014-09-06 11:42:00','2014-09-06 11:42:00');

/*!40000 ALTER TABLE `formats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table innings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `innings`;

CREATE TABLE `innings` (
  `id` char(36) NOT NULL,
  `innings_type_id` char(36) NOT NULL,
  `match_id` char(36) NOT NULL,
  `team_id` char(36) NOT NULL,
  `wides` int(11) DEFAULT '0',
  `byes` int(11) DEFAULT '0',
  `leg_byes` int(11) DEFAULT '0',
  `no_balls` int(11) DEFAULT '0',
  `penalty_runs` int(11) DEFAULT '0',
  `declared` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_scores_match_id_idx` (`match_id`),
  KEY `fk_innings_team_id_idx` (`team_id`),
  KEY `fk_innings_type_id_idx` (`innings_type_id`),
  CONSTRAINT `fk_innings_match_id` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_innings_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_innings_type_id` FOREIGN KEY (`innings_type_id`) REFERENCES `innings_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `innings` WRITE;
/*!40000 ALTER TABLE `innings` DISABLE KEYS */;

INSERT INTO `innings` (`id`, `innings_type_id`, `match_id`, `team_id`, `wides`, `byes`, `leg_byes`, `no_balls`, `penalty_runs`, `declared`, `created`, `modified`)
VALUES
	('23a28ffc-4827-40e7-928f-5e80e33ad42e','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','137a1d06-dc85-4b11-adbe-ca8670ce677a','b9b5052e-db9a-40b6-9622-2ccea5a4a097',7,8,11,0,0,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('5267764a-01a6-4a1c-8cfb-40c762c64454','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','137a1d06-dc85-4b11-adbe-ca8670ce677a','30c50818-9c0c-48f7-8061-19f9d8796e8c',3,4,3,1,0,0,'2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('841fce60-0178-450f-99e8-ad1670f5c84f','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','37c844c1-22ad-471f-8666-bb4c40cfc894','87a30699-d411-475e-a6d4-d322f57f3c77',5,6,3,2,0,0,'2014-11-11 12:30:45','2014-12-05 12:22:02'),
	('93daddf5-256b-4420-b636-0db626baae72','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','64d802e3-27dd-4c60-8f94-c9390b96befc','421a8748-8e8d-461c-9422-15842384f456',3,4,2,0,0,0,'2014-11-13 14:40:56','2014-12-04 10:54:55'),
	('b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','64d802e3-27dd-4c60-8f94-c9390b96befc','1e14ab64-b157-4961-95cf-051d7bad698c',10,5,1,2,0,0,'2014-11-13 14:40:56','2014-12-04 10:54:55'),
	('ca098580-87f0-4f06-b3af-225d9946926b','581de44f-a61b-4dc0-b418-4d012412e578','137a1d06-dc85-4b11-adbe-ca8670ce677a','30c50818-9c0c-48f7-8061-19f9d8796e8c',3,4,2,1,0,0,'2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('f5692e57-31a0-4f94-a303-e8540081eebb','581de44f-a61b-4dc0-b418-4d012412e578','137a1d06-dc85-4b11-adbe-ca8670ce677a','b9b5052e-db9a-40b6-9622-2ccea5a4a097',2,4,1,2,0,0,'2014-12-08 12:52:17','2014-12-08 15:40:44'),
	('f949bb45-3d8b-46f5-8967-cc1340a9c1e7','0897feb6-fb99-49cc-8d62-1ba4142bc3b0','37c844c1-22ad-471f-8666-bb4c40cfc894','599206dc-8f4b-420e-8fbd-93d7b713a1c4',2,1,4,0,0,0,'2014-11-11 12:09:27','2014-12-05 12:22:02');

/*!40000 ALTER TABLE `innings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table innings_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `innings_types`;

CREATE TABLE `innings_types` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `innings_types` WRITE;
/*!40000 ALTER TABLE `innings_types` DISABLE KEYS */;

INSERT INTO `innings_types` (`id`, `name`, `created`, `modified`)
VALUES
	('0897feb6-fb99-49cc-8d62-1ba4142bc3b0','1st Innings','2014-10-27 10:20:36','2014-10-27 10:20:36'),
	('581de44f-a61b-4dc0-b418-4d012412e578','2nd Innings','2014-10-27 10:20:50','2014-10-27 10:20:50');

/*!40000 ALTER TABLE `innings_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leagues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leagues`;

CREATE TABLE `leagues` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `image_dir` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `leagues` WRITE;
/*!40000 ALTER TABLE `leagues` DISABLE KEYS */;

INSERT INTO `leagues` (`id`, `name`, `description`, `image`, `image_dir`, `created`, `modified`)
VALUES
	('67e8c98f-4a96-4206-8119-393081397aa8','Division Two','','Array','','2014-10-06 11:40:16','2014-10-23 11:21:44'),
	('c2a21701-dd04-47de-8528-6813760319d3','Division One','','','','2014-10-06 11:40:07','2014-10-06 11:40:07');

/*!40000 ALTER TABLE `leagues` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table matches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `matches`;

CREATE TABLE `matches` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `when_played` datetime NOT NULL,
  `venue_id` char(36) NOT NULL,
  `format_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matches_venue_id_idx` (`venue_id`),
  KEY `fk_matches_format_id_idx` (`format_id`),
  CONSTRAINT `fk_matches_format_id` FOREIGN KEY (`format_id`) REFERENCES `formats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matches_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;

INSERT INTO `matches` (`id`, `name`, `when_played`, `venue_id`, `format_id`, `created`, `modified`)
VALUES
	('137a1d06-dc85-4b11-adbe-ca8670ce677a','Worcestershire 1st XI v Yorkshire 1st XI','2014-10-11 10:00:00','42b0d8f0-2b2d-4fe4-b056-847143927c20','a2ff8173-00d0-4806-a9a7-b737a1398b0d','2014-12-02 16:42:11','2014-12-08 12:52:17'),
	('37c844c1-22ad-471f-8666-bb4c40cfc894','Hampshire v Yorkshire First ODI','2014-10-06 11:00:00','42b0d8f0-2b2d-4fe4-b056-847143927c20','9d77b08c-8b71-4cc8-ab61-3882bc5ab4eb','2014-10-06 13:16:06','2014-12-05 12:22:02'),
	('64d802e3-27dd-4c60-8f94-c9390b96befc','Hampshire v Yorkshire Second ODI','2014-11-30 10:30:00','42b0d8f0-2b2d-4fe4-b056-847143927c20','9d77b08c-8b71-4cc8-ab61-3882bc5ab4eb','2014-10-29 16:01:33','2014-12-04 10:54:55');

/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table player_specialisations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `player_specialisations`;

CREATE TABLE `player_specialisations` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `player_specialisations` WRITE;
/*!40000 ALTER TABLE `player_specialisations` DISABLE KEYS */;

INSERT INTO `player_specialisations` (`id`, `name`, `description`, `created`, `modified`)
VALUES
	('44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','Bowler',NULL,'2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','Allrounder',NULL,'2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','Wicket keeper batsman',NULL,'2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('ba1cb749-5b49-4130-81b8-a1164e6139e2','Batsman',NULL,'2014-09-06 11:42:00','2014-09-06 11:42:00'),
	('dae074b1-b7ef-4010-a0bd-af82fa4502b2','Wicket keeper',NULL,'2014-09-06 11:42:00','2014-09-06 11:42:00');

/*!40000 ALTER TABLE `player_specialisations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `initials` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `bats` varchar(255) DEFAULT NULL,
  `bowls` varchar(255) DEFAULT NULL,
  `player_specialisation_id` char(36) NOT NULL,
  `club_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_players_county_id_idx` (`club_id`),
  KEY `fk_players_specialisation_id_idx` (`player_specialisation_id`),
  CONSTRAINT `fk_players_county_id` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_players_specialisation_id` FOREIGN KEY (`player_specialisation_id`) REFERENCES `player_specialisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`id`, `first_name`, `initials`, `last_name`, `slug`, `photo`, `photo_dir`, `number`, `nationality`, `bats`, `bowls`, `player_specialisation_id`, `club_id`, `created`, `modified`)
VALUES
	('03a152b6-6c79-40f1-af1e-0751a6af60ba','Jack','','Shantry','jack-shantry','jack-shantry.jpg','87fa386c-c6bc-49b4-95fc-d4023dc2fae8',11,'British','Left hand bat','Left arm medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 12:26:56','2014-11-17 12:26:56'),
	('04ae289c-9c90-4b7e-8cbe-f5068e727908','Ryan','J','Sidebottom','ryan-j-sidebottom','ryan-sidebottom.jpg','cc102fad-05a3-4e38-8ea9-5f6bab58b706',11,'British','Left hand bat','Left arm fast medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:58:57','2014-12-01 12:12:28'),
	('07adc7ba-50ee-43b1-b616-1cfd52ba8c11','Sean','','Ervine','sean-ervine','Ervine-2014-Headshot-Whites.jpg','aecb5a5e-a2b7-4f7c-8480-4e882faaa905',7,'British','Left hand bat','Right arm medium','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:05:52','2014-12-01 13:57:51'),
	('0858597c-0299-4d14-aa17-6a5424b9b14b','Liam','','Plunkett','liam-plunkett','liam-plunkett.jpg','8dfb87f9-b538-461d-82d4-53b00fa6a40f',28,'British','Right hand bat','Right arm fast medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:55:41','2014-12-01 12:12:52'),
	('1a902086-d506-4115-8fbe-88fe516eaf9f','Adam','','Lyth','adam-lyth','adam-lyth.jpg','78e3fe62-498f-4a03-8c7e-6d1e7f0d4a39',9,'British','Left hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:54:19','2014-12-01 13:44:27'),
	('31504635-25f4-4a5f-a133-dae79d29c194','Chris','','Russel','chris-russel','chris-russel.jpg','8e7873b8-be36-4c23-93da-9ce901bc5b93',18,'British','Right hand bat','Right arm fast medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:09:51','2014-11-17 12:36:12'),
	('318ee263-4442-4820-b2b5-903c6294fdcb','Andrew','','Gale','andrew-gale','andrew-gale.jpg','ae906899-551e-4561-a3d4-4d00cb0e1837',26,'British','Left hand bat','','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:50:04','2014-12-01 13:45:20'),
	('34778d6a-c734-4849-bc0f-3bbb5ee2815a','Jimmy','','Adams','jimmy-adams','Adams-2014-Headshot-Whites.jpg','9fd1ae92-a012-4ee2-a4d7-50325925efa2',4,'British','Left hand bat','Left arm medium fast','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:01:50','2014-12-01 13:59:46'),
	('3767383d-efa0-4c42-bb06-d29561650ab4','Adam','','Wheater','adam-wheater','Wheater-2014-Headshot-Whites.jpg','90d5a932-8290-4b0f-98a8-d9fc95265ab9',31,'British','Right hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:10:19','2014-12-01 13:59:03'),
	('3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','Joe','','Clarke','joe-clarke','joe-clarke.jpg','b29658e2-45a8-4a4d-be3d-939c4cf8b72b',33,'British','Right hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 11:48:06','2014-12-01 11:48:06'),
	('44aa7fd1-163d-4ff7-8117-ec436c161271','Tom','','Kohler-Cadmore','tom-kohler-cadmore','tom-kholer-cadmore.jpg','98f3ba31-28e5-43fc-890a-19a36f7b0ea9',32,'British','Right hand bat','Right arm off break','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 12:04:54','2014-12-01 12:05:24'),
	('47701045-d1b8-40ad-98ca-c468471d488c','Ed','','Barnard','ed-barnard','ed-barnard.jpg','4864643c-2eb6-4afd-916b-6919cf6ed2bf',30,'British','Right hand bat','Right arm fast medium','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:11:19','2014-12-01 11:42:06'),
	('51ab8b3f-0f16-459a-9010-49f31b277c5b','Ben','','Cox','ben-cox','ben-cox.jpg','baa849b6-60f8-4c6a-abc4-bf4d54867991',10,'British','Right hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:07:08','2014-12-01 11:41:31'),
	('539b1fd7-50a6-4e3b-9b66-c91370e3909b','Tim','','Bresnan','tim-bresnan','tim-bresnan.jpg','657bf5be-a4cd-4561-8dd1-3883e3497afa',16,'British','Right hand bat','Right arm fast medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:52:36','2014-12-01 12:13:20'),
	('55a96292-8644-4686-8209-ab48e7eb31e0','Joe','','Gatting','joe-gatting','Gatting-2014-Headshot-Whites.jpg','6a9c49f8-cd9e-4aab-84bb-a816d5dbc4c2',6,'British','Right hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:07:27','2014-12-01 14:00:06'),
	('58d058a8-bc24-4b9b-ad9c-5908102005af','Brett','','D\'Oliveira','brett-d-oliveira','brett-d\'oliveira.jpg','61b772ad-0dff-41d3-9927-e960b6dfe251',15,'British','Right hand bat','Right arm leg spin','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:08:03','2014-12-01 11:37:51'),
	('604cb429-d66f-4af3-8757-e162ca592e41','Shaaiq','','Choudry','shaaiq-choudry','shaaiq-choudry.jpg','2f013a2f-f172-40ae-836a-b24187f25b33',28,'British','Right hand bat','Slow left arm orthodox','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 12:02:21','2014-12-01 12:02:21'),
	('6263861c-5f99-4f19-86ef-8de61e459a1e','James','','Vince','james-vince','Vince-2014-Headshot-Whites.jpg','ff402c4b-2af6-46a9-8c7d-93469e39d05e',14,'British','Right hand bat','Right arm medium','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:02:26','2014-12-01 14:00:25'),
	('6296dae0-b496-425b-8ebe-6f42ddcdacc1','Jack','','Brooks','jack-brooks','jack-brooks.jpg','c36312d1-36dd-49cb-98ba-cac3ef802238',70,'British','Right hand bat','Right arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:53:40','2014-12-01 12:19:51'),
	('643cd5ae-fa38-476b-9557-b1a110ff866c','Sean','','Terry','sean-terry','Terry-2014-Headshot-Whites.jpg','77870908-696a-4111-adda-c6cac82572f3',10,'British','Right hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:08:45','2014-12-01 14:00:50'),
	('64912def-e36f-4e8e-877d-a7b5a9c15d9d','Graeme','','Whiles','graeme-whiles','graeme-whiles.jpg','a5116577-4e67-49ac-b3c4-dc4e40f59907',36,'British','Left hand bat','Right arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:32:00','2014-11-17 12:31:48'),
	('66eacd70-bf85-49f3-a922-cc6c862cbb06','Saeed','','Ajmal','saeed-ajmal','saeed-ajmal.jpg','acac4bee-a824-499c-8e94-459bc965bf9c',50,'Pakistan','Right hand bat','Right arm off break','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 12:01:05','2014-12-01 12:01:05'),
	('6b896c77-1170-44f4-9e68-6390c542d921','Jonathan','','Bairstow','jonathan-bairstow','jonathan-bairstow.jpg','a62e7499-393d-4b94-8e54-42f9fd70a0f6',21,'','Right hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:50:48','2014-12-01 12:22:09'),
	('6f38fbc8-fe09-4628-94d1-847453f6da05','Richard','','Oliver','richard-oliver','richard-oliver.jpg','dad4c733-4c65-4c0c-95c9-a447f2126fd6',43,'British','Left hand bat','Right arm medium','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 09:44:56','2014-12-01 11:42:42'),
	('7191769f-cf4c-48b1-8913-77c503d23da1','Steven','','Patterson','steven-patterson','steven-patterson.jpg','c829bd05-8119-411f-a943-648e39c6175f',17,'British','Right hand bat','Right arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:54:59','2014-12-01 12:20:22'),
	('7800a827-7f2d-4048-87dd-5634184338aa','Charlie','','Morris','charlie-morris','charlie-morris.jpg','1ee16b72-655b-4307-b7e6-126b0fe95b37',31,'British','Right hand bat','Right arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:09:39','2014-12-01 11:36:59'),
	('78d075d8-9a5f-4ce0-b8ce-e5408d943d32','Tom','','Alsop','tom-alsop','Alsop-Headshot-Whites-LMI.jpg','cbd9dc4d-0ff7-44b9-a187-62656bf8151b',9,'British','Left hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:02:54','2014-12-01 13:54:48'),
	('78ef2b5e-a27d-4cf0-8fdf-d3a9579a5e87','James','','Tomlinson','james-tomlinson','Tomlinson-2014-Headshot-Whites.jpg','0192f171-1ef4-412d-811f-862fb135df7c',21,'British','Left hand bat','Left arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:09:49','2014-12-01 13:56:14'),
	('7da86b45-89f6-4cca-bf25-e8131df7c863','Gary','','Ballance','gary-ballance','gary-ballance.jpg','450175ca-2de2-4f6e-842d-52b11fa4df20',19,'British','Left hand bat','','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:51:36','2014-12-01 13:46:15'),
	('7ffa3c2f-bfc6-4d14-95ab-98b358145124','Brad','','Taylor','brad-taylor','Brad Taylor-2014-LMI-.jpg','f002775f-8a70-40e2-8f6c-9cab7d1753e9',NULL,'British','Right hand bat','Right arm offbreak','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:09:20','2014-12-01 13:56:47'),
	('87c90006-0abb-492a-8756-4e46b9408106','Gareth','','Andrew','gareth-andrew','gareth-andrew.jpg','880d1478-75e2-4693-947e-3257a6421eca',14,'British','Left hand bat','Right arm medium fast','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:11:58','2014-12-01 11:38:15'),
	('916c1a25-7ce8-4636-ad66-928de0aa6bd7','Joe','','Leach','joe-leach','joe-leach.jpg','aa0fd3dc-fc78-4a33-8501-f631eaea47b4',23,'British','Right hand bat','Right ar','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 11:49:43','2014-12-01 11:59:08'),
	('9434775d-3bbf-40b2-a15c-14f2fd115ff0','Tom','','Fell','tom-fell','tom-fell.jpg','0ce4ae79-88f5-4146-a221-aca0f0e30271',29,'British','Right hand bat','Right arm off spin','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 12:04:10','2014-12-01 12:04:10'),
	('960f3bdd-8aa4-4c73-a308-e74af54fbc1e','Kane','','Williamson','kane-williamson','kane-williamson.jpg','7e3a126e-1ce2-4951-b568-1bcdb6dd55de',8,'New Zealand','Right hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:59:53','2014-12-01 15:18:25'),
	('9e5f1cb5-20fa-468c-b67d-5216010d17ef','Tom','','Barber','tom-barber','Barber-2014-Headshot-Whites.jpg','bae7649f-2ec8-4498-89a9-0d678f9c3b08',20,'British','Right hand bat','Left arm fast medium','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:03:22','2014-12-01 13:57:07'),
	('9f5f196e-2243-4bd8-90e1-3879b339a4ee','Chris','','Wood','chris-wood','Wood-2014-Headshot-Whites.jpg','78b401be-3403-444d-b767-622f629e9be8',25,'British','Right hand bat','Left arm medium fast','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:10:46','2014-12-01 13:58:13'),
	('ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','Aaron','','Finch','aaron-finch','AaronFinch.jpg','148131c4-6476-4f92-84cd-491663655f22',20,'Australian','Right hand bat','Left arm spin','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 12:00:37','2014-12-01 15:19:11'),
	('b14acab3-9cbe-4f95-a93e-ddea09bad5d8','Richard','','Pyrah','richard-pyrah','richard-pyrah.jpg','48b80a29-29d8-467c-97f7-0b1a3890d36d',27,'British','Right hand bat','Right arm medium fast','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:56:17','2014-12-01 12:20:51'),
	('b1f88655-7d73-4efd-b972-70e477384f1c','Ross','','Whiteley','ross-whiteley','ross-whiteley.jpg','ecca37a2-77d0-4e46-bc27-39b70ba87b01',44,'British','Left hand bat','Left arm medium','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-12-01 11:52:02','2014-12-01 11:52:02'),
	('b47bd34e-4a47-4f52-944a-6fb0adee1972','Joe','','Root','joe-root','joe-root.jpg','bae99f97-c501-45b7-8c78-74a1e30f0977',5,'British','Right hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:58:28','2014-12-01 13:55:28'),
	('ba5126f3-67ea-4797-a390-3c45f3fd1185','Liam','','Dawson','liam-dawson','Dawson-2014-Headshot-Whites.jpg','559e72fd-3bda-4326-a327-ef6228144815',8,'British','Right hand bat','Slow left arm orthodox','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:05:27','2014-12-01 13:58:31'),
	('c3295f97-49f0-4284-9dea-cadbd9f371e7','Daryl','','Mitchell','daryl-mitchell','daryl-mitchell.jpg','543f5149-5f44-4353-be8b-34e0431ee27e',27,'British','Right hand bat','Right arm medium','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-13 15:09:07','2014-12-01 11:38:48'),
	('c3f3c393-cea6-4a0b-9fd2-8cf664bde8f6','Will','','Smith','will-smith','Smith-2014-Headshots-Whites.jpg','e2e2f83a-afdc-4e44-bb38-626dbe6caac0',2,'British','Right hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:08:17','2014-12-01 14:01:08'),
	('c935e742-88ad-4e03-b583-f47e9b17fd2d','Alex','','Hepburn','alex-hepburn','alex-hepburn.jpg','a463305c-32ef-4f37-ad1e-df1a6a2673d1',26,'British','Right hand bat','','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 09:51:47','2014-12-01 11:43:22'),
	('cac70db7-d83f-4357-a986-234fe483d361','Matt','','Coles','matt-coles','Coles-2014-Headshot-Whites.jpg','ec66c522-ffa8-4741-8653-46d76aca6fa5',26,'British','Left hand bat','Right arm fast medium','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:04:53','2014-12-01 13:58:46'),
	('d59140ba-7426-4570-a217-43b44cb07474','Adil','U','Rashid','adil-u-rashid','adil-rashid.jpg','8bb6e73d-a35c-4103-8de8-8f03d955fcb1',3,'British','Right hand bat','Right arm leg break','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','365ef793-2260-458a-821c-5fb27ad13a71','2014-10-06 11:57:26','2014-12-01 12:21:23'),
	('d96c288d-48aa-4978-80fa-dc99afd5fd05','George','','Rhodes','george-rhodes','george-rhodes.jpg','de5ea04a-4713-404e-bc15-4bb55a10fe70',24,'British','Right hand bat','R','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:12:30','2014-12-01 11:43:45'),
	('de586893-818d-492c-a9e8-7b01bbbff164','Lewis','','McManus','lewis-mcmanus','McManus-2014-Headshot-Whites.jpg','0f9c7b63-70ec-43f4-bcb9-da520c85cb52',18,'British','Right hand bat','','6b28c251-22b1-4c9e-a8ce-2c1ce401b86e','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:07:54','2014-12-01 13:59:23'),
	('e3b49d73-805e-4046-8e76-de635872bb7a','Michael','','Carberry','michael-carberry','Carberry-2014-Headshot-Whites.jpg','92d4c937-e02b-4126-986a-fce0c6e7b8cd',15,'British','Left hand bat','Right arm offbreak','ba1cb749-5b49-4130-81b8-a1164e6139e2','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:04:27','2014-12-01 14:01:34'),
	('ea2c564d-6dda-4af4-91ea-53a16f5c827e','Moeen','','Ali','moeen-ali','moeen-ali.jpg','33a7cac9-1b97-4503-933b-0cb3c445f7bb',8,'British','Left hand bat','Right arm off spin','491f01b6-8ef9-4b66-b80d-9a7f2bb74a1f','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 09:48:55','2014-12-01 11:39:08'),
	('fb359c6a-5ae9-4c03-8a96-20b471326f3a','Danny','','Briggs','danny-briggs','Briggs-2014-Headshot-Whites.jpg','aca989c6-3c85-40d7-8243-e6c07d9f182b',19,'British','Right hand bat','Left arm orthodox','44f2b76c-c7cf-44e9-a33f-34a2fe07f4da','e27619ad-60f4-4c41-be2d-859cd6bd60bc','2014-10-06 12:03:58','2014-12-01 13:57:25'),
	('fc6097f2-755c-4626-8510-43f2f91c85b1','Alexei','','Kervezee','alexei-kervezee','alexi-kervezee.jpg','20bf8fd7-ff61-44d1-8ecb-45cd8f2ea461',5,'Namibian','Right hand bat','Right arm medium','ba1cb749-5b49-4130-81b8-a1164e6139e2','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','2014-11-17 10:06:09','2014-12-01 11:44:18');

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table squads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `squads`;

CREATE TABLE `squads` (
  `id` char(36) NOT NULL,
  `player_id` char(36) NOT NULL,
  `team_id` char(36) NOT NULL,
  `captain` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_squads_player_id_idx` (`player_id`),
  KEY `fk_squads_team_id_idx` (`team_id`),
  CONSTRAINT `fk_squads_player_id` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_squads_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `squads` WRITE;
/*!40000 ALTER TABLE `squads` DISABLE KEYS */;

INSERT INTO `squads` (`id`, `player_id`, `team_id`, `captain`, `position`)
VALUES
	('0817e659-405d-4077-89cd-dc985bc9deb0','604cb429-d66f-4af3-8757-e162ca592e41','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,8),
	('08585eca-089a-4f05-bcf4-e9841a3e0c30','04ae289c-9c90-4b7e-8cbe-f5068e727908','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,11),
	('0a0f2d58-79e3-4a5c-85d0-543a6fe28654','55a96292-8644-4686-8209-ab48e7eb31e0','1e14ab64-b157-4961-95cf-051d7bad698c',0,6),
	('0d5ad16e-1dfc-4273-baae-9602ee5ebe17','539b1fd7-50a6-4e3b-9b66-c91370e3909b','421a8748-8e8d-461c-9422-15842384f456',0,11),
	('0ef1e827-ea75-45e0-8158-1c816cbf0cdc','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,3),
	('0f516799-66b9-46af-8643-57782938064b','318ee263-4442-4820-b2b5-903c6294fdcb','421a8748-8e8d-461c-9422-15842384f456',0,6),
	('12ef18f0-6a5d-431e-9024-04579eae8b39','b14acab3-9cbe-4f95-a93e-ddea09bad5d8','421a8748-8e8d-461c-9422-15842384f456',0,8),
	('17be72eb-273d-4cc2-b3c5-f480772052de','643cd5ae-fa38-476b-9557-b1a110ff866c','1e14ab64-b157-4961-95cf-051d7bad698c',0,3),
	('181c7508-4241-4445-b119-ce612ff43a34','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,7),
	('1c182a74-7749-413f-ac10-7d60430a3129','b47bd34e-4a47-4f52-944a-6fb0adee1972','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,5),
	('1c35f0d2-b411-4094-bade-e95dc421f3d5','fb359c6a-5ae9-4c03-8a96-20b471326f3a','1e14ab64-b157-4961-95cf-051d7bad698c',0,10),
	('1da252c4-8f42-4898-9c93-a9173ace9ec9','04ae289c-9c90-4b7e-8cbe-f5068e727908','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,11),
	('28bd8363-b1fe-455f-912b-578fe0c06883','d59140ba-7426-4570-a217-43b44cb07474','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,9),
	('2f43df3d-e2a1-4798-9b56-fb2138ea6e05','04ae289c-9c90-4b7e-8cbe-f5068e727908','421a8748-8e8d-461c-9422-15842384f456',0,9),
	('381bd326-cfa5-4588-a6c1-99eaa0ab5409','6263861c-5f99-4f19-86ef-8de61e459a1e','87a30699-d411-475e-a6d4-d322f57f3c77',0,1),
	('3ea3d018-fc98-43e8-bd15-b08bcc0f3f3e','55a96292-8644-4686-8209-ab48e7eb31e0','87a30699-d411-475e-a6d4-d322f57f3c77',0,5),
	('465b9368-ca7e-48a7-987a-1b1e2410fa63','44aa7fd1-163d-4ff7-8117-ec436c161271','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,1),
	('4d5657bb-df2d-4c1f-b44c-a1dff6b8c7d6','6263861c-5f99-4f19-86ef-8de61e459a1e','1e14ab64-b157-4961-95cf-051d7bad698c',1,1),
	('4e6108ca-2714-469e-8826-7fc417157ff6','7da86b45-89f6-4cca-bf25-e8131df7c863','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,4),
	('53fc672f-3506-403e-812a-ce6ea857eede','34778d6a-c734-4849-bc0f-3bbb5ee2815a','1e14ab64-b157-4961-95cf-051d7bad698c',0,2),
	('5aa0a26a-5d93-42b8-b6e2-85b891567a46','0858597c-0299-4d14-aa17-6a5424b9b14b','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,10),
	('5ac348a9-455f-4cd5-9b98-fb796cf1a2e7','78ef2b5e-a27d-4cf0-8fdf-d3a9579a5e87','1e14ab64-b157-4961-95cf-051d7bad698c',0,11),
	('5d580e59-86ad-40c3-bcb3-659e0cd73922','7da86b45-89f6-4cca-bf25-e8131df7c863','421a8748-8e8d-461c-9422-15842384f456',0,4),
	('5e67ec2a-dee8-493a-8ada-5df16e78e990','58d058a8-bc24-4b9b-ad9c-5908102005af','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,2),
	('5fa962c1-5a6b-4916-bf08-ade16cf3f0ba','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','1e14ab64-b157-4961-95cf-051d7bad698c',0,8),
	('62990ce6-df04-4119-937f-284ab69c4d77','7ffa3c2f-bfc6-4d14-95ab-98b358145124','87a30699-d411-475e-a6d4-d322f57f3c77',0,11),
	('62b182ac-f712-4cc7-a6ef-6e6a77aabf1d','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','87a30699-d411-475e-a6d4-d322f57f3c77',0,6),
	('64c78371-716b-4f7c-8e59-1f025a16f863','3767383d-efa0-4c42-bb06-d29561650ab4','1e14ab64-b157-4961-95cf-051d7bad698c',0,4),
	('67b0186b-0835-4df0-bb79-548dd62e9ca1','cac70db7-d83f-4357-a986-234fe483d361','87a30699-d411-475e-a6d4-d322f57f3c77',0,7),
	('73737546-a47e-459c-ace4-b3be0aff6fdc','0858597c-0299-4d14-aa17-6a5424b9b14b','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,10),
	('7866edc3-b84b-4f26-935d-7543252bcac5','3767383d-efa0-4c42-bb06-d29561650ab4','87a30699-d411-475e-a6d4-d322f57f3c77',0,4),
	('7a055b0d-eb72-416e-9b33-74df58cfe68a','6b896c77-1170-44f4-9e68-6390c542d921','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,6),
	('7b2a1a31-e2e4-4ea6-91b7-cf36729f43bf','ea2c564d-6dda-4af4-91ea-53a16f5c827e','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,3),
	('80ba26f8-e517-448e-ae55-ffb6d5b52e74','03a152b6-6c79-40f1-af1e-0751a6af60ba','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,10),
	('84d5a257-3059-4dd0-ad63-fbcd3ae235ec','31504635-25f4-4a5f-a133-dae79d29c194','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,11),
	('8a220d76-7ed7-48d0-be76-000f80b8db6e','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','421a8748-8e8d-461c-9422-15842384f456',1,2),
	('8f63cae7-731f-4f7f-af63-ba57325111de','cac70db7-d83f-4357-a986-234fe483d361','1e14ab64-b157-4961-95cf-051d7bad698c',0,7),
	('98a4968e-11fc-4c64-937e-6a46c1636036','9f5f196e-2243-4bd8-90e1-3879b339a4ee','87a30699-d411-475e-a6d4-d322f57f3c77',0,8),
	('9bc0ca6a-f862-45a8-81f2-8e09f442b786','1a902086-d506-4115-8fbe-88fe516eaf9f','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,3),
	('9e0a73a5-346a-4c3c-8fad-22d9ca12deb6','47701045-d1b8-40ad-98ca-c468471d488c','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,6),
	('a170b77e-403b-4867-8093-c5eff21c4b82','0858597c-0299-4d14-aa17-6a5424b9b14b','421a8748-8e8d-461c-9422-15842384f456',0,10),
	('a5c88f16-0770-4120-9f31-d4f6083b00e3','1a902086-d506-4115-8fbe-88fe516eaf9f','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,2),
	('a6edee4b-7b27-4e49-a2d6-deb2f5f68e1b','1a902086-d506-4115-8fbe-88fe516eaf9f','421a8748-8e8d-461c-9422-15842384f456',0,1),
	('ad1a4940-9339-4772-b4a2-a1a418e57549','318ee263-4442-4820-b2b5-903c6294fdcb','b9b5052e-db9a-40b6-9622-2ccea5a4a097',1,1),
	('b201465d-37e2-4e9d-ae61-55a31769846b','d59140ba-7426-4570-a217-43b44cb07474','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,10),
	('b55c7b80-559e-4bf1-b5b8-13a4d6cc4e75','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,2),
	('b64794f9-66ab-4796-b7f9-6eb62add77c4','6b896c77-1170-44f4-9e68-6390c542d921','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,6),
	('b8b86edc-d338-4c17-98de-2562d5be6eed','ba5126f3-67ea-4797-a390-3c45f3fd1185','87a30699-d411-475e-a6d4-d322f57f3c77',1,9),
	('b9fc5d12-b1c9-4473-aa76-fa6495aaae38','b47bd34e-4a47-4f52-944a-6fb0adee1972','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,5),
	('c426970f-f359-420f-9f15-cbec0241bc3e','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','30c50818-9c0c-48f7-8061-19f9d8796e8c',1,7),
	('c9112e83-8893-40eb-93f7-e4546aea1b44','b47bd34e-4a47-4f52-944a-6fb0adee1972','421a8748-8e8d-461c-9422-15842384f456',0,3),
	('ce687e35-c3ca-4305-8c0a-090414124506','318ee263-4442-4820-b2b5-903c6294fdcb','599206dc-8f4b-420e-8fbd-93d7b713a1c4',1,1),
	('d476b25d-22bb-409c-9a43-9c05cc18f276','643cd5ae-fa38-476b-9557-b1a110ff866c','87a30699-d411-475e-a6d4-d322f57f3c77',0,3),
	('da360375-7c80-4c74-9555-83eae191890d','7191769f-cf4c-48b1-8913-77c503d23da1','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,9),
	('dcc4a76d-2978-4481-bf22-2feecc8e13f5','9434775d-3bbf-40b2-a15c-14f2fd115ff0','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,5),
	('dd53cd86-cfbd-4d0b-8cbb-3b8fb7938f34','6b896c77-1170-44f4-9e68-6390c542d921','421a8748-8e8d-461c-9422-15842384f456',0,5),
	('e460657a-b98c-4f38-ba09-6b78e5ced1ac','9e5f1cb5-20fa-468c-b67d-5216010d17ef','1e14ab64-b157-4961-95cf-051d7bad698c',0,9),
	('e6ef61b8-f847-4120-9edf-f7fc89c22422','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,7),
	('ecc8b3d3-fd34-439e-8943-3732d29df30e','6f38fbc8-fe09-4628-94d1-847453f6da05','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,4),
	('eda70c1b-2f28-407f-9449-87795d849bad','7da86b45-89f6-4cca-bf25-e8131df7c863','b9b5052e-db9a-40b6-9622-2ccea5a4a097',0,4),
	('f197c2b3-82e2-4f70-9147-085a05ccfef0','34778d6a-c734-4849-bc0f-3bbb5ee2815a','87a30699-d411-475e-a6d4-d322f57f3c77',0,2),
	('f3756f64-7ec0-4bd2-9a2a-7243b79579b3','539b1fd7-50a6-4e3b-9b66-c91370e3909b','599206dc-8f4b-420e-8fbd-93d7b713a1c4',0,8),
	('f459480e-aac1-4ba3-a028-eeda47026fd0','fb359c6a-5ae9-4c03-8a96-20b471326f3a','87a30699-d411-475e-a6d4-d322f57f3c77',0,10),
	('f841eee9-c53e-4fb8-93d3-0eaa511fd0e8','ba5126f3-67ea-4797-a390-3c45f3fd1185','1e14ab64-b157-4961-95cf-051d7bad698c',0,5),
	('fb8f1d56-1eb0-47c8-bb3c-f2e1d61ee288','87c90006-0abb-492a-8756-4e46b9408106','30c50818-9c0c-48f7-8061-19f9d8796e8c',0,9),
	('fea9544b-aa6f-48d4-9c2f-bca2163df90e','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','421a8748-8e8d-461c-9422-15842384f456',0,7);

/*!40000 ALTER TABLE `squads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `club_id` char(36) NOT NULL,
  `match_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sides_team_id_idx` (`club_id`),
  KEY `fk_sides_match_id_idx` (`match_id`),
  CONSTRAINT `fk_sides_match_id` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sides_team_id` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `name`, `club_id`, `match_id`, `created`, `modified`)
VALUES
	('1e14ab64-b157-4961-95cf-051d7bad698c','Hampshire 1st XI','e27619ad-60f4-4c41-be2d-859cd6bd60bc','64d802e3-27dd-4c60-8f94-c9390b96befc','2014-11-13 12:45:37','2014-12-03 10:13:31'),
	('30c50818-9c0c-48f7-8061-19f9d8796e8c','Worcestershire 1st XI','0eb298e0-48e6-4ec4-b96a-4eecda7eaae5','137a1d06-dc85-4b11-adbe-ca8670ce677a','2014-12-02 16:52:35','2014-12-03 10:03:23'),
	('421a8748-8e8d-461c-9422-15842384f456','Yorkshire 1st XI','365ef793-2260-458a-821c-5fb27ad13a71','64d802e3-27dd-4c60-8f94-c9390b96befc','2014-11-13 12:43:18','2014-12-03 10:04:29'),
	('599206dc-8f4b-420e-8fbd-93d7b713a1c4','Yorkshire 1st XI','365ef793-2260-458a-821c-5fb27ad13a71','37c844c1-22ad-471f-8666-bb4c40cfc894','2014-10-06 13:56:48','2014-12-03 10:07:40'),
	('87a30699-d411-475e-a6d4-d322f57f3c77','Hampshire 1st XI','e27619ad-60f4-4c41-be2d-859cd6bd60bc','37c844c1-22ad-471f-8666-bb4c40cfc894','2014-10-06 13:56:53','2014-12-03 10:14:20'),
	('b9b5052e-db9a-40b6-9622-2ccea5a4a097','Yorkshire 1st XI','365ef793-2260-458a-821c-5fb27ad13a71','137a1d06-dc85-4b11-adbe-ca8670ce677a','2014-12-02 16:54:12','2014-12-03 10:09:50');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created`, `modified`)
VALUES
	('1','neon1024','neon1024@gmail.com','$2y$10$EHE3vMc2IbSNowxAKVXiLeCgf4Fnp9yJKcN6Ku2gzdox8WdJh8xSi','admin','2014-10-09 09:28:49','2014-10-09 09:28:49');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_dir` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;

INSERT INTO `venues` (`id`, `name`, `location`, `capacity`, `image`, `image_dir`, `created`, `modified`)
VALUES
	('42b0d8f0-2b2d-4fe4-b056-847143927c20','Ageas Bowl','Southampton, Hampshire',25000,'','','2014-10-06 13:15:50','2014-10-06 13:15:50');

/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wickets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wickets`;

CREATE TABLE `wickets` (
  `id` char(36) NOT NULL,
  `lost_wicket_player_id` char(36) NOT NULL,
  `took_wicket_player_id` char(36) NOT NULL,
  `bowler_player_id` char(36) NOT NULL,
  `dismissal_id` char(36) NOT NULL,
  `fall_of_wicket` varchar(255) NOT NULL,
  `innings_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wickets_dismissal_id_idx` (`dismissal_id`),
  KEY `fk_wickets_lost_wicket_player_id_idx` (`lost_wicket_player_id`),
  KEY `fk_wickets_took_wicket_player_id_idx` (`took_wicket_player_id`),
  KEY `fk_wickets_bowler_player_id_idx` (`bowler_player_id`),
  KEY `fk_wickets_innings_id_idx` (`innings_id`),
  CONSTRAINT `fk_wickets_bowler_player_id` FOREIGN KEY (`bowler_player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wickets_dismissal_id` FOREIGN KEY (`dismissal_id`) REFERENCES `dismissals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wickets_innings_id` FOREIGN KEY (`innings_id`) REFERENCES `innings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wickets_lost_wicket_player_id` FOREIGN KEY (`lost_wicket_player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wickets_took_wicket_player_id` FOREIGN KEY (`took_wicket_player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `wickets` WRITE;
/*!40000 ALTER TABLE `wickets` DISABLE KEYS */;

INSERT INTO `wickets` (`id`, `lost_wicket_player_id`, `took_wicket_player_id`, `bowler_player_id`, `dismissal_id`, `fall_of_wicket`, `innings_id`, `created`, `modified`)
VALUES
	('04fe826d-9ede-4cdb-9109-f37da0872158','539b1fd7-50a6-4e3b-9b66-c91370e3909b','7ffa3c2f-bfc6-4d14-95ab-98b358145124','7ffa3c2f-bfc6-4d14-95ab-98b358145124','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','530-8','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:31:40','2014-12-05 12:22:02'),
	('0a1418e3-2882-4ecf-addd-d9478b523e62','318ee263-4442-4820-b2b5-903c6294fdcb','44aa7fd1-163d-4ff7-8117-ec436c161271','03a152b6-6c79-40f1-af1e-0751a6af60ba','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','45-1','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('0c691e03-ca10-4332-8ee7-44eb79a14c75','9434775d-3bbf-40b2-a15c-14f2fd115ff0','0858597c-0299-4d14-aa17-6a5424b9b14b','0858597c-0299-4d14-aa17-6a5424b9b14b','5130f072-31b2-4555-8576-b6b97c1887d2','446-5','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('0d21a9fe-3112-446b-bdc9-1403ad306472','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','7da86b45-89f6-4cca-bf25-e8131df7c863','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','296-7','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('0f760f62-8a08-4f5e-a0f6-24e8fea5508b','03a152b6-6c79-40f1-af1e-0751a6af60ba','6b896c77-1170-44f4-9e68-6390c542d921','d59140ba-7426-4570-a217-43b44cb07474','3329f681-62fc-4f21-8165-5ec07b9cda4f','335-10','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('134e2866-9d1f-41ef-9076-69fa9f875442','6f38fbc8-fe09-4628-94d1-847453f6da05','04ae289c-9c90-4b7e-8cbe-f5068e727908','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','383-4','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('151f0031-059a-4274-adaf-02f838f47860','643cd5ae-fa38-476b-9557-b1a110ff866c','539b1fd7-50a6-4e3b-9b66-c91370e3909b','539b1fd7-50a6-4e3b-9b66-c91370e3909b','5130f072-31b2-4555-8576-b6b97c1887d2','423-9','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('18d2d06d-6294-4e36-98d6-f3ec8c6ad975','7da86b45-89f6-4cca-bf25-e8131df7c863','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','87c90006-0abb-492a-8756-4e46b9408106','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','213-4','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('19f151a7-d628-445c-8629-bb4591f1d1c5','44aa7fd1-163d-4ff7-8117-ec436c161271','0858597c-0299-4d14-aa17-6a5424b9b14b','0858597c-0299-4d14-aa17-6a5424b9b14b','5130f072-31b2-4555-8576-b6b97c1887d2','45-1','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('1b2f31fe-6cb9-489c-8d48-a92357db75da','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','604cb429-d66f-4af3-8757-e162ca592e41','604cb429-d66f-4af3-8757-e162ca592e41','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','402-7','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('1d836bee-341e-487a-b3d2-66cd0e8804c7','58d058a8-bc24-4b9b-ad9c-5908102005af','b47bd34e-4a47-4f52-944a-6fb0adee1972','d59140ba-7426-4570-a217-43b44cb07474','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','89-2','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('1dcf06f3-461c-4368-bdb0-f3dab07f8021','47701045-d1b8-40ad-98ca-c468471d488c','b47bd34e-4a47-4f52-944a-6fb0adee1972','0858597c-0299-4d14-aa17-6a5424b9b14b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','501-6','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('1fac6da5-cc0c-4161-8d81-1568cbe01095','6b896c77-1170-44f4-9e68-6390c542d921','03a152b6-6c79-40f1-af1e-0751a6af60ba','03a152b6-6c79-40f1-af1e-0751a6af60ba','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','347-6','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('21961ebf-0c96-454b-818d-e89aeece1d28','b47bd34e-4a47-4f52-944a-6fb0adee1972','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','31504635-25f4-4a5f-a133-dae79d29c194','3329f681-62fc-4f21-8165-5ec07b9cda4f','302-5','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('283a10f4-07ec-4969-8705-341bcfbbb10b','fb359c6a-5ae9-4c03-8a96-20b471326f3a','b47bd34e-4a47-4f52-944a-6fb0adee1972','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','442-10','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('2f64b2fd-8e27-46f9-9957-ec2ea62203f7','04ae289c-9c90-4b7e-8cbe-f5068e727908','6f38fbc8-fe09-4628-94d1-847453f6da05','03a152b6-6c79-40f1-af1e-0751a6af60ba','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','476-10','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('30f49ded-238f-4b4c-94fe-99c8d51726c4','87c90006-0abb-492a-8756-4e46b9408106','04ae289c-9c90-4b7e-8cbe-f5068e727908','04ae289c-9c90-4b7e-8cbe-f5068e727908','5130f072-31b2-4555-8576-b6b97c1887d2','321-9','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('39c8370c-9406-4755-b93c-2ac5cc2318d8','1a902086-d506-4115-8fbe-88fe516eaf9f','31504635-25f4-4a5f-a133-dae79d29c194','31504635-25f4-4a5f-a133-dae79d29c194','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','112-2','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3a52fe98-287f-43d4-94b6-4cea5de2a2b4','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','604cb429-d66f-4af3-8757-e162ca592e41','3329f681-62fc-4f21-8165-5ec07b9cda4f','178-3','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3c82296c-c6ba-449a-bb57-9a30388540dd','6b896c77-1170-44f4-9e68-6390c542d921','9434775d-3bbf-40b2-a15c-14f2fd115ff0','ea2c564d-6dda-4af4-91ea-53a16f5c827e','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','350-6','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('3e7f6843-489c-414d-8aa9-f860b572b33b','55a96292-8644-4686-8209-ab48e7eb31e0','0858597c-0299-4d14-aa17-6a5424b9b14b','0858597c-0299-4d14-aa17-6a5424b9b14b','5130f072-31b2-4555-8576-b6b97c1887d2','103-2','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:35:52','2014-12-05 12:22:02'),
	('416b7f9a-1675-4720-b1af-a56cf9d9d185','318ee263-4442-4820-b2b5-903c6294fdcb','3767383d-efa0-4c42-bb06-d29561650ab4','7ffa3c2f-bfc6-4d14-95ab-98b358145124','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','44-1','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-11 11:00:39','2014-12-05 12:22:02'),
	('4938e091-f62d-471b-ab61-94ff6005f43a','d59140ba-7426-4570-a217-43b44cb07474','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ea2c564d-6dda-4af4-91ea-53a16f5c827e','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','418-9','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('4a80fb2f-91c2-40e7-9281-967cdfc3e1f6','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','6263861c-5f99-4f19-86ef-8de61e459a1e','6263861c-5f99-4f19-86ef-8de61e459a1e','5130f072-31b2-4555-8576-b6b97c1887d2','523-7','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-12 16:45:15','2014-12-05 12:22:02'),
	('4ab37080-9c19-46a9-a759-1dc217d5f0fb','6263861c-5f99-4f19-86ef-8de61e459a1e','1a902086-d506-4115-8fbe-88fe516eaf9f','1a902086-d506-4115-8fbe-88fe516eaf9f','1e83a8a8-a76f-454b-95e3-db86e2611947','44-1','b398d1a0-2c7d-41f7-b2c3-8ea00ddfcece','2014-11-13 14:40:56','2014-12-04 10:54:55'),
	('5053dcd6-8a30-4d82-b9e8-6197436967e4','7191769f-cf4c-48b1-8913-77c503d23da1','31504635-25f4-4a5f-a133-dae79d29c194','31504635-25f4-4a5f-a133-dae79d29c194','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','375-8','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('5ba85368-7ad9-44b8-9b3d-9ca76bb4ca56','ba5126f3-67ea-4797-a390-3c45f3fd1185','318ee263-4442-4820-b2b5-903c6294fdcb','318ee263-4442-4820-b2b5-903c6294fdcb','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','390-8','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('6ed41ec0-0d9e-4933-a1cc-427798b220fc','604cb429-d66f-4af3-8757-e162ca592e41','d59140ba-7426-4570-a217-43b44cb07474','d59140ba-7426-4570-a217-43b44cb07474','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','547-8','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('726364f3-6f79-47b4-8761-1eb17513ef3c','d59140ba-7426-4570-a217-43b44cb07474','643cd5ae-fa38-476b-9557-b1a110ff866c','fb359c6a-5ae9-4c03-8a96-20b471326f3a','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','544-9','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-12-05 09:02:10','2014-12-05 12:22:02'),
	('73cf1164-b640-4584-b416-34eeeecc654b','87c90006-0abb-492a-8756-4e46b9408106','d59140ba-7426-4570-a217-43b44cb07474','d59140ba-7426-4570-a217-43b44cb07474','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','558-9','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('777de563-ac62-422d-bf00-b54efddffa8f','0858597c-0299-4d14-aa17-6a5424b9b14b','cac70db7-d83f-4357-a986-234fe483d361','cac70db7-d83f-4357-a986-234fe483d361','5130f072-31b2-4555-8576-b6b97c1887d2','601-10','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-12-05 12:22:02','2014-12-05 12:22:02'),
	('7e794a09-5e0b-402f-bfb5-0c459cfda977','1a902086-d506-4115-8fbe-88fe516eaf9f','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','31504635-25f4-4a5f-a133-dae79d29c194','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','123-2','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('869c7f58-36ba-40d2-b827-42ef4c162207','604cb429-d66f-4af3-8757-e162ca592e41','b47bd34e-4a47-4f52-944a-6fb0adee1972','0858597c-0299-4d14-aa17-6a5424b9b14b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','310-8','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('86e274b4-ae92-4428-a0ce-139bb220a427','cac70db7-d83f-4357-a986-234fe483d361','539b1fd7-50a6-4e3b-9b66-c91370e3909b','539b1fd7-50a6-4e3b-9b66-c91370e3909b','5130f072-31b2-4555-8576-b6b97c1887d2','238-5','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('8796ff7c-c598-4afc-8f5b-582eca7bae52','b47bd34e-4a47-4f52-944a-6fb0adee1972','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','336-5','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('90d4897e-0228-48ba-902f-7bbfce5cb12b','58d058a8-bc24-4b9b-ad9c-5908102005af','6b896c77-1170-44f4-9e68-6390c542d921','0858597c-0299-4d14-aa17-6a5424b9b14b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','159-2','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('94fd2c51-413f-411e-8404-ec522f929713','03a152b6-6c79-40f1-af1e-0751a6af60ba','d59140ba-7426-4570-a217-43b44cb07474','d59140ba-7426-4570-a217-43b44cb07474','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','558-9','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('9801d57f-894d-43ea-81b6-147d5f713040','47701045-d1b8-40ad-98ca-c468471d488c','d59140ba-7426-4570-a217-43b44cb07474','d59140ba-7426-4570-a217-43b44cb07474','5130f072-31b2-4555-8576-b6b97c1887d2','278-6','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('9924c3ad-34c3-46b1-aef7-ac3f2965d55a','7da86b45-89f6-4cca-bf25-e8131df7c863','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','5130f072-31b2-4555-8576-b6b97c1887d2','230-4','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:19:09','2014-12-05 12:22:02'),
	('9b9e5952-fcd7-48ad-b636-022c0f985aa5','44aa7fd1-163d-4ff7-8117-ec436c161271','d59140ba-7426-4570-a217-43b44cb07474','d59140ba-7426-4570-a217-43b44cb07474','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','564-10','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('9d98740e-121a-4b52-9739-13a0a152cb48','3767383d-efa0-4c42-bb06-d29561650ab4','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','0858597c-0299-4d14-aa17-6a5424b9b14b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','305-6','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('9ebce931-3a86-4af7-a120-ae15ba7fd2b6','7da86b45-89f6-4cca-bf25-e8131df7c863','47701045-d1b8-40ad-98ca-c468471d488c','87c90006-0abb-492a-8756-4e46b9408106','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','272-4','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('a4ffa8ad-28ab-4469-901f-34821c65bfd6','9434775d-3bbf-40b2-a15c-14f2fd115ff0','6b896c77-1170-44f4-9e68-6390c542d921','0858597c-0299-4d14-aa17-6a5424b9b14b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','266-5','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('aa278c28-bb31-49ae-8bf3-3b9c46cabb2f','b47bd34e-4a47-4f52-944a-6fb0adee1972','6263861c-5f99-4f19-86ef-8de61e459a1e','6263861c-5f99-4f19-86ef-8de61e459a1e','5130f072-31b2-4555-8576-b6b97c1887d2','354-5','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:11:44','2014-12-05 12:22:02'),
	('aa7fabb4-458e-4e29-ad84-9a5094f467d6','7191769f-cf4c-48b1-8913-77c503d23da1','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ea2c564d-6dda-4af4-91ea-53a16f5c827e','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','434-8','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('ad70c4a1-338d-471e-9f96-ee487e212a8a','6b896c77-1170-44f4-9e68-6390c542d921','6263861c-5f99-4f19-86ef-8de61e459a1e','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','409-6','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:31:40','2014-12-05 12:22:02'),
	('bf7e9bc7-ac8d-4827-8017-409e11311718','318ee263-4442-4820-b2b5-903c6294fdcb','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','03a152b6-6c79-40f1-af1e-0751a6af60ba','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','78-1','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('c131628a-32ee-4718-8801-007072d73c71','7ffa3c2f-bfc6-4d14-95ab-98b358145124','318ee263-4442-4820-b2b5-903c6294fdcb','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','148-3','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:35:52','2014-12-05 12:22:02'),
	('c8eebd18-0a64-4947-99dc-25d03608ca12','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','03a152b6-6c79-40f1-af1e-0751a6af60ba','03a152b6-6c79-40f1-af1e-0751a6af60ba','5130f072-31b2-4555-8576-b6b97c1887d2','372-7','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('d342f557-2ad5-4284-ba60-8fd6c13b8d86','0858597c-0299-4d14-aa17-6a5424b9b14b','47701045-d1b8-40ad-98ca-c468471d488c','ea2c564d-6dda-4af4-91ea-53a16f5c827e','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','456-9','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('d5429e27-6465-491c-9b26-0741acaf9fef','ea2c564d-6dda-4af4-91ea-53a16f5c827e','960f3bdd-8aa4-4c73-a308-e74af54fbc1e','d59140ba-7426-4570-a217-43b44cb07474','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','305-3','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('d5be7729-cb31-4a53-9267-ba93111b5010','6f38fbc8-fe09-4628-94d1-847453f6da05','318ee263-4442-4820-b2b5-903c6294fdcb','7191769f-cf4c-48b1-8913-77c503d23da1','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','232-4','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('dea2c286-f97a-479f-ac02-cefb09bcdce0','04ae289c-9c90-4b7e-8cbe-f5068e727908','44aa7fd1-163d-4ff7-8117-ec436c161271','31504635-25f4-4a5f-a133-dae79d29c194','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','422-10','23a28ffc-4827-40e7-928f-5e80e33ad42e','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('e3f696b5-32c1-4847-a0ea-f687b45e600e','3f9927e8-5f0d-4c81-8e9a-d0a2b1f59b27','d59140ba-7426-4570-a217-43b44cb07474','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','525-7','5267764a-01a6-4a1c-8cfb-40c762c64454','2014-12-08 12:52:17','2014-12-09 14:44:25'),
	('e411ead3-cd02-45d0-b3b0-a606784117cf','ea2c564d-6dda-4af4-91ea-53a16f5c827e','04ae289c-9c90-4b7e-8cbe-f5068e727908','04ae289c-9c90-4b7e-8cbe-f5068e727908','ed3dc8c8-99f3-4c54-86f6-172d0bd2c27a','176-3','ca098580-87f0-4f06-b3af-225d9946926b','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('efd2256b-8164-4bcc-9b4c-01cae7db4937','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','6263861c-5f99-4f19-86ef-8de61e459a1e','6263861c-5f99-4f19-86ef-8de61e459a1e','1e83a8a8-a76f-454b-95e3-db86e2611947','89-2','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:31:40','2014-12-05 12:22:02'),
	('f0551119-0237-4fd4-8b90-94d91dd4bfe3','1a902086-d506-4115-8fbe-88fe516eaf9f','6263861c-5f99-4f19-86ef-8de61e459a1e','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','134-3','f949bb45-3d8b-46f5-8967-cc1340a9c1e7','2014-11-13 10:31:40','2014-12-05 12:22:02'),
	('f1101666-ce67-405a-9631-a9cb75d3dbff','6263861c-5f99-4f19-86ef-8de61e459a1e','6b896c77-1170-44f4-9e68-6390c542d921','04ae289c-9c90-4b7e-8cbe-f5068e727908','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','69-1','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-12 16:57:56','2014-12-05 12:22:02'),
	('f4923224-2d46-4afa-84a6-421fe74aa597','ad8ecafe-2a0a-4a1f-97c9-c6ffaccde8bd','87c90006-0abb-492a-8756-4e46b9408106','87c90006-0abb-492a-8756-4e46b9408106','5130f072-31b2-4555-8576-b6b97c1887d2','146-3','f5692e57-31a0-4f94-a303-e8540081eebb','2014-12-08 12:52:17','2014-12-08 12:52:17'),
	('f4deb61e-7459-48b6-ac2e-cd36c5956b0e','9f5f196e-2243-4bd8-90e1-3879b339a4ee','d59140ba-7426-4570-a217-43b44cb07474','539b1fd7-50a6-4e3b-9b66-c91370e3909b','5b2e3e00-8b9a-48d0-8075-811bfa43b0bc','324-7','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02'),
	('fd9004b3-a0bf-4a58-beca-349ae0449442','07adc7ba-50ee-43b1-b616-1cfd52ba8c11','318ee263-4442-4820-b2b5-903c6294fdcb','0858597c-0299-4d14-aa17-6a5424b9b14b','2d00d137-018a-4d09-a2de-ce6dd69a33fc','173-4','841fce60-0178-450f-99e8-ad1670f5c84f','2014-11-13 11:44:23','2014-12-05 12:22:02');

/*!40000 ALTER TABLE `wickets` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
