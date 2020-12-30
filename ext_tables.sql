#
# Table structure for table 'tx_bikerep_domain_model_repairrequests'
#
CREATE TABLE tx_bikerep_domain_model_repairrequests (

	title varchar(255) DEFAULT '' NOT NULL,
	request text,
	phone varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	model int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_bikerep_domain_model_bikemodel'
#
CREATE TABLE tx_bikerep_domain_model_bikemodel (

	model varchar(255) DEFAULT '' NOT NULL,
	cc int(11) DEFAULT '0' NOT NULL

);
