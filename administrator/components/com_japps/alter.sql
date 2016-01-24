ALTER TABLE `#__members_node` CHANGE `username` `username` VARCHAR ( 80 ) NOT NULL;
/* CONDITIONCOLUMN||members_node||status */ ALTER TABLE `#__members_node` ADD `status` TINYINT UNSIGNED DEFAULT '1' NOT NULL;
