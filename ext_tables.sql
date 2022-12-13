CREATE TABLE tx_zzbills_domain_model_bill (
	number varchar(255) NOT NULL DEFAULT '',
	date int(11) NOT NULL DEFAULT '0',
	recipient_company varchar(255) NOT NULL DEFAULT '',
	recipient_name varchar(255) NOT NULL DEFAULT '',
	recipient_address varchar(255) NOT NULL DEFAULT '',
	recipient_zip varchar(255) NOT NULL DEFAULT '',
	recipient_city varchar(255) NOT NULL DEFAULT '',
	recipient_mail varchar(255) NOT NULL DEFAULT '',
	recipient_phone varchar(255) NOT NULL DEFAULT '',
	data int(11) unsigned NOT NULL DEFAULT '0',
	comment varchar(255) NOT NULL DEFAULT '',
	bill_posts int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_zzbills_domain_model_post (
	bill int(11) unsigned DEFAULT '0' NOT NULL,
	number int(11) NOT NULL DEFAULT '0',
	tax_rate int(11) NOT NULL DEFAULT '0',
	name varchar(255) NOT NULL DEFAULT '',
	subtitle varchar(255) NOT NULL DEFAULT '',
	quantity varchar(255) NOT NULL DEFAULT '',
	single_price double(11,2) NOT NULL DEFAULT '0.00'
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder