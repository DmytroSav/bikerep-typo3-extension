#
# Table structure for table 'tx_bikerep_domain_model_repairrequests'
#
CREATE TABLE tx_bikerep_domain_model_repairrequests (

	title varchar(255) DEFAULT '' NOT NULL,
	request text,
	bike_model varchar(255) DEFAULT '' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL

);
