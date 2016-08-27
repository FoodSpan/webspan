/*
  USER 1
  User: a@a.a
  Password: a
  USER 2
  User: b@b.b
  Password: b
*/
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('0', '1', '0', '1', '0', 'Potatoes', '', 'Vegetables', '1', '0', '', '1472417730');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('1', '2', '0', '1', '0', 'Apples', '', 'Fruit', '1', '0', '', '1472504130');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('2', '3', '0', '1', '0', 'Something Wicked', '', 'Witchcraft', '1', '0', '', '1472590530');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('3', '4', '0', '1', '0', 'Disgustingly Spoiled', '', 'Junk', '1', '0', '', '1');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('4', '5', '0', '1', '0', 'So Fresh', '', 'Bel-Air', '1', '0', '', '3000000000');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('5', '1', '1', '1', '1', 'Dinosaur Egg', '', 'Prehistoric', '1', '0', '', '1472417730');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('6', '2', '1', '1', '1', '42', '', 'Universe', '1', '0', '', '1472504130');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('7', '3', '1', '1', '1', 'Something Evil', '', 'Witchcraft', '1', '0', '', '1472590530');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('8', '4', '1', '1', '1', 'Ew Spoiled', '', 'Junk', '1', '0', '', '1');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('9', '5', '1', '1', '1', 'Yay Fresh', '', 'Bel-Air', '1', '0', '', '3000000000');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('10', '2', '0', '1', '1', 'Ew Spoiled', '', 'Junk', '1', '0', '', '1');
INSERT INTO `webspan`.`tags` (`uid`, `pattern`, `controluid`, `state`, `last_activation_date`, `name`, `description`, `category`, `raw_cooked`, `fridge_freezer`, `ingredient`, `expiry_date`) VALUES ('11', '7', '2', '1', '1', 'Yay Fresh', '', 'Bel-Air', '1', '0', '', '3000000000');

INSERT INTO `webspan`.`panels` (`uid`, `accountid`, `version`, `name`, `description`) VALUES ('0', '111', '', 'Da Hood', 'Where my boys at?');
INSERT INTO `webspan`.`panels` (`uid`, `accountid`, `version`, `name`, `description`) VALUES ('1', '222', '', 'Fridgerator', 'Normal.');
INSERT INTO `webspan`.`panels` (`uid`, `accountid`, `version`, `name`, `description`) VALUES ('2', '222', '', 'Fridgerator 2', 'Normal.(2)?');

INSERT INTO `webspan`.`users` (`id`, `email`, `name`, `password`, `salt`) VALUES ('111', 'a@a.a', 'a', '01be453e34d298ae261de606c60501022717fd807addf908dce9403795354ee6', '62c68b4b4e09ccab');
INSERT INTO `webspan`.`users` (`id`, `email`, `name`, `password`, `salt`) VALUES ('222', 'b@b.b', 'b', '21ed197308a97cba522ba56559abf48c63723ef3307c379eebec3a2562794101', '75b9a0bb307aed12');
