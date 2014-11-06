<?php
/**
 * @author      Vladimir Popov
 * @copyright   Copyright (c) 2014 Vladimir Popov
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

if((float)substr(Mage::getVersion(),0,3)>=1.6 && method_exists($installer->getConnection(), 'dropTable')){
    $installer->getConnection()->dropTable($this->getTable('user_surveys/surveys'));
    $installer->getConnection()->dropTable($this->getTable('user_surveys/surveys_form'));
    $installer->getConnection()->dropTable($this->getTable('user_surveys/surveys_questions'));
}

$installer->run("
DROP TABLE IF EXISTS `{$this->getTable('user_surveys/surveys')}`;
CREATE TABLE IF NOT EXISTS `{$this->getTable('user_surveys/surveys')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `value` varchar(255)  DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{$this->getTable('user_surveys/surveys_form')}`;
CREATE TABLE IF NOT EXISTS `{$this->getTable('user_surveys/surveys_form')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions_id` varchar(50) NOT NULL,
  `form_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{$this->getTable('user_surveys/surveys_questions')}`;
CREATE TABLE IF NOT EXISTS `{$this->getTable('user_surveys/surveys_questions')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `options` varchar(100) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
");

$installer->endSetup();
