#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content
(
    cardsitem            int(11) unsigned DEFAULT '0' NOT NULL,
    cards_container      int(11) unsigned DEFAULT '0' NOT NULL,
    cardsitem_header     text,
    card_layout          int(11) unsigned DEFAULT '1' NOT NULL,
    header_position      varchar(255) NOT NULL default '',
    teaserItem           int(11) unsigned DEFAULT '0' NOT NULL,
    teaser_headline      text,
    teaserItem_container int(11) unsigned DEFAULT '0' NOT NULL,
    teaserItem_link      varchar(255)          DEFAULT '' NOT NULL,
    contact_phone        text,
    contact_mail         text,
    contact_opening      text,
);

#
# Table structure for table 'pages'
#
