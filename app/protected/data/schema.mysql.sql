
DROP TABLE IF EXISTS `api_keys`;
CREATE TABLE `api_keys` (
  `Key` char(32) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '0',
  `ValidUntil` datetime NOT NULL,
  PRIMARY KEY (`Key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products` (
  `IdOrder` int(10) unsigned NOT NULL,
  `IdProduct` int(10) unsigned NOT NULL,
  `Sku` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Quantity` int(10) unsigned DEFAULT NULL,
  `Price` decimal(15,4) DEFAULT NULL,
  PRIMARY KEY (`IdOrder`,`IdProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE `order_statuses` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `PhoneAdditional` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `AddressAdditional` varchar(255) DEFAULT NULL,
  `SubTotal` decimal(15,4) DEFAULT NULL,
  `ShippingTotal` decimal(15,4) DEFAULT NULL,
  `PaymantTotal` decimal(15,4) DEFAULT NULL,
  `Discount` decimal(15,4) DEFAULT NULL,
  `Fee` decimal(15,4) DEFAULT NULL,
  `Total` decimal(15,4) DEFAULT NULL,
  `ShippingMethodName` varchar(255) DEFAULT NULL,
  `IdShippingMethod` int(11) unsigned DEFAULT NULL,
  `PaymentMethodName` varchar(255) DEFAULT NULL,
  `IdPaymentMethod` int(10) unsigned DEFAULT NULL,
  `IdOrderStatus` int(10) unsigned DEFAULT NULL,
  `ApiKey` CHAR(32) NOT NULL,
PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Cost` decimal(15,4) DEFAULT NULL,
  `AdditionalParam` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_to_category`;
CREATE TABLE `product_to_category` (
  `IdProduct` int(10) unsigned NOT NULL,
  `IdCategory` int(10) unsigned NOT NULL,
  PRIMARY KEY (`IdProduct`,`IdCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Sku` varchar(100) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Image` varchar(255) DEFAULT NULL,
  `InStock` int(10) unsigned DEFAULT NULL,
  `Price` decimal(15,4) unsigned DEFAULT NULL,
  `IncomingPrice` decimal(15,4) DEFAULT NULL,
  `IncomingCurrency` char(3) DEFAULT NULL,
  `IncommingCurrencyRate` decimal(15,4) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ProductSku_UNIQUE` (`Sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `shipping_methods`;
CREATE TABLE `shipping_methods` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Cost` decimal(15,4) DEFAULT NULL,
  `AdditionalParam` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;